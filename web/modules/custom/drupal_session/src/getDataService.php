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
      $token = \Drupal::getContainer()->get('csrf_token');
      $config = \Drupal::config('drupal_session.settings');
      $external_api_url = $config->get('external_api_url');

      $request = $this->http_client->get($external_api_url, [
        'headers' => [
          //'Authorization' => 'Bearer ' . $auth_token,
          'Content-Type' => 'application/json'
        ]
      ]);
      return $apiResponse = json_decode($request->getBody());
    } catch (ClientException|RequestException|TransferException|BadResponseException $exception) {
      watchdog_exception('drupal_session', $exception, NULL, [], 6);
      return json_decode((string) $exception->getResponse()->getBody());
    }
  }

}
