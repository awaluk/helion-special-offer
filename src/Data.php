<?php
/**
 * Operations on data
 * @author Arkadiusz Waluk <arkadiusz@waluk.pl>
 * @license MIT
 */
namespace awaluk\HelionSpecialOffer;

class Data
{
    private $partnerNumber;
    private $coverSize;
    private $file;
    private $data;

    /**
     * @param string $partnerNumber
     * @param int $coverSize
     * @param string $file
     */
    public function __construct(string $partnerNumber, int $coverSize = 326, string $file = null)
    {
        $this->partnerNumber = $partnerNumber;
        $this->coverSize = $coverSize;
        $this->file = $file;
        $this->loadFromCache();
    }

    /**
     * Load JSON from local file
     */
    public function loadFromCache()
    {
        if (!empty($this->file) && file_exists($this->file)) {
            $result = file_get_contents($this->file);
            $this->data = json_decode($result, true);
        } else {
            $this->download();
        }
    }

    /**
     * Download JSON from helion.pl and save to local file
     */
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

    /**
     * Get data from downloaded
     * @param string $name
     * @return mixed
     */
    public function get(string $name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : false;
    }

    /**
     * Get book with data
     * @return Book
     */
    public function getBook(): Book
    {
        return new Book(
            $this->get('title'),
            (float)$this->get('price'),
            (float)$this->get('newprice'),
            $this->get('link'),
            $this->get('cover'),
            $this->get('to_cart')
        );
    }
}