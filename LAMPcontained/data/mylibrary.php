<?php include 'header.php'; 
//put in the search parameters here

if(isset($_POST['booksearch'])){
	$searchquery = $_POST['booksearch'];
	$libquery = "SELECT * FROM thelibrary WHERE Title LIKE '%$searchquery%' OR `Primary Author` LIKE '%$searchquery%'";
}
else { $libquery = "SELECT * FROM thelibrary ORDER BY `Date Read` DESC"; }


//search bar
echo "<table width='100%' cellpadding='0' border='0' align='center'>
	<tr><td></td><td colspan='5' class='search'>
	<form method='post' action='".$_SERVER['PHP_SELF']."'>
	<input name='booksearch' type='text' class='search' placeholder='Search by title or author name'>  
	<input class='search' type='submit' value='SEARCH' ></form>
	</td><td></td></tr>";

$itemcnt = 0;
echo "<tr><td></td>";
if($books = $mysqli->query($libquery)) {
	while ($bookRow = mysqli_fetch_assoc($books)){
		$author = $bookRow['Primary Author'];
		$title = str_replace("'","&apos;",$bookRow['Title']);
		$dateread = $bookRow['Date Read'];
		$review = $bookRow['Review'];
		$rating = $bookRow['Rating'];
		$bookID = $bookRow['Book ID'];
		$comment = $bookRow['Comment'];
		
		if ($itemcnt < 5) {
			echo  "<td class='usrname'><div class='postlink overview'><strong>$title</strong><br><br>
				Author: $author<br><br>Date read: $dateread<br><br>
				<form method='post' action='viewbook.php'>
				<input type='hidden' name='title' value='$title'>
				<input type='hidden' name='author' value='$author'>
				<input type='hidden' name='bookID' value='$bookID'>
				<input type='submit' value='VIEW' class='view'></form>
				<div class='logoutdropdown'>$comment</div>
				</div></td>";
			$itemcnt++;
		
		}
		else if($itemcnt >= 5) {
			echo "<td></td></tr><tr><td></td>
				<td class='usrname'><div class='postlink overview'><strong>$title</strong><br><br>
				Author: $author<br><br>Date read: $dateread<br><br>
				<form method='post' action='viewbook.php'>
				<input type='hidden' name='title' value='$title'>
				<input type='hidden' name='author' value='$author'>
				<input type='hidden' name='bookID' value='$bookID'>
				<input type='submit' value='VIEW' class='view'></form>
				<div class='logoutdropdown'>$comment</div>
				</div></td>";
			$itemcnt = 1;
		}
		
	} echo "</tr>";
}
else "<div class='postlink'><p>Error connection to the database</p></div>";

?>
</table>
</body>
</html>
