<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 4:38 PM
 */

namespace App\Factory;


use App\Models\BasketBall;
use App\Models\HandBall;

class SportFactory
{

    //use getShape method to get object of type shape
    public function getSport($sportType)
    {
        if ($sportType == null) {
            return null;
        }
        if ($sportType == BasketBall::$NAME) {
            return new BasketBall();

        } else if ($sportType == HandBall::$NAME) {
            return new HandBall();

        }

        return null;
    }

}