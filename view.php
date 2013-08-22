<html>
<head><title>View Links</title></head>
<body>
<table>
<tr><td>Name</td><td>Url</td><td>Type</td><td>Description</td></tr>

<?php
	
	try {
		$connection=new Mongo();
		$database=$connection->selectDB('infolink');
		$collection=$database->selectCollection('links');
		
	} catch (MongoConnectionException $e) {
		echo "Error encontered";
		die($e->getMessage());
	}

	$cusor=$collection->find();
	while ($cusor->hasNext()) {
		
		$val=$cusor->getNext();
		echo "<tr><td>".$val['name']."</td><td>".$val['url']."</td><td>".$val['type']."</td><td>".$val['desc']."</td></tr>";
	}
?>


</table>