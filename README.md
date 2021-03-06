[![Build Status](https://travis-ci.org/saedigital/phulp-jpg-compress.svg?branch=master)](https://travis-ci.org/saedigital/phulp-jpg-compress)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/saedigital/phulp-jpg-compress/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/saedigital/phulp-jpg-compress/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/saedigital/phulp-jpg-compress/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Code Coverage](https://scrutinizer-ci.com/g/saedigital/phulp-jpg-compress/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/saedigital/phulp-jpg-compress/?branch=master)

# phulp-jpg-compress

The jpg-compress addon for [PHULP](https://github.com/reisraff/phulp). It's a wrapper for [intervention/image](http://image.intervention.io).

## Install

```bash
$ composer require saedigital/phulp-jpg-compress
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
 Define the quality of the encoded image.  Data ranging from **0** (poor quality, small file) to **100** (best quality, big file). Default: 60.


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

## Testing
``` bash
$ composer test
```

## Security
If you discover any security related issues, please email **ronaldo.rodrigues@saedigital.com.br** instead of using the issue tracker.

## Credits
   - [Ronaldo Matos Rodrigues](https://github.com/whera)
   
## License
The MIT License (MIT). Please see [License File](LICENSE) for more information.
