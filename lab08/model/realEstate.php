<?php
class RealEstate {
    private $id, $homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice;

    public function __construct($homeTitle, $homeAddress, $homeCity, $homeState, $zipCode, $homeBeds, $homeBaths, $homeSize, $lotSize, $homePrice){
        $this->homeTitle = $homeTitle;
        $this->homeAddress = $homeAddress;
        $this->homeCity = $homeCity;
        $this->homeState = $homeState;
        $this->zipCode = $zipCode;
        $this->homeBeds = $homeBeds;
        $this->homeBaths = $homeBaths;
        $this->homeSize = $homeSize;
        $this->lotSize = $lotSize;
        $this->homePrice = $homePrice;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getHomeTitle()
    {
        return $this->homeTitle;
    }


    public function setHomeTitle($homeTitle)
    {
        $this->homeTitle = $homeTitle;
    }

    public function getHomeAddress()
    {
        return $this->homeAddress;
    }


    public function setHomeAddress($homeAddress)
    {
        $this->homeAddress = $homeAddress;
    }


    public function getHomeCity()
    {
        return $this->homeCity;
    }

    public function setHomeCity($homeCity)
    {
        $this->homeCity = $homeCity;
    }

    public function getHomeState()
    {
        return $this->homeState;
    }

    public function setHomeState($homeState)
    {
        $this->homeState = $homeState;
    }

    public function getZipCode()
    {
        return $this->zipCode;
    }


    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    public function getHomeBeds()
    {
        return $this->homeBeds;
    }


    public function setHomeBeds($homeBeds)
    {
        $this->homeBeds = $homeBeds;
    }

    public function getHomeBaths()
    {
        return $this->homeBaths;
    }


    public function setHomeBaths($homeBaths)
    {
        $this->homeBaths = $homeBaths;
    }

    public function getHomeSize()
    {
        return $this->homeSize;
    }

    public function setHomeSize($homeSize)
    {
        $this->homeSize = $homeSize;
    }

    public function getLotSize()
    {
        return $this->lotSize;
    }

    public function setLotSize($lotSize)
    {
        $this->lotSize = $lotSize;
    }

    public function getHomePrice()
    {
        return $this->homePrice;
    }

    public function setHomePrice($homePrice)
    {
        $this->homePrice = $homePrice;
    }


}
