<?php
namespace App\Controllers;
use App\Classes\Controller_Base;
Class Controller_Weather  Extends Controller_Base
{
    public $layouts = "first_layouts";

    public function index()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://query.yahooapis.com/v1/public/yql?q=select *%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22zaporozhye%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
        $data = $res->getBody();
        $result = json_decode($data);
        $this->template->vars('result',$result);
        $this->template->view('index');
    }
}