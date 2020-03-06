<?php
	require_once 'db_config.php';
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname",
			$username,
			$password,
			array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
?>
<form method="post">
	<input type="text" name="search" id="search"/>
	<input type="submit"/>
</form>

<table border=1>
	<tr>
		<th>Book</th>
		<th>Author</th>
		<th>Publisher</th>
	</tr>
	<?php
		$t = "book_title";
		$a = "author_name";
		$p = "publisher_name";
		if(isset($_POST['search'])){
			$search = '%'.htmlentities($_POST['search']).'%';
			$stmt = $conn->prepare("SELECT book.title AS book_title, author.name AS author_name, publisher.name AS publisher_name
				FROM book_author
				INNER JOIN book using (book_id)
				INNER JOIN author using (author_id)
				INNER JOIN publisher using (publisher_id)
				WHERE book.title LIKE :search
				OR author.name LIKE :search
				OR publisher.name LIKE :search");
			$stmt->bindParam(':search', $search);
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
		else{
			$stmt = $conn->prepare("SELECT book.title AS book_title, author.name AS author_name, publisher.name AS publisher_name
				FROM book_author
				INNER JOIN book using (book_id)
				INNER JOIN author using (author_id)
				INNER JOIN publisher using (publisher_id)");
			$stmt->execute();
			$result = $stmt->fetchAll();
		}
		foreach($result as $r){
			echo "<tr><td>$r[$t]</td><td>$r[$a]</td><td>$r[$p]</td></tr>";
		}
		$conn = null;
	?>
</table>

