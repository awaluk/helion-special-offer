<?php

namespace awaluk\HelionSpecialOffer;

class Data
{
    private $partnerNumber;
    private $coverSize;
    private $file;
    private $data;

    public function __construct(string $partnerNumber, int $coverSize = 326, string $file = null)
    {
        $this->partnerNumber = $partnerNumber;
        $this->coverSize = $coverSize;
        $this->file = $file;
        $this->loadFromCache();
    }

    public function loadFromCache()
    {
        if (!empty($this->file) && file_exists($this->file)) {
            $result = file_get_contents($this->file);
            $this->data = json_decode($result, true);
        } else {
            $this->download();
        }
    }

    public function download()
    {
        $url = 'https://helion.pl/plugins/new/promocja.phi?type=json';
        $url .= '&nr='.$this->partnerNumber;
        $url .= '&size='.$this->coverSize;
        $result = file_get_contents($url);
        $this->data = json_decode($result, true);
        if (!empty($this->file)) {
            file_put_contents($this->file, $result);
        }
    }

    public function get(string $name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : false;
    }

    public function getBook(): Book
    {
        return new Book(
            $this->get('title'),
            (float) $this->get('price'),
            (float) $this->get('newprice'),
            $this->get('link'),
            $this->get('cover'),
            $this->get('to_cart')
        );
    }
}
