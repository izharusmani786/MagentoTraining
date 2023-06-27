<?php 

namespace SimplifiedMagento\FirstModule\Model;

class HeavyService 
{
    public function __construct()
    {
        echo "HeavyService has been instantiated!";
    }

    public function printHeavyServiceMessage()
    {
        echo "message from HeavyService Class";
    }

}