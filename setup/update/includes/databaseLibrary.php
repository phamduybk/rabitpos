<?php
class Database {
	function check_database_exist_or_not($data){
		$hostname = $data['hostname'];
		$username = $data['username'];
		$password = $data['password'];
		$database_name = $data['database'];

		// Creating a connection
		$conn = new mysqli($hostname, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		$q3=$conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$database_name'");
		if(mysqli_num_rows($q3)>0){
			//Success
			return true;
		}
		return false;
	}
	function create_database($data){
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
		if(mysqli_connect_errno())
			return false;
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);
		$mysqli->close();
		return true;
	}
	function check_table_exist_or_not($data){
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');
		if(mysqli_connect_errno())
			return false;
		$q3=$mysqli->query("SELECT * FROM information_schema.tables WHERE table_schema = '".$data['database']."' AND table_name = 'db_sitesettings' LIMIT 1;");
		if(mysqli_num_rows($q3)>0){
			//Success
			return true;
		}
		return false;
	}

	function create_tables($data){
		return  true ;
	}
	function support(){
		return "
		<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css' rel='stylesheet'>
		<br>
		<div class='container'>
        <div class='col-md-4 col-md-offset-4'>
					<p class='alert alert-success alert-dismissible'>
					If you facing any issue in Installtion, Please Contact Support. <br>
					Email: lalazen92@gmail.com
					</p>
		</div>
		</div>
		<br>
				";
	}
}
