	<?php
	include 'ReviewModel.php';
	include 'WeatherModel.php';
	if(isset($_POST['submit'])){
			$con = new Controller;
			$con->insertReview();
	}
	Class Controller{

		public function getReview($id){
			$models = new ReviewModel;
			$topics = $models->getAllReview();
			$result = array();
			if (is_array($topics) || is_object($topics))
			{
				foreach ($topics['rows'] as $topic) {
					$field = $topic['doc'];
					if($field['_id'] === $id){
						return $field;
					}
				}
			}
			return null;
		}

		public function getTopic(){
			$models = new ReviewModel;
			$topics = $models->getAllReview();
			$result = array();
			if (is_array($topics) || is_object($topics))
			{
				//make array of all topic
				foreach($topics['rows'] as $topic) {
					$field = $topic['doc'];
					array_push($result, '{ "id":"' . $field['_id'] . '","images":"' . $field['image'] . '","topic":"' . $field['topic'] . '","timestamp":"' . $field['timestamp'] . '"}' );
				}
				return json_encode($result);
			}
		}

		public function getWeather($la,$lo,$tag){
			$weatherModel = new WeatherModel;
			$json = file_get_contents('https://ad46647d-1b77-4644-b8c6-78eed562b7a3:NAgf7Zkmlo@twcservice.au-syd.mybluemix.net:443/api/weather/v2/forecast/daily/10day?units=m&geocode='.$la.','.$lo.'&language=en-US');
			$obj = json_decode($json);
			$rain_day = array();
			$rain_night = array();
			$result = array();
			$forcasts = $obj->{'forecasts'};
			$s = 0;
			$c = 0;
			$t = 0;
			$cn = 0;
			$tn = 0;
			// count stat of forcast each day
			foreach ($forcasts as $forcast) {
				$day = $forcast->{'day'} ;
				$night = $forcast->{'night'};
				 if($day != NULL){
					 if(strpos($day->{'shortcast'}, 'sun' ) !== false || strpos($day->{'shortcast'}, 'Sun' ) !== false)
					 		$s++;
					 else if(strpos($day->{'shortcast'}, 'thunderstorm' ) !== false){
						 	//add date
						 	array_push($rain_day,$day->{'fcst_valid_local'});
						 	$t++;
					 }
					 else{
					 		$c++;
					}
				 }
				 if($night != NULL){
					if(strpos($night->{'shortcast'}, 'thunderstorm' ) !== false || strpos($night->{'shortcast'}, 'rain' ) !== false){
						 //add date
						 	array_push($rain_night,$night->{'fcst_valid_local'});
					 		$tn++;
						}
					 else{
					 		$cn++;
					}
				 }
			}
			//calculate prop
			//day
			$rain_day_print = "";
			foreach ($rain_day as $value) {
				$rain_day_print = $rain_day_print . " " . $value;
			}
			array_push($result,'{"period":"day","temp":"sun","percent":"'. round(($s/($s+$c+$t))*100,2) .'%","date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"day","sun").'"}');
			array_push($result,'{"period":"day","temp":"clear","percent":"'. round(($c/($s+$c+$t))*100,2) .'%","date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"day","clear").'"}');
			array_push($result,'{"period":"day","temp":"rain","percent":"'. round(($t/($s+$c+$t))*100,2) .'%","date":"'. $rain_day_print .'","description" : "' . $weatherModel->getWeatherByKeys($tag,"day","rain").'"}');
			//night
			$rain_night_print = "";
			foreach ($rain_night as $value) {
				$rain_night_print = $rain_night_print . " " . $value;
			}
			array_push($result,'{"period":"night","temp":"clear","percent":"'. round(($cn/($cn+$tn))*100,2) .'%","date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"night","clear").'"}');
			array_push($result,'{"period":"night","temp":"rain","percent":"'. round(($tn/($cn+$tn))*100,2) .'%","date":"'. $rain_night_print .'","description" : "' . $weatherModel->getWeatherByKeys($tag,"night","rain").'"}');

			return json_encode($result);
		}

		public function insertReview(){
			$models = new ReviewModel;
			  $image = $_POST['image'];
			  $topic = $_POST['topic'];
			  $detail = $_POST['detail'];
			  $tag = $_POST['tag'];
			  $location = $_POST['location'];
			  $json = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$location.'&key=AIzaSyDjBCeazLnByvNQlC8nvbXf-p4hm15MaBo');
			  $obj = json_decode($json);
			  $results = $obj->{'results'};
			  $results = $results[0];
			  $geo = $results->{'geometry'};
			  $geo = $geo->{'location'};
			  $lat = $geo->{'lat'};
			  $long = $geo->{'lng'};
			  $succ = $models->insertDB($image,$topic,$detail,$tag,$lat,$long);
			  $succ = json_decode($succ);
			  //var_dump($detail);
			  if($succ->{'ok'} == 'true'){
			  	header( "location: Topic.php" );
 				exit(0);
			  }
			  else{
			  	echo "Submit error pls try again";
			  	echo '<br><a href="PostReview.php"> <button> try again </button> </a>';
			  }
		}
	}
?>
