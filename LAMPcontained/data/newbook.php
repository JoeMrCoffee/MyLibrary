<?php include 'header.php'; 
echo "<h3>Input Book Details</h3>";

if(isset($_POST['updatebook'])){
	$title = $_POST['title'];
	if (str_contains($title,"'")) {
		$title = str_replace("'","&apos;", $title);
	}
	$author = $_POST['author'];
	$comment = $_POST['comment'];
	$review = $_POST['review'];
	$review = str_replace("<br><br>","\n", $review);
	$rating = $_POST['rating'];
	$genre = $_POST['genre'];
	$cost = $_POST['cost'];
	$image = $_POST['image'];
	$dateread = $_POST['dateread'];
	$booklocation = $_POST['booklocation'];
	$bookID = $_POST['bookID'];

	echo "<form method='post' action='updatebook.php' enctype='multipart/form-data'><div class='postlink'>
		<h4><strong>Title: </strong>$title</h4><input type='hidden' name='title' value='$title'>";
	if ($image != '') {
		echo "<div style='text-align: center;'><img style='max-width: 400px; max-height: 400 px;' src='$image'></div>";
	}
	else { echo "<p>Add an image for the book? &nbsp;&nbsp;<input type='file' name='image'></p>"; }
	echo "<table width='100%' cellpadding='3px' border='0px'>
		<tr><td><strong>Author: </strong><input type='text' name='author' value='$author'></td><td><strong>Genre: </strong><input type='text' name='genre' value='$genre'></td></tr>
		<tr><td><strong>Date read: </strong><input type='date' name='dateread' value='$dateread'></td><td><strong>Rating: </strong><input type='text' name='rating' value='$rating'></td></tr>
		<tr><td><strong>Book location: </strong><select type='text' name='booklocation' id='booklocation' onclick='numInput()' value='$booklocation'>
			<option value='Shelf'>Shelf</option>
			<option value='Ebook'>Ebook</option>
			<option value='Donated'>Donated</option>
		</select>&nbsp;&nbsp;<input type='number' id='shelfnum' style='visibility: hidden;' name='shelfnum'>
		</td><td><strong>Cost:</strong> &#36;<input type='text' name='cost' value='$cost'></td></tr>
		<tr><td colspan='2'><strong>Review:</strong><p><textarea class='giantinput' name='review' >$review</textarea></td></tr>
		<tr><td colspan='2'><strong>Comment:</strong><p><textarea class='giantinput' name='comment' >$comment</textarea></td></tr>
		<input type='hidden' name='bookID' value='$bookID'>
		<tr><td><input type='submit' name='update' value='Update'></td><td></td></tr>
		</table></div></form>";
}
else {
	echo "<form method='post' action='updatebook.php' enctype='multipart/form-data'><div class='postlink'>
		<h4><strong>Title: </strong><input type='text' name='title'></h4>
		<p>Add an image for the book? &nbsp;&nbsp;<input type='file' name='image'></p>
		<table width='100%' cellpadding='3px' border='0px'>
		<tr><td><strong>Author: </strong><input type='text' name='author'></td><td><strong>Genre: </strong><input type='text' name='genre' ></td></tr>
		<tr><td><strong>Date read: </strong><input type='date' name='dateread'></td><td><strong>Rating: </strong><input type='text' name='rating'></td></tr>
		<tr><td><strong>Book location: </strong><select type='text' name='booklocation' id='booklocation' onclick='numInput()'>
			<option value='Shelf'>Shelf</option>
			<option value='Ebook' selected>Ebook</option>
			<option value='Donated'>Donated</option>
		</select>&nbsp;&nbsp;<input type='number' id='shelfnum' style='visibility: hidden;' name='shelfnum'>
		</td><td><strong>Cost:</strong> &#36;<input type='text' name='cost'></td></tr>
		<tr><td colspan='2'><strong>Review:</strong><p><textarea class='giantinput' name='review' ></textarea></td></tr>
		<tr><td colspan='2'><strong>Comment:</strong><p><textarea class='giantinput' name='comment' ></textarea></td></tr>
		<tr><td><input type='submit' name='insert' value='Insert'></td><td></td></tr>
		</table></div></form>";
}
?>
</body>
<script>
	function numInput() {
		var location = document.getElementById('booklocation').value;
		console.log(location);
		var shelfnum = document.getElementById('shelfnum');
	
		if (location == 'Shelf') {
    			shelfnum.style.visibility = 'visible';
 		} 
 		else { shelfnum.style.visibility = 'hidden'; }
		
	}
</script>
</html>
