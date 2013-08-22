<?php
	if(isset($_REQUEST['ADD']))
	{
		try{
			$connection=new Mongo();
			$database=$connection->selectDB('infolink');
			$collection=$database->selectCollection('links');
			echo "Successfully Created/Connected to the database";
			$n=$_POST['name'];
			$u=$_POST['url'];
			$t=$_POST['type'];
			$d=$_POST['desc'];

			$info=$arrayName = array('name' => $n,'url' => $u,'type' => $t ,'desc' => $d);
			$collection->insert($info,array('safe' => True));		
			echo "Successfully inserted data";	
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
		echo "Please Click the add button to add data";
	}
?>