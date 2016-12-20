<?php
require '../vendor/autoload.php';
$client = new \GuzzleHttp\Client();

$body='ff';
$headers = ['X-Foo' => 'Bar'];
$body = json_encode('hello!');
// $request = new \GuzzleHttp\Psr7\Request('PUT', 'http://localhost/play-pro5/trash/trash7.php', ['body' => 'bar']
  // );
$params = ['Foo' => 'Bar'];

$r = $client->request('PUT', 'http://localhost/play-pro5/trash/trash7.php', ['body' => 'bar']);
// $body = new \GuzzleHttp\Psr\Http\Message\StreamInterface(http_build_query($params));
/*$request = $request->withBody($params);*/
print_r($r->getBody());
/*$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
$promise->wait();*/






?>  