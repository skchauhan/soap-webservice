<?php
require_once('lib/nusoap.php');
$client = new nusoap_client("http://localhost/auth_soap_webservice/server.php?wsdl", true);
 // array("category1" => "book","category2" => "sfasdfsd")
$result = $client->call("HelloComplexWorld", array('parameters' => array("ID" => 132,"YourName" => "sfasdfsd")));

if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
} else {
	$error = $client->getError();
	if ($error) {
		echo "<h2>Error</h2>". $error;
	} else {
		echo "Book: ";
		// echo "$result";
		print_r($result);
	}
}
