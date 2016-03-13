<?php
include "Controller.php";
$controller = new Controller;
$allTopic = $controller->getTopic();
$arr = json_decode($allTopic);
$stateChange = $_REQUEST['vote'];
//get content of textfile
if ($stateChange == "true") { // if $stateChange to Recentlly
    if (is_array($arr) || is_object($arr)){
?>
        <div class="isotope-container row grid-space-20">
<?php
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
?>
        </div >
<?php
    }
}else if($stateChange == "false") { // $stateChange to tag
	$checking = 0;
	$town = array();
	$forest = array();
	$mountain = array();
	$sea = array();
	if (is_array($arr) || is_object($arr)){
        foreach ($arr as $eachTopic) {
            $topic = json_decode($eachTopic,true);
            if($topic['tag'] == "forest"){
            	array_push($forest, $topic);
            }else if($topic['tag'] == "town"){
            	array_push($town, $topic);
            }else if($topic['tag'] == "mountain"){
            	array_push($mountain, $topic);
            }else if($topic['tag'] == "sea"){
            	array_push($sea, $topic);
            }
        }
    }
    if($town != null){
?>
        <div class="row">
                <h4>Town</h4>
        </div>
        <div class="isotope-container row grid-space-20">
<?php
        foreach ($town as $topic) {
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
?>
    </div>
<?php
    }
    if($forest != null){
?>
        <div class="row">
            <div class="col-sm-6 col-md-3 isotope-item app-development">
                <h4>Forest</h4>
            </div>
        </div>
        <div class="isotope-container row grid-space-20">
<?php
        foreach ($forest as $topic) {
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
?>
    </div>
<?php
    }
    if($sea != null){
?>
        <div class="row">
            <div class="col-sm-6 col-md-3 isotope-item app-development">
                <h4>Sea</h4>
            </div>
        </div>
        <div class="isotope-container row grid-space-20">
<?php
        foreach ($sea as $topic) {
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
?>
        </div>
<?php
    }
    if($mountain != null){
?>
        <div class="row">
            <div class="col-sm-6 col-md-3 isotope-item app-development">
                <h4>Mountain</h4>
            </div>
        </div>
        <div class="isotope-container row grid-space-20">
<?php
        foreach ($mountain as $topic) {
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
 ?> 
    </div>
<?php
    }
}
?>