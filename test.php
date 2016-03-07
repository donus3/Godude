<?php
include 'Controller.php';
$c = new Controller;
//var_dump($c->getTopic());
//var_dump($c->getReview('1ccb861ef7036b0fca5af65d3adcd054'));
$x = $c->getReview('1ccb861ef7036b0fca5af65d3adcd054');
var_dump($c->getWeather($x['lat'],$x['long'],$x['tag']));
?>