<?php include 'header.php'; 
	echo "<h3>Book Update</h3>";
	$title = str_replace("'","&apos;", $_POST['title']);
	$author = $_POST['author'];
	$comment = nl2br($_POST['comment']);
	$review = nl2br($_POST['review']);
	if (str_contains($review,"'") || str_contains($comment, "'")) {
		$review = str_replace("'","&apos;", $review);
		$comment = str_replace("'","&apos;", $comment);
	}
	$rating = $_POST['rating'];
	$genre = $_POST['genre'];
	$cost = $_POST['cost'];
	if ($cost == '' or $cost == null){ $cost = 0.00; } 
	$dateread = $_POST['dateread'];
	$booklocation = $_POST['booklocation'];
	if ($booklocation == 'Shelf') {
		$booklocation = $booklocation." ".$_POST['shelfnum'];

	}
	//Need to adjust the logic here in case there is an empty book value, or predefined
	//ensure that it can be handled if the image already exists it isn't cleared.
	$updatequery = "";
	if(isset($_POST['update'])){
		$bookID = $_POST['bookID'];
		if ($_FILES['image']['tmp_name'] != null) {
			$tmpimage = $_FILES['image']['tmp_name']; //need to add this feature
			$bookimage = basename($_FILES['image']['name']);
			$curdir = getcwd();
			$savefile = $curdir."/images/".$bookimage;
			$bookimgname = "images/".$bookimage;
			move_uploaded_file($tmpimage, $savefile) or die("Cannot move uploaded file to working directory");
			
			$updatequery = "UPDATE `thelibrary` SET Title='$title', `Primary Author`='$author', Comment='$comment', Review='$review', Tags='$genre', Cost='$cost', `Date Read`='$dateread', BookLocation='$booklocation', Rating='$rating', Image='$bookimgname' WHERE `Book ID` = '$bookID'";
		}
		else { 
			$bookimgname = '';
			$updatequery = "UPDATE `thelibrary` SET Title='$title', `Primary Author`='$author', Comment='$comment', Review='$review', Tags='$genre', Cost='$cost', `Date Read`='$dateread', BookLocation='$booklocation', Rating='$rating' WHERE `Book ID` = '$bookID'";
		}
		
		if($bookrslt = $mysqli->query($updatequery)){
			echo "<div class='postlink' ><p>Book $title updated</p></div>";
		}
		else { echo "<div class='postlink' ><p>An error occurred ".$mysqli->error."</p></div>"; }

	}
	else {
		$bookID = date('Ymd').rand(0,9);
		if ($_FILES['image']['tmp_name'] != null) {
			$tmpimage = $_FILES['image']['tmp_name']; //need to add this feature
			$bookimage = basename($_FILES['image']['name']);
			$curdir = getcwd();
			$savefile = $curdir."/images/".$bookimage;
			$bookimgname = "images/".$bookimage;
			move_uploaded_file($tmpimage, $savefile) or die("Cannot move uploaded file to working directory");
		}
		else { $bookimgname = ''; }
		$insertquery = "INSERT INTO `thelibrary`(`Book ID`, `Title`, `Image`, `Primary Author`, `Review`, `Rating`, `Comment`, `Date Read`, `Tags`, `Cost`, `BookLocation`) VALUES ('$bookID', '$title', '$bookimgname', '$author', '$review', '$rating', '$comment', '$dateread', '$genre', '$cost', '$booklocation')";
		if($bookrslt = $mysqli->query($insertquery)){
			echo "<div class='postlink' ><p>Book $title added</p></div>";
		}
		else { echo "<div class='postlink' ><p>An error occurred ".$mysqli->error."</p></div>"; }

	}
?>
</body>
</html>
