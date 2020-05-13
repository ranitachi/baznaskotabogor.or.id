<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getprogram()
    {
        $url='https://donasi.online/program/get/list-user-program';
        try
        {
            $data = [
                        'lembagaCode' => 'URQJNT',
                        'programGroupUrl' => '0',
                        'sorting' => '1',
                        'kondisi' => '0',
                        'start' => '0',
                        'length' => '9',
                        'orderBy' => '',
                        'orderByType' => '',
                        'keywordSearch' => '',
                        'keywordSearchType' => '',
                        'kategori' => '0',
                        'daerah' => '0'
                    ];
            $header=[
                'Accept' => '*/*',
                'Content-Type' => 'application/x-www-form-urlencoded'
                
            ];
            $client = new Client();
            $result = $client->post($url, ['headers'=>$header,'form_params' => $data]);
            $isi=$result->getBody()->getContents();
            $data = json_decode($isi);
            return collect($data->listProgramUser);
        }
        catch(\Exception $e)
        {
            return  0;
        }
    }
}
