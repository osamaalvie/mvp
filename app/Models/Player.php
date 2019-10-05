<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 3:26 PM
 */

namespace App\Models;


class Player
{
    private $name;
    private $nickname;
    private $team;
    private $number;
    private $position;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position): void
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param mixed $team
     */
    public function setTeam($team): void
    {
        $this->team = $team;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getScoredPoints()
    {
        return $this->scored_points;
    }

    /**
     * @param mixed $scored_points
     */
    public function setScoredPoints($scored_points): void
    {
        $this->scored_points = $scored_points;
    }

    /**
     * @return mixed
     */
    public function getRebounds()
    {
        return $this->rebounds;
    }

    /**
     * @param mixed $rebounds
     */
    public function setRebounds($rebounds): void
    {
        $this->rebounds = $rebounds;
    }

    /**
     * @return mixed
     */
    public function getAssists()
    {
        return $this->assists;
    }

    /**
     * @param mixed $assists
     */
    public function setAssists($assists): void
    {
        $this->assists = $assists;
    }
    private $scored_points;
    private $rebounds;
    private $assists;

    /**
     * Player constructor.
     * @param $name
     * @param $nickname
     * @param $position
     * @param $team
     * @param $number
     * @param $scored_points
     * @param $rebounds
     * @param $assists
     */
    public function __construct($row)
    {
        $this->name = $row['player_name'];
        $this->nickname = $row['nickname'];
        $this->position = $row['number'];
        $this->team = $row['team_name'];
        $this->number = $row['position'];
        $this->scored_points = $row['scored_points'];
        $this->rebounds = $row['rebounds'];
        $this->assists = $row['assists'];
    }


}