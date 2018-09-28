<?php

namespace SaeDigital\JpgCompress;

use Intervention\Image\ImageManager;
use Phulp\PipeInterface;
use Phulp\Source;


/**
 * Class JpgCompress
 *
 * @package SaeDigital\JpgCompress
 */
class JpgCompress implements PipeInterface
{

    /**
     * @var array
     */
    private $options = [
        'driver'  => 'imagick',
        'quality' => 60,
        'format'  => null
    ];


    /**
     * @var ImageManager;
     */
    private $manager;


    /**
     * JpgCompress constructor.
     *
     * @param array $options
     * @param ImageManager $manager
     *
     */
    public function __construct(array $options = [], ImageManager $manager = null)
    {
        $this->options = array_merge($this->options, $options);
        $this->manager = $manager ?: new ImageManager($this->options);
    }


    /**
     * @param Source $source
     *
     * @return void
     */
    public function execute(Source $source)
    {
        foreach($source->getDistFiles() as $key => $file) {

            $pathFile = $file->getFullpath().$file->getDistpathname();
            $ext = $this->options['format'] ?: pathinfo($pathFile, PATHINFO_EXTENSION);

            $content = (string) $this->manager
                ->make($pathFile)
                ->encode($ext, $this->options['quality']);

            $file->setContent($content);
        }
    }
}
