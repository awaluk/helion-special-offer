<?php

namespace awaluk\HelionSpecialOffer;

class Book
{
    private $title;
    private $oldPrice;
    private $promotionPrice;
    private $link;
    private $coverLink;
    private $toCartLink;

    public function __construct($title, $oldPrice, $promotionPrice, $link, $coverLink, $toCartLink)
    {
        $this->title = $title;
        $this->oldPrice = $oldPrice;
        $this->promotionPrice = $promotionPrice;
        $this->link = $link;
        $this->coverLink = $coverLink;
        $this->toCartLink = $toCartLink;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getOldPrice(): float
    {
        return $this->oldPrice;
    }

    public function getPromotionPrice(): float
    {
        return $this->promotionPrice;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getCoverLink(): string
    {
        return $this->coverLink;
    }

    public function getToCartLink(): string
    {
        return $this->toCartLink;
    }
}
