<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$output = array();   
	
	$obsID 			= $db->real_escape_string( $_POST['obsID'] );
	$obsReport 		= $db->real_escape_string( $_POST['obsReport'] );
	$obsItem 		= $db->real_escape_string( $_POST['obsItem'] );
	$obsObs 			= $db->real_escape_string( $_POST['obsObs'] );
	$obsPriority 	= $db->real_escape_string( $_POST['obsPriority'] );
	
	$query = "INSERT INTO obs ( obsID, obsReport, obsItem, obsObs, obsPriority ) VALUES ( '$obsID', '$obsReport', '$obsItem', '$obsObs', '$obsPriority' )";
	//echo $query;
	if( $db->query( $query ) ) {
		$output = array(
			'status' => 1
		);
	} else {
		$output = array(
			'status' => 0
		);
	}
		
	echo json_encode( (object) $output );