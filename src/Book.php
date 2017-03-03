<?php
/**
 * Book data
 * @author Arkadiusz Waluk <arkadiusz@waluk.pl>
 * @license MIT
 */
namespace awaluk\HelionSpecialOffer;

class Book
{
    private $title;
    private $oldPrice;
    private $promotionPrice;
    private $link;
    private $coverLink;
    private $toCartLink;

    /**
     * @param $title
     * @param $oldPrice
     * @param $promotionPrice
     * @param $link
     * @param $coverLink
     * @param $toCartLink
     */
    public function __construct($title, $oldPrice, $promotionPrice, $link, $coverLink, $toCartLink)
    {
        $this->title = $title;
        $this->oldPrice = $oldPrice;
        $this->promotionPrice = $promotionPrice;
        $this->link = $link;
        $this->coverLink = $coverLink;
        $this->toCartLink = $toCartLink;
    }

    /**
     * Book title
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Book price before promotion
     * @return float
     */
    public function getOldPrice(): float
    {
        return $this->oldPrice;
    }

    /**
     * Book price in promotion
     * @return float
     */
    public function getPromotionPrice(): float
    {
        return $this->promotionPrice;
    }

    /**
     * Link to book in helion.pl
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Link to book cover
     * @return string
     */
    public function getCoverLink(): string
    {
        return $this->coverLink;
    }

    /**
     * Link adding book to cart
     * @return string
     */
    public function getToCartLink(): string
    {
        return $this->toCartLink;
    }
}