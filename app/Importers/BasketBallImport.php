<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 10/5/2019
 * Time: 2:53 PM
 */

namespace App\Importers;


use App\Exporters\BasketBallExport;
use App\Factory\SportFactory;
use App\Models\BasketBall;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Facades\Excel;

class BasketBallImport implements ToModel, WithHeadingRow, WithEvents
{
    use RegistersEventListeners;
    static $data = null;

    /**
     * @param array $row
     *
     * @return Model|Model[]|null
     */
    public function model(array $row)
    {
//        $player = new Player($row);

        $sportFactory = new SportFactory();

        $sport = $sportFactory->getSport(BasketBall::$NAME);
        $row['sport'] = BasketBall::$NAME;
        $mvp = $sport->calculateMVP($row);

        self::$data->push($mvp);


    }

    public static function beforeImport(BeforeImport $event)
    {
        self::$data = collect();
    }


}