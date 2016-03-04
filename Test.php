<?php

include 'Controller.php';

$con = new Controller;
//var_dump($con->getTopic());
//var_dump($con -> getReview('50cc588a95ffe2c2589b693f84c8702d'));
//var_dump(json_decode($con -> getWeather(1,2,"tag")));


?>
<form action = <?php ?> method="post">
	<input type="file" name="image"> </input>
	<input type="text" name="topic"></input>
	<input type="text" name="detail"></input>
	<input type="text" name="tag"></input>
	<input type="text" name="lat"></input>
	<input type="text" name="long"></input>

</form>>