<?php include 'header.php'; 
echo "<h3>Book Details</h3>";

$title = $_POST['title'];
$author = $_POST['author'];
$authorUpdate = str_replace(",", "&comma;", $author);
$bookID = $_POST['bookID'];

$findbook = "SELECT * FROM librarything_neurodrew WHERE `Book ID` = '$bookID'";

if($bookrslt = $mysqli->query($findbook)) {
	while ($bookDetails = mysqli_fetch_assoc($bookrslt)){
		$comment = $bookDetails['Comment'];
		$review = $bookDetails['Review'];
		if (str_contains($review,"'") {
			$review = str_replace("'","&apos;", $review);
		}
		$review = str_replace("\n", "<br><br>", $review);
		$rating = $bookDetails['Rating'];
		$genre = $bookDetails['Tags'];
		$cost = $bookDetails['Cost'];
		$image = $bookDetails['Image'];
		$dateread = $bookDetails['Date Read'];
		$booklocation = $bookDetails['BookLocation'];
	}
	echo "<div class='postlink'>
		<form method='post' action='newbook.php' class='updatebook'>
		<input type='hidden' name='title' value='$title'>
		<input type='hidden' name='author' value='$author'>
		<input type='hidden' name='rating' value='$rating'>
		<input type='hidden' name='cost' value='$cost'>
		<input type='hidden' name='booklocation' value='$booklocation'>
		<input type='hidden' name='genre' value='$genre'>
		<input type='hidden' name='dateread' value='$dateread'>
		<input type='hidden' name='image' value='$image'>
		<input type='hidden' name='review' value='$review'>
		<input type='hidden' name='comment' value='$comment'>
		<input type='hidden' name='bookID' value='$bookID'>
		<input type='submit'  name='updatebook' value='Update'>
		</form>
		<h4><strong>Title: </strong>$title</h4>";
	if (isset($image)) {
		echo "<div style='text-align: center;'><img style='max-width: 200px; max-height: 300 px;' src='$image'></div>";
	}
	echo "<table width='100%' cellpadding='3px' border='0px'>
		<tr><td><strong>Author: </strong>$author</td><td><strong>Genre: </strong>$genre</td></tr>
		<tr><td><strong>Date read: </strong>$dateread</td><td><strong>Rating: </strong>$rating</td></tr>
		<tr><td><strong>Book location: </strong>$booklocation</td><td><strong>Cost:</strong> &#36;$cost</td></tr>
		<tr><td colspan='2'><strong>Review:</strong><p>$review</p></td></tr>
		<tr><td colspan='2'><strong>Comment:</strong><p>$comment</p></td></tr>
		</table>
		
		</div>";
}
else { echo "<p>Sorry there was error locating that title</p>"; }


?>
</body>
</html>
