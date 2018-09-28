<?php

namespace SaeDigital\JpgCompress;

use PHPUnit_Framework_TestCase;
use Phulp\Source;

/**
 * Class JpgCompressTest
 *
 * @package SaeDigital\JpgCompress
 */
class JpgCompressTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Source
     */
    private $source;

    public function setUp()
    {
        parent::setUp();

        $path = __DIR__ . DIRECTORY_SEPARATOR . 'original' . DIRECTORY_SEPARATOR;

        $this->source = new Source([$path], '/jpg$/', true);
    }


    public function testCreateCompressFile()
    {
        $dist = __DIR__ . DIRECTORY_SEPARATOR . 'compress';
        $compress = new JpgCompress(['quality' => 10]);
        $compress->execute($this->source);

        if (!is_dir($dist)) {
            mkdir($dist);
        }

        /** @var \Phulp\DistFile $file */
        $file = $this->source->getDistFiles()[0];

        if (file_exists($dist . $file->getDistpathname())) {
            unlink($dist . $file->getDistpathname());
        }

        file_put_contents($dist . $file->getDistpathname(), $file->getContent(), LOCK_EX);

        $this->assertTrue(file_exists($dist . $file->getDistpathname()));
    }

    /**
     * @depends testCreateCompressFile
     */
    public function testCompress()
    {

        $dist = __DIR__ . DIRECTORY_SEPARATOR . 'compress';

        /** @var \Phulp\DistFile $file */
        $file = $this->source->getDistFiles()[0];

        $original = filesize($file->getFullpath().$file->getDistpathname());
        $compress = filesize($dist . $file->getDistpathname());

        $this->assertTrue($compress < $original);
    }
}
