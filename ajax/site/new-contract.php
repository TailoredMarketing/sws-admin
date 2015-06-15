<?php
	require( '../../inc/config.php' );
	
	$output = array();
	$contract_id = UUID::v4();	
	
	$query = "INSERT INTO contract ( contractID, contractClient, contractNumber, contractLocation ) VALUES ( '$contract_id', '$_POST[contractClient]', '$_POST[contractNumber]', '$_POST[contractLocation]' )";

	if( $result = $db->query( $query ) ) {
		$output['status'] = 1;
		$output['contractID'] = $contract_id;	
	} else {
		$output['status'] = 0;	
	}
	
	echo json_encode( $output );
	die();