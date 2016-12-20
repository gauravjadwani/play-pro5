<?php

require 'vendor/autoload.php';
$client = new \GuzzleHttp\Client();
/*$res = $client->request('GET', 'http://www.ethnus.com');
echo $res->getStatusCode();
// 200	
echo $res->getHeaderLine('content-type');
// 'application/json; charset=utf8'
echo $res->getBody();*/
// '{"id": 1420053, "name": "guzzle", ...}'

// Send an asynchronous request.

$request = new \GuzzleHttp\Psr7\Request('get','http://localhost/play-pro5/trash/trash7.php');
$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
$promise->wait();





?>