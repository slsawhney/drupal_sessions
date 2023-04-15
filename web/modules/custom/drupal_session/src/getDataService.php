<?php

namespace Drupal\drupal_session;

//use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\TransferException;

//use Symfony\Component\DependencyInjection\ContainerInterface;

class getDataService {

  protected $http_client;

  public function __construct($guzzleHttp) {
    $this->http_client = $guzzleHttp;
  }

  public function getData() {

    try {
      $request = $this->http_client->get('//springer.eu/de/news-list/en', [
        'headers' => [
          //'Authorization' => 'Bearer ' . $auth_token,
          'Content-Type' => 'application/json',
        ],
      ]);
      return $apiResponse = json_decode($request->getBody());
    } catch (ClientException|RequestException|TransferException|BadResponseException $exception) {
      watchdog_exception('drupal_session', $exception, NULL, [], 6);
      return json_decode((string) $exception->getResponse()->getBody());
    }


    /*$data_set = [
          0 => ['name' => 'Manish', 'age' => 37, 'dob' => 'abc'],
          1 => ['name' => 'Mohan', 'age' => 38, 'dob' => 'abc'],
          2 => ['name' => 'Himani', 'age' => 39, 'dob' => 'abc']
        ];

        return $data_set;*/
  }

}
