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

## Options
