
<?php
require '../vendor/autoload.php';
/*$client = new \GuzzleHttp\Client();*/
// Create a PSR-7 request object to send
/*$headers = ['X-Foo' => 'Bar'];
$body = 'Hello!';*/
/*$request = new \GuzzleHttp\Psr7\Request('HEAD','http://localhost/play-pro5/trash/trash7.php', $headers, $body);
  echo 'efe';
$r = $client->request('PUT', 'http://localhost/play-pro5/trash/trash7.php', [
    'json' => ['foo' => 'bar']
])->then(function ($response) {
    echo 'I completed! ' . $response->getBody();*/


// Or, if you don't need to pass in a request instance:
/*$promise = $client->requestAsync('GET','http://localhost/play-pro5/trash/trash7.php');*/
/*print_r('fsff')*/;

/*$r = $client->request('PUT', 'http://httpbin.org/put', [
    'json' => ['foo' => 'bar']
]);
*/


$client = new \GuzzleHttp\Client();

$request = new \GuzzleHttp\Psr7\Request('POST', 'http://localhost/play-pro5/trash/trash7.php',array() ,'Hello');

$promise = $client->sendAsync($request)->then(function ($response) {
    echo 'I completed! ' . $response->getBody();
});
$promise->wait();
?>