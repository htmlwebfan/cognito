# Obfuscator

[![Latest Version](https://img.shields.io/github/release/htmlwebfan/cognito.svg?style=flat-square)](https://github.com/htmlwebfan/cognito/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)

This package allows you to use php to generate javascript code that adds email addresses to a page.
As a result you do not have to hardcode email addresses into the page. since the address is not 
in the source code of the page, email scrapers and harvesters are avoided for the most part. 
The package is not meant to be unbeatable by a bot. It is simply an effort to make it too difficult 
to be worth the attempt.

## Install

Via Composer

``` bash
$ composer require htmlwebfan/cognito
```

## Usage

``` php
$obfuscator = new EmailObfuscator(new Config);
echo $ob->generateJS();
```

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- Matthew Way - https://www.htmlwebfan.com

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

