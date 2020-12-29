<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Data;

use Illuminate\Support\Facades\Http;

class DataController extends Controller
{
    function index(Request $request)
    {
        if ($request->id != null) {
            $saldo = Data::where('noRek', $request->id)->get();
            $saldocek = Data::where('noRek', $request->id)->first();
            if ($saldocek != null) {
                $res['success'] = true;
                $res['message'] = $saldo;

                return response()->json($res);
            }else{
                $res['success'] = false;
                $res['message'] = 'cannot find User';

                return response()->json($res);
            }
        }

    }

    function getapi(Request $request)
    {

        $curlService = new \Ixudra\Curl\CurlService();

        $a = $curlService->to('http://127.0.0.1:8080/api/v1/user/saldo/?api_token=81cc189844a243c5bb2888aca08e5607d6b3cf5a&id=123456')
        ->returnResponseObject()
        ->get();

        return $a;
    }
}



// $handler = new CurlHandler();
        // $stack = HandlerStack::create($handler);
        // $stack->push(add_header('api_token', '81cc189844a243c5bb2888aca08e5607d6b3cf5a'));
        // $client = new Client(['handler' => $stack]);
        // $id = $request->id;
        // $headers = [
        //     'api_token' => '81cc189844a243c5bb2888aca08e5607d6b3cf5a',
        //     'Accept' => 'application/json'
        // ];
        // $apiUrl = 'http://127.0.0.1:8080/api/v1/user/saldo/';

        // try {
        //     $client = new Client([
        //         'handler' => $stack,
                
        //     ]);

        //     $respons = $client->request('POST', $apiUrl, [
                
        //         'debug' => true,
                
        //     ]);
            
        //     echo $respons->getStatusCode();

        // } catch ( \GuzzleHttp\Exception\ClientException $exception ) {
        //     echo $exception->getResponse()->getBody();
        // }


        // $respons = new GuzzleHttp\Psr7\Request('GET', $apiUrl, [
        //     'json'  => ['id' => '123456'],
        //     'timeout' => 5,
        //     'debug' => true,
        // ]);
        // ->getBody()->getContents()