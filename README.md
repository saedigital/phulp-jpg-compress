# phulp-jpg-compress

The jpg-compress addon for [PHULP](https://github.com/reisraff/phulp). It's a wrapper for [intervention/image](http://image.intervention.io).

## Install

```bash
$ composer require ......
```

## Usage

```php
<?php

use SaeDigital\JpgCompress\JpgCompress;

$phulp->task('jpg-compress', function ($phulp) {
    
    $phulp
        ->src(['src/'], '/jpg$/')
        ->pipe(new JpgCompress)
        ->pipe($phulp->dest('dist/'));
});

```

## Parameters

#### Driver
Image processing extensions.

 - **GD**
 - **Imagick** (default)
 
 Make sure you have one of these installed in your PHP environment, before you start. 
 
 #### Quality
 Define the quality of the encoded image.  Data ranging from **0** (poor quality, small file) to **100** (best quality, big file).


### Example    
```php
<?php

use SaeDigital\JpgCompress\JpgCompress;

$phulp->task('jpg-compress', function ($phulp) {
    
    $jpgCompress = new JpgCompress([
        'drive' => 'gd',
        'quality' => 15    
    ]);
    
    $phulp
        ->src(['src/'], '/jpg$/')
        ->pipe($jpgCompress)
        ->pipe($phulp->dest('dist/'));
});

```
