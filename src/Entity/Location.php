<?php
// src/Entity/Task.php
namespace App\Entity;

class Location
{
    protected $address;

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
}
