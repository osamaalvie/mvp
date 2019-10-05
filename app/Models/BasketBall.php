<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 4:36 PM
 */

namespace App\Models;


use App\Interfaces\ISport;

class BasketBall implements ISport
{
    static $NAME = 'basketball';
    const FORWARD = 'F';
    const GUARD = 'G';
    const CENTER = 'C';

    const SCORED_POINTS = 'scored_points';
    const REBOUNDS = 'rebounds';
    const ASSISTS = 'assists';


    const RATING_TABLE = [
        self::GUARD => [
            self::SCORED_POINTS => 2,
            self::REBOUNDS => 3,
            self::ASSISTS => 1
        ],
        self::FORWARD => [
            self::SCORED_POINTS => 2,
            self::REBOUNDS => 2,
            self::ASSISTS => 2
        ],
        self::CENTER => [
            self::SCORED_POINTS => 2,
            self::REBOUNDS => 1,
            self::ASSISTS => 3
        ]
    ];

    /**
     * calulate mvp according to player position and scores
     * @param $matchInfo
     * @return MVP
     */
    function calculateMVP($matchInfo)
    {
        $position = $matchInfo['position'];
        $number = $matchInfo['number'];
        $sport = $matchInfo['sport'];


        $ratingTable = $this->getRatingTable($position);

        $scoredPoints = $matchInfo[self::SCORED_POINTS] * $ratingTable[self::SCORED_POINTS];
        $rebounds = $matchInfo[self::REBOUNDS] * $ratingTable[self::REBOUNDS];
        $assists = $matchInfo[self::ASSISTS] * $ratingTable[self::ASSISTS];
        $mvb = $scoredPoints + $rebounds + $assists;


        return new MVP($number, $mvb, $sport);
    }

    /**
     * get rating points table according to player position
     * @param $position
     * @return mixed
     */
    function getRatingTable($position)
    {
        switch ($position) {
            case self::GUARD:
                $ratingTable = self::RATING_TABLE[self::GUARD];
                break;
            case self::FORWARD:
                $ratingTable = self::RATING_TABLE[self::GUARD];
                break;
            case self::CENTER:
                $ratingTable = self::RATING_TABLE[self::GUARD];
                break;
        }

        return $ratingTable;
    }
}