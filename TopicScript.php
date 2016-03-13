<?php
include "Controller.php";
$controller = new Controller;
$allTopic = $controller->getTopic();
$arr = json_decode($allTopic);
$vote = $_REQUEST['vote'];

//get content of textfile
if ($vote == "true") {
    if (is_array($arr) || is_object($arr)){
        foreach ($arr as $eachTopic) {
            $topic = json_decode($eachTopic,true);


?>
            <div class="col-sm-6 col-md-3 isotope-item app-development">
                <div class="image-box">
                    <div class="overlay-container">
                        <img name="<?php echo $topic['id'] ?>" href="getReview.php" src="<?php echo $topic['images'] ?>"> 
                                            <!-- Image here -->
                        <a href="getReview.php?id=<?php echo $topic['id']; ?>" class="overlay"></a>
                    </div>
                                        <!-- call something from ... -->
                    <a style="color: black" href="getReview.php?id=<?php echo $topic['id']; ?>" class="btn btn-default btn-block" data-target="getReview.php" ><?php echo $topic['topic'] ?></a>
                </div>
            </div>
<?php
        }
    }
}else if ($vote == "false") {
	if (is_array($arr) || is_object($arr)){
        foreach ($arr as $eachTopic) {
            $topic = json_decode($eachTopic,true);
            if($topic['tag'] == "forest"){
?>
				
				<div class="col-sm-6 col-md-3 isotope-item app-development">
	                <div class="image-box">
	                    <div class="overlay-container">
	                        <img name="<?php echo $topic['id'] ?>" href="getReview.php" src="<?php echo $topic['images'] ?>"> 
	                                            <!-- Image here -->
	                        <a href="getReview.php?id=<?php echo $topic['id']; ?>" class="overlay"></a>
	                    </div>
	                                        <!-- call something from ... -->
	                    <a style="color: black" href="getReview.php?id=<?php echo $topic['id']; ?>" class="btn btn-default btn-block" data-target="getReview.php" ><?php echo $topic['topic'] ?></a>
	                </div>
	            </div>
<?php
	      	}else if($topic['tag'] == "town"){
?>
				<div class="col-sm-6 col-md-3 isotope-item app-development">
	                <div class="image-box">
	                    <div class="overlay-container">
	                        <img name="<?php echo $topic['id'] ?>" href="getReview.php" src="<?php echo $topic['images'] ?>"> 
	                                            <!-- Image here -->
	                        <a href="getReview.php?id=<?php echo $topic['id']; ?>" class="overlay"></a>
	                    </div>
	                                        <!-- call something from ... -->
	                    <a style="color: black" href="getReview.php?id=<?php echo $topic['id']; ?>" class="btn btn-default btn-block" data-target="getReview.php" ><?php echo $topic['topic'] ?></a>
	                </div>
	            </div>
<?php
			}
		}
	}
}
 ?> 