<?php
namespace App\Http\Helpers;

use phpDocumentor\Reflection\Types\Self_;
use SimpleXMLElement;
use App\Paynet;
use App\User;
use App\CompanyData;

class Helper
{
//    request date 21.09.2020 00:00:00

    public static function stats($a)
    {
        $str = '';
        $start = '<statements>';
        $end = '</statements>';
        foreach ($a as $item) {
            $str .= $start . "\n";
            $str .= '<amount>' . $item->transaction_AMOUNT * 100 . '</amount>' . "\n";
            $str .= '<transactionId>' . $item->transaction_ID . '</transactionId>' . "\n";
            $str .= '<transactionTime>' . date('c', $item->transaction_TIME) . '</transactionTime>' . "\n";
            $str .= $end . "\n";
        }
        return $str;
    }

    public static function errors(int $code)
    {
        $b = [
            '0' => 'Проведено успешно',
            '77' => 'Недостаточно средств на счету клиента для отмены платежа',
            '100' => 'Услуга временно не поддерживается',
            '101' => 'Квота исчерпана',
            '102' => 'Системная ошибка',
            '103' => 'Неизвестная ошибка',
            '201' => 'Транзакция уже существует',
            '202' => 'Транзакция уже отменена',
            '301' => 'Номер не существует',
            '302' => 'Клиент не найден',
            '304' => 'Товар не найден',
            '305' => 'Услуга не найдена',
            '401' => 'Ошибка валидации параметра',
            '411' => 'Не заданы один или несколько обязательных параметров',
            '412' => 'Неверный логин',
            '413' => 'Неверная сумма',
            '414' => 'Неверный формат даты и времени',
            '501' => 'Транзакции запрещены для данного плательщика',
            '601' => 'Доступ запрещен',
            '603' => 'Неправильный код команды',
        ];
        return $b[$code];
    }

