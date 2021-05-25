<?php

 date_default_timezone_set("Asia/Calcutta");
 $server="localhost";
 $uname="root";
 $pwd="";
 $db="samruddhi";




$conn=mysqli_connect($server,$uname,$pwd,$db);
if(!$conn)
{
	echo 'Select Query Database not Connected<br>';
	
}
else
{
	//echo 'Selelct query Database  Connected<br>';
	
}

class database{ 

	public $host="localhost";
	public $userName="root";
	public $password="";
	public $databaseName="samruddhi";
	public $con;

	public function __construct()
	{
		$this->con=new mysqli($this->host,$this->userName,$this->password,$this->databaseName);
		if(mysqli_connect_error())
		{
			echo "Database Not Connected<br>";
		}
		
	}
	
	
	public function url($url)
	{
		header("Location:".$url);
	}
	
	public function textLocal($mobile,$msg)
	{
		// Authorisation details.
		$username = "prakashk827@gmail.com";
		$hash = "b1e5ba02d889b144ab91b8ef1e58d08eaa1acb0176febf58140ddf8734c8ccf3";

		
		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		
		// Data for text message. This is the text message data.
		$sender = "TXTLCL"; // This is who the message appears to be from.
		$numbers =$mobile; // A single number or a comma-seperated list of numbers
		$url = "https://api.textlocal.in";
		$message = $msg;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
		
		return true;
	}
	
	
}

$obj=new database;

?>