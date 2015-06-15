<?php 
	if( isset( $_POST['name'] ) ) {
		$client_id = UUID::v4();	
		if( isset( $_POST['active'] ) && $_POST['active'] == 1 ) {
			$active = 1;
		} else {
			$active = 0;
		}
		
		$query = "INSERT INTO client ( clientID, clientName, clientEmail, clientActive ) VALUES ( '$client_id', '$_POST[name]', '$_POST[email]', '$active' )";
		if( $result = $db->query( $query ) ) { ?>
			<script>
				window.location.assign( '/clients/view/<?php echo $client_id; ?>/' );
			</script>
		<?php
        }
	}
	if( !isset( $page['action'] ) || $page['action'] == 'all' ) {
		$result = $db->query( "SELECT clientID, clientName, clientEmail, clientCreated, COUNT(reportID) AS clientReports FROM client LEFT JOIN report ON clientID = reportClient  GROUP BY clientID ORDER BY clientName ASC" );
?>
	<h1>View All Clients</h1>
    <table class="table table-hover">
		<thead>
        	<tr>
            	<th>Name</th>
                <th>Email</th>
                <th class="text-center">Reports</th>
                <th class="text-center">Added</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php while( $data = $result->fetch_assoc() ) { ?>
                <tr>
                    <td><?php echo $data['clientName']; ?></td>
                    <td><?php echo $data['clientEmail']; ?></td>
                    <td class="text-center"><a href="/reports/client/<?php echo $data['clientID']; ?>/"><?php echo $data['clientReports']; ?></a></td>
                    <td class="text-center"><?php echo date("d/m/Y", strtotime( $data['clientCreated'] ) ); ?></td>
                    <td class="text-right"><a data-toggle="tooltip" data-placement="top" title="View Client" href="/clients/view/<?php echo $data['clientID']; ?>/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a data-toggle="tooltip" data-placement="top" title="Contracts" href="/clients/contracts/<?php echo $data['clientID']; ?>/" class="btn btn-success btn-xs"><i class="fa fa-cog fa-fw"></i></a> <a data-toggle="tooltip" data-placement="top" title="Delete Client" href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a></td>
                </tr>
            <?php } ?>
        </tbody>
	</table>
<?php } 

	elseif( $page['action'] == 'new' ) {
		
?>
	<h1>Add New Client</h1>
    <div class="row">
        <form class="col-md-14" method="post" action="">
          <div class="form-group">
            <label>Client Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="active" value="1"> Active?
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } 

	elseif( $page['action'] == 'view' ) {
		$result = $db->query( "SELECT contractID, contractNumber, contractLocation, contractClient, COUNT( reportID ) as contractReports FROM contract INNER JOIN client ON contractClient = clientID LEFT JOIN report ON reportContract = contractNumber WHERE contractClient='".$page['action2']."' GROUP BY contractID ORDER BY contractNumber ASC" );
		$clientresult = $db->query( "SELECT clientID, clientName, clientEmail, clientCreated, clientUpdated, COUNT(reportID) AS clientReports FROM client LEFT JOIN report ON clientID = reportClient WHERE clientID='".$page['action2']."' GROUP BY clientID  ORDER BY clientName ASC" );
		
		$client = $clientresult->fetch_assoc();
?>
	<div class="page-header">
      <h1>View Client <small><?php echo $client['clientName']; ?></small></h1>
    </div>
    	
    <div class="row">
    	<div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $client['clientName']; ?></h3>
                </div>
                    <table class="table">
                        <tr>
                            <td colspan="2"><img class="img-responsive center-block" src="/client-logos/alun-griffiths.jpg" width="270" height="81" alt=""/></td>
                        </tr>
                        <tr>
                            <th>Client Name</th><td><?php echo $client['clientName']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th><td><a href="mailto:<?php echo $client['clientEmail']; ?>"><?php echo $client['clientEmail']; ?></a></td>
                        </tr>
                        <tr>
                            <th>Created</th><td><?php echo date( 'd/m/Y H:i:s', strtotime( $client['clientCreated'] ) ); ?></td>
                        </tr>
                        <tr>
                            <th>Last Updated</th><td><?php echo date( 'd/m/Y H:i:s', strtotime( $client['clientUpdated'] ) ); ?></td>
                        </tr>
                        <tr>
                            <th>Reports</th><td><a href="/reports/client/<?php echo $client['clientID']; ?>/"><?php echo $client['clientReports']; ?></a></td>
                        </tr>
                    </table>
                    <div class="panel-footer text-right">
                        <a href="#" class="btn btn-default btn-xs">Edit Client</a>
                    </div>
            </div>
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Contacts</h3>
                </div>
                    <table class="table">
                    	<thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Test Name</td>
                                <td><a href="mailto:dan@tailored.im">dan@tailored.im</a></td>
                                <td class="text-right"><a data-toggle="tooltip" data-placement="top" title="Email Contact" href="mailto:dan@tailored.im" class="btn btn-default btn-xs"><i class="fa fa-envelope fa-fw"></i></a> <a data-toggle="tooltip" data-placement="top" title="View Contact" href="#" class="btn btn-default btn-xs"><i class="fa fa-search fa-fw"></i></a></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="panel-footer text-right">
                        <a href="#" data-toggle="modal" data-target="#new_contact_model" class="btn btn-default btn-xs">Add Contact</a>
                    </div>
            </div>
        </div>
        <div class="col-md-14">
        	<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Contracts</h3>
                </div>
                    <table class="table table-hover" id="contracts_list">
                        <thead>
                            <tr>
                                <th>Contract Number</th>
                                <th>Location</th>
                                <th class="text-center">Reports</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if( $result->num_rows > 0 ) { while( $data = $result->fetch_assoc() ) {  ?>
                                <tr>
                                    <td><?php echo $data['contractNumber']; ?></td>
                                    <td><?php echo $data['contractLocation']; ?></td>
                                    <td class="text-center"><a href="/reports/client/<?php echo $data['contractID']; ?>/"><?php echo $data['contractReports']; ?></a></td>
                                    <td class="text-right"><a data-toggle="tooltip" data-placement="top" title="View Contract" href="/clients/view/<?php echo $data['contractID']; ?>/" class="btn btn-default btn-xs"><i class="fa fa-search fa-fw"></i></a></td>
                                </tr>
                            <?php } } else { ?>
                                <tr class="not_found">
                                    <td colspan="4"  >No contracts found</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                
                <div class="panel-footer text-right">
                    <a data-toggle="modal" data-target="#new_contract_model" href="" class="btn btn-default btn-xs add_contract">Add Contract</a>
                </div>
             </div>
             <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Latest Reports</h3>
                </div>
                    <table class="table table-hover" id="contracts_list">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Contract</th>
                                <th>Location</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09-06-2015</td>
                                <td>3478</td>
                                <td>Market Street, Newport</td>
                                <td class="text-right"><a data-toggle="tooltip" data-placement="top" title="View Report" href="/clients/view/<?php echo $data['contractID']; ?>/" class="btn btn-default btn-xs"><i class="fa fa-search fa-fw"></i></a> </td>
                            </tr>
                        </tbody>
                    </table>
                
                <div class="panel-footer text-right">
                    <a data-toggle="modal" data-target="#new_contract_model" href="" class="btn btn-default btn-xs add_contract">Add Contract</a>
                </div>
             </div>
        </div>
        </div>
        <div class="row">
    	
        </div>
        <div class="modal fade" id="new_contract_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        	<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Add New Contract</h4>
                    
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="new_contract_form">
                          <div class="form-group">
                            <label for="inputEmail3"  class="col-sm-6 control-label">Contract Number</label>
                            <div class="col-sm-18">
                              <input type="text" required class="form-control" name="contractNumber" id="contractNumber" placeholder="Contract Number">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3"  class="col-sm-6 control-label">Location</label>
                            <div class="col-sm-18">
                              <input type="text" required class="form-control" name="contractLocation" id="contractLocation" placeholder="Location">
                              <input type="hidden" name="contractClient" value="<?php echo $page['action2']; ?>">
                            </div>
                          </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add_contract_button">Add Contract</button>
                    </div>
                </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
        </div>
        
        <div class="modal fade" id="new_contact_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        	<div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                         <h4 class="modal-title">Add New Contact</h4>
                    
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="new_contract_form">
                          <div class="form-group">
                            <label for="inputEmail3"  class="col-sm-6 control-label">Contract Number</label>
                            <div class="col-sm-18">
                              <input type="text" required class="form-control" name="contractNumber" id="contractNumber" placeholder="Contract Number">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputPassword3"  class="col-sm-6 control-label">Location</label>
                            <div class="col-sm-18">
                              <input type="text" required class="form-control" name="contractLocation" id="contractLocation" placeholder="Location">
                              <input type="hidden" name="contractClient" value="<?php echo $page['action2']; ?>">
                            </div>
                          </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add_contract_button">Add Contract</button>
                    </div>
                </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
        </div>
<?php } elseif( $page['action'] == 'contracts' && $page['action2'] == 'new' ) { ?>
	
<?php } ?>