    public static function PerformTran($key, $data)
    {
        $data = $data[$key];
        $amount = ($data['amount']) / 100;
        $transaction_id = $data['transactionId'];
        $client_id = $data['parameters']['paramValue'];
        $transaction_time = strtotime($data['transactionTime']);

        $user = User::find($client_id);
        $tran = Paynet::where('transaction_ID', $transaction_id)->first();
        if ($user && !$tran) {

            $order = new Paynet();
            $order->user_id = $client_id;
            $order->transaction_ID = $transaction_id;
            $order->transaction_TIME = $transaction_time;
            $order->transaction_STATE = 1;
            $order->transaction_AMOUNT = $amount;
            $order->save();

            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:PerformTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(0) . '</errorMsg>
                        <status>0</status>
                        <timeStamp>' . date('c', strtotime($order->created_at)) . '</timeStamp>
                        <providerTrnId>' . $order->id . '</providerTrnId>
                    </ns2:PerformTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        } else if (!$user) {
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:PerformTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(302) . '</errorMsg>
                        <status>302</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <providerTrnId></providerTrnId>
                    </ns2:PerformTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        } else if ($tran) {
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:PerformTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(201) . '</errorMsg>
                        <status>201</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <providerTrnId></providerTrnId>
                    </ns2:PerformTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);
            return $new->asXML();
        }
    }

    public static function CheckTran($key, $data)
    {
        $data = $data[$key];
        $order = Paynet::where('transaction_ID', $data['transactionId'])->first();

        if ($order) {
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:CheckTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(0) . '</errorMsg>
                        <status>0</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <providerTrnId>' . $order->id . '</providerTrnId>
                        <transactionState>' . $order->transaction_STATE . '</transactionState>
                        <transactionStateErrorStatus>0</transactionStateErrorStatus>
                        <transactionStateErrorMsg>Success</transactionStateErrorMsg>
                    </ns2:CheckTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        } else {
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:CheckTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(301) . '</errorMsg>
                        <status>301</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <providerTrnId></providerTrnId>
                        <transactionState></transactionState>
                        <transactionStateErrorStatus></transactionStateErrorStatus>
                        <transactionStateErrorMsg></transactionStateErrorMsg>
                    </ns2:CheckTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        }
    }

    public static function CancelTran($key, $data)
    {
        $data = $data[$key];

        $order = Paynet::where('transaction_ID', $data['transactionId'])->first();
        if ($order) {
            $cod = 0;
            if ($order->transaction_STATE == 1) {
                $order->update(['transaction_STATE' => 2]);
            } else {
                $cod = 202;
            }
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:CancelTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors($cod) . '</errorMsg>
                        <status>' . $cod . '</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <transactionState>' . $order->trasaction_STATE . '</transactionState>
                    </ns2:CancelTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        } else {
            $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:CancelTransactionResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors(301) . '</errorMsg>
                        <status>301</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <transactionState></transactionState>
                    </ns2:CancelTransactionResult>
                </soapenv:Body>
            </soapenv:Envelope>';
            $new = new SimpleXMLElement($str_two);

            return $new->asXML();
        }
    }

    public static function GetStat($key, $data)
    {
//        dd(Self::stats(3));
        $data = $data[$key];
        $from = strtotime($data['dateFrom']);
        $to = strtotime($data['dateTo']);
//        dd($data);
        $orders = Paynet::where('transaction_STATE', 1)
            ->whereBetween('transaction_TIME', [$from, $to])->get();
//        dd($orders);
        $str_two = '<?xml version="1.0" encoding="UTF-8"?>
        <soap-env:Envelope xmlns:soap-env="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://uws.provider.com/">
            <soap-env:Body>
                <ns1:GetStatementResult>
                    <errorMsg>Some message</errorMsg>
                    <status>0</status>
                    <timeStamp>' . date('c', time()) . '</timeStamp>
                    ' . Self::stats($orders) . '
                </ns1:GetStatementResult>
            </soap-env:Body>
        </soap-env:Envelope>';
        $new = new SimpleXMLElement($str_two);

        return $new->asXML();
    }

    public static function GetInfo($key, $data)
    {
        $data = $data[$key];
        $client_id = User::find($data['parameters']['paramValue']);
        $cod = 0;
        $balance = isset($client_id->balance) ? $client_id->balance : 0;
        if (!$client_id) {
            $cod = 302;
            $balance = '';
        }

        $str_two = '<?xml version="1.0" encoding="UTF-8"?>
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
                <soapenv:Body>
                    <ns2:GetInformationResult xmlns:ns2="http://uws.provider.com/">
                        <errorMsg>' . Self::errors($cod) . '</errorMsg>
                        <status>' . $cod . '</status>
                        <timeStamp>' . date("c", time()) . '</timeStamp>
                        <parameters>
                            <paramKey>balance</paramKey>
                            <paramValue>' . $balance . '</paramValue>
                        </parameters>
                    </ns2:GetInformationResult>
                </soapenv:Body>
            </soapenv:Envelope>';
        $new = new SimpleXMLElement($str_two);

        return $new->asXML();
    }


    public static function Procent($number, $procent)
    {
//        dd('Yes');
        $number = str_replace(',', '.', $number);
        $procent = str_replace(',', '.', $procent) / 100;
//        dd($number * $procent);
        return $number * $procent;
    }

    public static function Month($year)
    {
        if ($year == 1) {
//            dd('yes');
            $d = date("Y-m-d", mktime(0, 0, 0, date('m'), date('d'), date('Y') - 1));
        } else {
//            dd('no');
            $d = date("Y-m-d", mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')));
        }
        $d_2 = date("Y-m-d", mktime(23, 59, 59, date('m'), date('d'), date('Y')));

//        dd($d, $d_2);

        $test = CompanyData::select('company_id', 'date', 'time', 'last_price', 'timestamp')->whereBetween('date', [$d, $d_2])->whereHas('kdindex')->with('detail')->orderBy('timestamp', 'desc')->get();
        $wow = $test->groupBy('date');
//        dd($wow);
        $wow = $wow->map(function ($model, $key) {
            $y = $model->unique('company_id');
            $t = $y->map(function ($query) {
                return [
                    'comp_id' => $query->company_id,
                    'cap' => $query->last_price * $query->detail->free_quantity,
                    'last_price' => $query->last_price
                ];
            });
            return ['cap' => $t->sum('cap'), 'comp' => $t->toArray()];
        });
//        dd($wow);

        $temp = [];
        $q = 0;
        foreach ($wow as $key => $item) {
            $v = 0;


            foreach ($item['comp'] as $t) {
                $v += $t['last_price'] / ($t['cap'] / $item['cap']);
            }
            $temp[$q] = [strtotime($key), $v / 10000];
            $q++;
        }
//        dd($temp);
        return $temp;
//        dd($temp);
    }

    public static function langs()
    {
        return ["ru", "en", "uz"];
    }
}

?>
