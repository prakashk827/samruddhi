<?php

 date_default_timezone_set("Asia/Calcutta");
//  $server="localhost";
//  $uname="root";
//  $pwd="";
//  $db="samruddhi"; 
 
 //$server="localhost";
 $server="151.106.124.245";
 $uname="u214739240_samruddhi";
 $pwd="c7f718@All";
 $db="u214739240_samruddhi";
 




$conn=mysqli_connect($server,$uname,$pwd,$db);
if(!$conn)
{
	echo 'Select Query Database not Connected<br>';
	
}
else
{
	//echo 'Selelct query Database  Connected<br>';
	
}



?>