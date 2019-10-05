<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 4:29 PM
 */

namespace App\Interfaces;


interface ISport
{
    function calculateMVP($matchInfo);
    function getRatingTable($position);

}