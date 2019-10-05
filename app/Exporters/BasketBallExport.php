<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 5:31 PM
 */

namespace App\Exporters;


use App\Importers\BasketBallImport;

class BasketBallExport
{
    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {

    }

    public function collection()
    {
        return BasketBallImport::$data;
    }

}