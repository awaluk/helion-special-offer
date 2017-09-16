# Helion Special Offer

[![Travis](https://travis-ci.org/awaluk/helion-special-offer.svg?branch=master)](https://travis-ci.org/awaluk/helion-special-offer)

Simple library to read data from [Helion.pl](http://helion.pl) special daily offer.

**Thanks to [Helion](http://helion.pl) for preparing data as JSON.**

## Download
With [Composer](https://getcomposer.org)
```
composer require awaluk/helion-special-offer
```
or [download release](https://github.com/awaluk/helion-special-offer/releases).

## Example
```php
<?php

// autoload from composer
require_once 'vendor/autoload.php';

// create new class to data operations
$data = new awaluk\HelionSpecialOffer\Data('xx', 326, false);
// getting new book object
$book = $data->getBook();
// show data, for example book title
echo $book->getTitle();
```

## Configuration
```php
new awaluk\HelionSpecialOffer\Data($partnerNumber, $coverSize, $file);
```
Name | Description | Default value
--- | --- | ---
`$partnerNumber` | Partner number from Helion | -
`$coverSize` | Width of cover image (available values: 65, 72, 88, 120, 125, 181, 326) | 326
`$file` | Location and name cache file | *without cache*

## Available data
Method Book object | Returned value
--- | ---
`getTitle()` | Book title
`getOldPrice()` | Book price before promotion
`getPromotionPrice()` | Book price in promotion
`getLink()` | Link to book in helion.pl
`getCoverLink()` | Link to book cover
`getToCartLink()` | Link adding book to cart

## Attention!
If you using cache file, add execution `$data->download();` to CRON everyday at moment after midnight. If you don't, the book will not be updated.

## License
[MIT](https://github.com/awaluk/helion-special-offer/blob/master/LICENSE)