<?php

namespace App\Components;

use GuzzleHttp\Client;

class ImportDataClient
{
    public $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://jsonplaceholder.typicode.com/',
            'timeout' => 15,
            'connect_timeout' => 5,
        ]);
    }
}
