<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 3:00 PM
 */

namespace App\Console\Commands;


use App\Traits\TournamentTrait;
use Illuminate\Console\Command;

class HandBallCommand extends Command
{
    use TournamentTrait;

    protected $signature = 'handball_matches';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {

    }

}