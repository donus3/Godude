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
			$sn = 0;
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
					 if(strpos($night->{'shortcast'}, 'sun' ) !== false)
					 		$sn++;
					 else if(strpos($night->{'shortcast'}, 'thunderstorm' ) !== false){
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
			array_push($result,'{"period":"day","percent"'. $s .',"date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"day","sun").'"}');
			array_push($result,'{"period":"day","percent"'. $c .',"date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"day","clear").'"}');
			array_push($result,'{"period":"day","percent"'. $t .',"date":"'. $rain_day_print .'","description" : "' . $weatherModel->getWeatherByKeys($tag,"day","rain").'"}');
			//night
			$rain_night_print = "";
			foreach ($rain_night as $value) {
				$rain_night_print = $rain_night_print . " " . $value;
			}
			array_push($result,'{"period":"night","percent"'. $sn .',"date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"night","sun").'"}');
			array_push($result,'{"period":"night","percent"'. $cn .',"date":null,"description" : "' . $weatherModel->getWeatherByKeys($tag,"night","clear").'"}');
			array_push($result,'{"period":"night","percent"'. $tn .',"date":"'. $rain_night_print .'","description" : "' . $weatherModel->getWeatherByKeys($tag,"night","rain").'"}');

			return json_encode($result);
		}

		public function insertReview(){
			$models = new ReviewModel;
			$target_dir = "images/";
			$target_file = $target_dir . basename($_FILES["image"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
			    $check = getimagesize($_FILES["image"]["tmp_name"]);
			    if($check !== false) {
			        echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.";
			        $uploadOk = 0;
			    }
			}
			// Check if file already exists
			if (file_exists($target_file)) {
			    echo "Sorry, file already exists.";
			    $uploadOk = 0;
			}
			// Check file size
			if ($_FILES["image"]["size"] > 500000) {
			    echo "Sorry, your file is too large.";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
			        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
			    } else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
			  $image = $_POST['image'];
			  $topic = $_POST['topic'];
			  $detail = $_POST['detail'];
			  $tag = $_POST['tag'];
			  $lat = $_POST['lat'];
			  $long = $_POST['long'];
			  $succ = $models->insertDB($image,$topic,$detail,$tag,$lat,$long);
			  $succ = json_decode($succ);
			  if($succ->{'ok'} == 'true'){
			  	header( "location: Topic.php" );
 				exit(0);
			  }
			  else{
			  	echo "Submit error pls try again";
			  	echo '<a href="Topic.php"> <button> try again </button> </a>';
			  }
		}
	}
?>
