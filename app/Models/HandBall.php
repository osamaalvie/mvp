<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 4:36 PM
 */

namespace App\Models;


use App\Interfaces\ISport;

class HandBall implements ISport
{
    static $NAME = 'basketball';


    function calculateMVP($matchInfo)
    {
        // TODO: Implement calculateMVP() method.
    }

    function getRatingTable($position)
    {
        // TODO: Implement getRatingTable() method.
    }
}