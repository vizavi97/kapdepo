<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Str;

use App\Statistic;
use App\InfoStock;
use Orchestra\Parser\Xml\Facade as XmlParser;
use DB;

class ApiController extends Controller
{

    public function bitrix_webhook($method,$id){
        @$queryUrl = 'https://kapdepo.bx24.uz/rest/1/oyim198rztg8lr6i/'.$method.'.json';
        @$queryData = http_build_query(array(
            'ID' => $id,
        ));

        @$curl = curl_init();
        @curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));
        @$result = curl_exec($curl);
        @curl_close($curl);
        return json_decode($result,JSON_OBJECT_AS_ARRAY);
    }

    public function register(Request $request)
    {
        ob_start();
        $data = $request->all();

        if(!empty($data['document_id']) && $data['document_id'][1] == 'CCrmDocumentDeal'){
            $deal_id = str_replace('DEAL_','',$data['document_id'][2]);
            @$result = $this->bitrix_webhook('crm.deal.get',$deal_id);
        } elseif(!empty($data['document_id']) && $data['document_id'][1] == 'CCrmDocumentLead'){
            $lead_id = str_replace('LEAD_','',$data['document_id'][2]);
            @$result = $this->bitrix_webhook('crm.lead.get',$lead_id);
        } elseif(!empty($data['event']) && $data['event'] == 'ONCRMDEALUPDATE'){
            $usid = $data['data']['FIELDS']['ID'];
            @$result = $this->bitrix_webhook('crm.contact.get',$usid);
        } else {
            $result = null;
        }

       // var_dump($data);echo PHP_EOL;
        //GET USER ID FROM DOCUMENT
       $user_id = intval($result['result']['CONTACT_ID']);
        //GET USER INFO WITH ID
        @$user = $this->bitrix_webhook('crm.contact.get',$user_id);
        //GET COMPANY LIST (ONLY NAMES) - ITS ARRAY
        @$company = $this->bitrix_webhook('crm.contact.company.items.get',$user_id);
        //GET 1 COMPANY WITH ID - EXAMPLE
//        foreach ($company as $single){
//            @$company_single = $this->bitrix_webhook('crm.company.get',$single['COMPANY_ID']);
//        }


        @var_dump($user);



        @file_get_contents('https://api.telegram.org/bot649988200:AAH3i3utJlmCwYHSjlfiVx3-cZlybeCFoC8/sendMessage?chat_id=912007171&text=' . ob_get_contents());

        // $rules = [
        //     'kzl' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'firstName' => ['required', 'string', 'max:255'],
        //     'surName' => ['required', 'string', 'max:255'],
        //     'lastName' => ['required', 'string', 'max:255'],
        //     'phone' => ['required', 'integer'],
        //     'agreement' => ['required', 'string', 'max:255'],
        // ];
        // $validator = Validator::make($request->all(), $rules);

        // if ($validator->fails()) {
        //     return response()->json(['errors' => $validator->messages()], 422);
        // }
        // $key = Str::random(5);
        // $gen = $request->kzl . $key;
        // $password = Hash::make($gen);
        // $data['key'] = $gen;
        if (!empty($user) && is_array($user)){
                User::create([
                'name' => $user['result']['UF_CRM_1549545637'],
                
                'email' => $user['result']['EMAIL'][0]['VALUE'],     
     
                'agreement' => $user['result']['UF_CRM_1549545736'],
                'password' => Hash::make($user['result']['UF_CRM_1589869725']),
                'first_name' => $user['result']['NAME'],
                'surname' => $user['result']['LAST_NAME'],
                'lastname' => $user['result']['SECOND_NAME'],
                'phone' => $user['result']['PHONE'][0]['VALUE'],
            
            ]);
        }
        
        return response()->json($data);
    }

    public function TaskRun()
    {
        $url = 'https://uzse.uz/cps.xml';
        $url_stocks = 'https://uzse.uz/tickers.xml';
        try {

            $xml = XmlParser::load($url);
            $temp = 0;
            $te = $xml->getContent();
            foreach ($xml->getContent() as $key => $value) {
                if ($key == 'common_purses_uzs') {
                    foreach ($value as $t) {
                        if ($t->mbr_no == '00443') {
                            $temp = $t->amount;
                        }
                    }
                }
            }
            $a = str_replace(' ', '', $temp);
            $a = Str::before($a, ',');
            Statistic::find(1)->update(['fond' => $a]);
            echo 'its OK';

        } catch (\Throwable $e) {
            echo 'data error statistic';

        }

        try {
            $xml = XmlParser::load($url_stocks);
            foreach ($xml->getContent() as $value) {
                $stock = InfoStock::where('isin', $value->isu_cd)->first();
                if ($stock) {
                    $price = str_replace(' ', '', $value->clsprc);
                    $price = str_replace(',', '.', $price);
                    $stock->update([
                        'current_price' => $price,
                    ]);
                } else {
                    $new = new InfoStock();
                    $new->title = $value->isu_abbrv;
                    $new->isin = $value->isu_cd;
                    $price = str_replace(' ', '', $value->clsprc);
                    $price = str_replace(',', '.', $price);
                    $new->current_price = $price;
                    $new->save();
                }
            }
            echo 'its OK data';
        } catch (\Throwable $e) {
            echo 'data error tickers';
        }
    }
}
