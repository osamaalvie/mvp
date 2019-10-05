<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 2:59 PM
 */

namespace App\Console\Commands;


use App\Exporters\BasketBallExport;
use App\Importers\BasketBallImport;
use App\Traits\TournamentTrait;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class BasketBallCommand extends Command
{
    use TournamentTrait;
    const SPORT = 'basketball';


    protected $signature = 'basket_ball_matches';

    public $requiredHeaders = ['player_name', 'nickname', 'number', 'team_name', 'position', 'scored_points', 'rebounds', 'assists']; //headers we expect


    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
        $this->filePath = storage_path() . DIRECTORY_SEPARATOR . 'sports' . DIRECTORY_SEPARATOR . self::SPORT . DIRECTORY_SEPARATOR;
        $this->fileprefix = date('dmY') . '*.csv';
        $this->failedPath = $this->filePath . 'failed';
        $this->processedPath = $this->filePath . 'processed';
        $this->mvpPath = $this->filePath . 'mvp' . DIRECTORY_SEPARATOR;


    }

    public function handle()
    {
        $files = $this->filePath . $this->fileprefix;


        foreach ($this->getFiles($files) as $file) {

            if ($this->isValidHeaders($file, $this->requiredHeaders)) {

                Excel::import(new BasketBallImport(), $file);
                Excel::store(new BasketBallExport(), "/sports/mvp/" . basename($file));

            } else {

                $this->moveFile($file, $this->failedPath);

            }

        }
    }


}