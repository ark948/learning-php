<?php

class Movie 
{
    // add class members
    private $id;
    private $title;
    private $rentalPrice;
    const DISCOUNT = 10;

    public function __construct($pId, $pTitle, $pRentalPrice) {
        $this -> id = $pId;
        $this -> title = $pTitle;
        $this -> rentalPrice = $pRentalPrice;
    }

    protected function conversion($country) {
        $rate = 1;
        switch ($country) {
            case 'UK':
                $rate = 0.76;
                break;
            case 'Japan':
                $rate = 110;
                break;
        }
        return round($rate*$this->rentalPrice, 2);
    }

    public function displayHeading($tag) {
        if (substr($this->id, 0, 1) == 'N')
            return "<$tag>Movies</$tag>";
        else
            return "<$tag>Award Winning Movies</$tag>";
    }

    public function __get($propertyRequested) {
        if ($propertyRequested == 'id')
            return 'You do not have permission to access id.<br>';
        else
            return $this->$propertyRequested;
    }

    public function __set($propertyToModify, $value) {
        if ($propertyToModify == 'rentalPrice' && $value > $this->rentalPrice)
            $this->rentalPrice = $value;
        else
            echo 'Failed to modify '.$propertyToModify.'<br>';
    }

    public function __toString() {
        return 
            'Discount = '.self::DISCOUNT.'%'.
            '<br>Id = '.$this->id.
            '<br>Title = '.$this->title.
            '<br>Rental Price (USD) = '.$this->rentalPrice;
    }
}

// local class variables such as rentalPrice need to be accessed using $this
// but parameters do not

