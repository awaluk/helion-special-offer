<?php

// autoload from composer
require_once 'vendor/autoload.php';

// create new class to data operations
$data = new awaluk\HelionSpecialOffer\Data('xx', 326, false);
// getting new book object
$book = $data->getBook();
// show data, for example book title
echo $book->getTitle();