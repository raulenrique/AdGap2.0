<?php

// create a database connection
// data source name(DSN), username, password

try{
	$test = new PDO('mysql:host=localhost;dbname=theadgap;charset=utf8', 'root', '');
	$test->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$test->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (Exception $e) {
	echo $e->getCode();
	echo "OOPS!", $e->getMessage();
}

try {
	$test->query("TRUNCATE TABLE listings;");
	
} catch (Exception $e) {
	echo $e->getMessage();
}

try {
	$statement = $test->prepare("INSERT INTO listings (id, category, title, currentPrice, auctionEndDateTime, auctionStartDateTime, location, description) VALUES (:id, :category, :title, :currentPrice, :auctionEndDateTime, :auctionStartDateTime, :location, :description);");
	if ($handle = fopen("listings.csv", "r")) {
		while ($row = fgetcsv($handle, 0, ",")){
			$statement->bindValue(":id", $row[0]);
			$statement->bindValue(":category", $row[1]);
			$statement->bindValue(":title", strtitle($row[2]));
			$statement->bindValue(":currentPrice", $row[3]);
			$statement->bindValue(":auctionEndDateTime", $row[4]);
			$statement->bindValue(":auctionStartDateTime", $row[5]);
			$statement->bindValue(":location", $row[6]);
			$statement->bindValue(":description", $row[7]);
			$statement->execute();
		}
	}
	fclose($handle);

} catch (Exception $e) {
	echo $e->getMessage();
}

function strtitle($title) {
	$exceptions = [
        'of', 'a', 'the', 'and', 'an', 'or', 'nor', 'but', 'is', 'if', 'then', 'else', 'when', 'at', 'from', 'by', 'on', 'off', 'for', 'in', 'out', 'over', 'to', 'into', 'with'
    ];

	$title =strtolower($title);
	
	$words = explode(' ', $title);
	foreach ($words as $key => $word) {
		if($key == 0 || ! in_array($word, $exceptions))
			$words[$key] = ucwords($word);
	}
	$newtitle = implode(' ',$words);
	return $newtitle;
}