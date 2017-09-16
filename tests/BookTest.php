<?php

use awaluk\HelionSpecialOffer\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testCreateBook()
    {
        $book = new Book('title', 5.0, 3.0, 'url', 'cover', 'cart');

        $this->assertEquals('title', $book->getTitle());
        $this->assertEquals(5.0, $book->getOldPrice());
        $this->assertEquals(3.0, $book->getPromotionPrice());
        $this->assertEquals('url', $book->getLink());
        $this->assertEquals('cover', $book->getCoverLink());
        $this->assertEquals('cart', $book->getToCartLink());
    }
}
