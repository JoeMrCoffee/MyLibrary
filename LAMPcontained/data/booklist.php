<?php include 'header.php'; 

$libquery = "SELECT * FROM thelibrary ORDER BY `Date Read` DESC";

$costCnt = 0;
$bookCnt = 0;
echo "<table align='center' width='80%' class='postlink'>
	<tr><th>Title</th><th>Author</th><th>Date Read</th><th>Rating</th><th>Cost</th><th>Details</th></tr>";
if($books = $mysqli->query($libquery)) {
	while ($bookRow = mysqli_fetch_assoc($books)){
		$author = $bookRow['Primary Author'];
		$title = $bookRow['Title'];
		$dateread = $bookRow['Date Read'];
		$rating = $bookRow['Rating'];
		$bookID = $bookRow['Book ID'];
		$bookcost = $bookRow['Cost'];
		echo "<tr><form action='viewbook.php' method='post'>
			<input type='hidden' name='bookID' value='$bookID'>
			<td>$title</td><td>$author</td><td>$dateread</td><td>$rating</td><td>$bookcost</td>
			<td><input type='submit' value='View'></td></form></tr>";
		$costCnt = $costCnt+$bookcost;
		$bookCnt += 1;
	}
	echo "<tr><td colspan='5'><strong>Total cost/value</strong></td><td><strong>$ $costCnt</td><tr>";
	echo "<div class='booksummary'>Book #: $bookCnt<br>Cost: $ $costCnt</div>";
}
else "<p>Error connection to the database</p>";

?>
</table>
</body>
</html>
