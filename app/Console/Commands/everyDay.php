<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Statistic;
use App\InfoStock;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Str;
use DB;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'day:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command update fond info';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $url = 'https://uzse.uz/cps.xml';
        $url_stocks = 'https://uzse.uz/tickers.xml';
        try{

            $xml = XmlParser::load($url);
            $temp = 0;
            $te = $xml->getContent();
            foreach ($xml->getContent() as $key => $value){
                if($key == 'common_purses_uzs'){
                    foreach ($value as $t){
                        if($t->mbr_no == '00443'){
                            $temp = $t->amount;
                        }
                    }
                }
            }
            $a = str_replace(' ', '', $temp);
            $a = Str::before($a, ',');
            Statistic::find(1)->update(['fond' => $a]);
            echo  'its OK';

        }catch (\Throwable $e){
            echo  'data error statistic';

        }

        try{
            $xml = XmlParser::load($url_stocks);
            foreach ($xml->getContent() as $value) {
                $stock = InfoStock::where('isin',$value->isu_cd)->first();
                if($stock){
                    $price =  str_replace(' ', '', $value->clsprc);
                    $price =  str_replace(',', '.', $price);
                    $stock->update([
                        'current_price' =>  $price,
                    ]);
                }else{
                    $new = new InfoStock();
                    $new->title = $value->isu_abbrv;
                    $new->isin = $value->isu_cd;
                    $new->current_price = $value->clsprc;
                    $new->save();
                }
            }
            echo  'its OK data';
        }catch (\Throwable $e){
            echo  'data error tickers';
        }

    }
}
