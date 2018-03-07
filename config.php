<?php
	define("HOST", "localhost");
	define("USER", "root");
	define("PASSWORD", "");
	define("DATABASE", "movies");

	//Start session
	session_start();

	//Create connection
	$connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	//Check connection
	if (!$connection) {
		die(mysqli_connect_error());
	}

	$sSQL= 'SET CHARACTER SET utf8';
	mysqli_query($connection, $sSQL);

	function is_login()
	{
		if (isset($_SESSION['logged_in']))
			return TRUE;
		else
			return FALSE;
	}

	function is_admin() {
		if (isset($_SESSION['is_admin']) && ($_SESSION['is_admin'] == "1"))
			return TRUE;
		else
			return FALSE;
	}

	function is_supervisor() {
		if (isset($_SESSION['is_supervisor']) && ($_SESSION['is_supervisor'] == "1"))
			return TRUE;
		else
			return FALSE;
	}

	function get_user_id()
	{
		return $_SESSION['user_id'];
	}

	function get_name()
	{
		return $_SESSION['name'];
	}

	function get_email() {
		return $_SESSION['email'];	
	}

	error_reporting(E_ERROR | E_PARSE);
?>
