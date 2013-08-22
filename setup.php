<?php
	if(isset($_REQUEST['CREATE']))
	{
		try{
			$connection=new Mongo();
			$database=$connection->selectDB('infolink');
			$collection=$database->selectCollection('links');
			echo "Successfully Created/Connected to the database";
			$info=$arrayName = array('name' => 'google','url' => 'https://www.google.com','type' => 'general' ,'desc' => 'Search Engine' );
			$collection->insert($info);			
		}
		catch(MongoConnectionException $e){
			echo 'Encountered an error';
			die($e->getMessage());
		}
		catch(MongoException $m)
		{
			echo "Encountered an error";
			die($m->getMessage());
		}

	}
	else
	{
		echo "Please Click the create/login button";
	}
?>
<!DOCTYPE html>
<head>
	<title>Info Link</title>
</head>

<body>
	<table align="center">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
				<tr><td><input type="submit" value="Setup/Login" name="CREATE"></td></tr>
		</form>
	</table>
</body>
</html>