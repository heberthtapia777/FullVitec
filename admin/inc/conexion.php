<?php
    include(dirname(__FILE__).'/../ADOdb/adodb.inc.php');

	$pwd   = urlencode('u0~8O)8bU.%E');
	//$flags =  MYSQL_CLIENT_COMPRESS;
	$dsn   = "mysqli://sstei207_fullvit:$pwd@gator4166.hostgator.com/sstei207_fullvitec?persist";
	$db    = ADONewConnection($dsn);  # no need for PConnect()
	$db->setCharset('utf8');
	if (!$db) die("Conexion incorrecta");

	/*$pwd   = urlencode('mysql');
	//$flags =  MYSQL_CLIENT_COMPRESS;
	$dsn   = "mysqli://root:$pwd@localhost/bd_sisinventario";
	$db    = ADONewConnection($dsn);  # no need for PConnect()
	$db->setCharset('utf8');
	if (!$db) die("Conexion incorrecta");*/

?>
