<?php

	$dbhost = getenv("DCIM_MYSQL_HOST"); 
	$dbname = getenv("DCIM_DBNAME"); 
	$dbuser = getenv("DCIM_DBUSER"); 
	$dbpass = getenv("DCIM_DBPASS"); 

	$locale = "en_US";
	$codeset = "UTF-8";

	$pdo_options=array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
	);

	try{
			$pdoconnect="mysql:host=$dbhost;dbname=$dbname";
			$dbh=new PDO($pdoconnect,$dbuser,$dbpass,$pdo_options);
	}catch(PDOException $e){
			printf( "Error!  %s\n", $e->getMessage() );
			die();
	}
	
	define( "AUTHENTICATION", "Apache" );
	/* If you want to use Oauth authentication, uncomment the next 2 lines
	   and place your authentication handler in login.php (create symbolic link). 
	   ex.  ln -s oauth/login_with_google.php oauth/login.php
	*/
	// define( "AUTHENTICATION", "Oauth" );
	// session_start();
	
	require_once( 'config.inc.php');
	$config=new Config();
	
?>
