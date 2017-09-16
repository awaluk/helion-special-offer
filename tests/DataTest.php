<?php

use awaluk\HelionSpecialOffer\Book;
use awaluk\HelionSpecialOffer\Data;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{
    public function testLoadFromCache()
    {
        $data = new Data('123', 326, 'test.txt');
        $data->download();

        $this->assertFileExists('test.txt');

        $content = file_get_contents('test.txt');
        $fileData = json_decode($content, true);

        $this->assertEquals($data->get('title'), $fileData['title']);
        $this->assertEquals($data->get('price'), $fileData['price']);
    }

    public function testDownloadData()
    {
        $data = new Data('123');
        $data->download();

        $this->assertInternalType('string', $data->get('title'));
        $this->assertGreaterThan(0, (float) $data->get('price'));
    }

    public function testGetSuccess()
    {
        $data = new Data('123');
        $data->download();

        $this->assertInternalType('string', $data->get('title'));
        $this->assertGreaterThan(0, (float) $data->get('price'));
    }

    public function testGetError()
    {
        $data = new Data('123');
        $data->download();

        $this->assertFalse($data->get('test'));
    }

    public function testGetBook()
    {
        $data = new Data('123');
        $data->download();

        $book = $data->getBook();
        $this->assertInstanceOf(Book::class, $book);
        $this->assertEquals($data->get('title'), $book->getTitle());
    }

    public static function tearDownAfterClass()
    {
        unlink('test.txt');
    }
}
