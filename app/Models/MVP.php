<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 5:12 PM
 */

namespace App\Models;


class MVP
{
    public $playerNumber;
    public $rating;
    public $sport;

    /**
     * MVP constructor.
     * @param $playerNumber
     * @param $rating
     * @param $sport
     */
    public function __construct($playerNumber, $rating, $sport)
    {
        $this->playerNumber = $playerNumber;
        $this->rating = $rating;
        $this->sport = $sport;
    }

}