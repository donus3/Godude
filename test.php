<?php
/*include 'Controller.php';
$c = new Controller;
//var_dump($c->getTopic());
//var_dump($c->getReview('1ccb861ef7036b0fca5af65d3adcd054'));
$x = $c->getReview('1ccb861ef7036b0fca5af65d3adcd054');
var_dump($c->getWeather($x['lat'],$x['long'],$x['tag']));*/
			$location = "เกาะล้าน";
			  $json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$location.'&key=AIzaSyDjBCeazLnByvNQlC8nvbXf-p4hm15MaBo');
			  $obj = json_decode($json);
			  $results = $obj->{'results'};
			  $results = $results[0];
			  $geo = $results->{'geometry'};
			  $geo = $geo->{'location'};
			  $lat = $geo->{'lat'};
			  $long = $geo->{'lng'};
			  var_dump($lat);
?>