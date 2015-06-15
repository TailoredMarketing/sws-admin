<?php
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache, must-revalidate');
	
	require( '../inc/config.php' );
	
	$output = array();
	
	$reportID 		= $db->real_escape_string( $_POST['reportID'] );
	$reportClient 	= $db->real_escape_string( $_POST['reportClient'] );
	$reportWork 		= $db->real_escape_string( $_POST['reportWork'] );
	$reportContract = $db->real_escape_string( $_POST['reportContract'] );
	$reportDate 		= $db->real_escape_string( $_POST['reportDate'] );
	$reportTime 		= $db->real_escape_string( $_POST['reportTime'] );
	$reportTick 		= $db->real_escape_string( $_POST['reportTick'] );
	$reportUser 		= $db->real_escape_string( $_POST['reportUser'] ); 
	
	$query = "INSERT INTO report	 ( reportID, reportClient, reportWork, reportContract, reportDate, reportTime, reportTick, reportUser ) VALUES ( '$reportID', '$reportClient', '$reportWork', '$reportContract', '$reportDate', '$reportTime', '$reportTick', '$reportUser' )";
	
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