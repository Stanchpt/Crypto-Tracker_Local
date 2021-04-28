<?php

namespace App\Services;

use Symfony\Contracts\HttpClient\HttpClientInterface;


class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    public function getDataCrypto():array
    {
        $apikey="c80075db-4fb4-49dd-8d31-41a04a532861";
        $response = $this->client->request(
            'GET',
            'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest?CMC_PRO_API_KEY='.$apikey,
            [
                'query' => [
                    'start' => '1',
                    'limit' => '2',
                    'convert' => 'USD'
                ],
            ]);

        return $response->toArray();

        //return['test', 'test2'];

    }
}