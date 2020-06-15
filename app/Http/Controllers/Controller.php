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
        $url='https://donasi.online/baznas-kota-bogor/program/get/list-user-program';
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
            return  array();
        }
    }

    public function getkitabisa()
    {
        // https://core.kitabisa.com/campaigns/05eca69b651d5202966d791b3d9921e5/donated
        $url='https://core.kitabisa.com/campaigns/05eca69b651d5202966d791b3d9921e5/donated';
        try
        {
            // $data = [
            //             'lembagaCode' => 'URQJNT',
            //             'programGroupUrl' => '0',
            //             'sorting' => '1',
            //             'kondisi' => '0',
            //             'start' => '0',
            //             'length' => '9',
            //             'orderBy' => '',
            //             'orderByType' => '',
            //             'keywordSearch' => '',
            //             'keywordSearchType' => '',
            //             'kategori' => '0',
            //             'daerah' => '0'
            //         ];
            $header=[
                'Accept' => '*/*',
                'Content-Type' => 'application/x-www-form-urlencoded'
                
            ];
            $client = new Client();
            $result = $client->get($url, ['headers'=>$header]);
            $isi=$result->getBody()->getContents();
            $data = json_decode($isi);
            return collect($data->data);
        }
        catch(\Exception $e)
        {
            return  array();
        }
    }
    public function getkitabisa2()
    {
        // https://core.kitabisa.com/campaigns/05eca69b651d5202966d791b3d9921e5/donated
        $url='https://core.kitabisa.com/campaigns/05eca69b651d5202966d791b3d9921e5/donated';
        $d=file_get_contents($url);
        return $d;
    }
}
