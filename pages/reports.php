<?php 
	
<<<<<<< HEAD
	if( !isset( $page['action'] ) || $page['action'] == 'all' ) {
		$result = $db->query( "SELECT * FROM report INNER JOIN client ON clientID = reportClient ORDER BY reportDate ASC" );
=======
	if( !isset( $page['action'] ) || $page['action'] == 'view' ) {
		$result = $db->query( "SELECT * FROM report INNER JOIN client ON clientID = reportClient ORDER BY userName ASC" );
>>>>>>> f982a3c5f5a7c464d7b2406249f4cd39d0ae4149
?>
	<h1>View Reports</h1>
    <table class="table table-hover">
		<thead>
        	<tr>
            	<th>Date</th>
                <th>Client</th>
                <th>Contract</th>
                <th>Workplace</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php if( $result ) {
					while( $data = $result->fetch_assoc() ) { ?>
                <tr>
                    <td><?php echo date("d/m/Y", strtotime( $data['reportDate'] ) ); ?></td>
                    <td><?php echo $data['clientName']; ?></td>
                    <td><?php echo $data['reportContract']; ?></td>
                    <td><?php echo $data['reportWork']; ?></td>
<<<<<<< HEAD
                    <td class="text-right"><a href="/users/view/<?php echo $data['userID']; ?>/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a></td>
=======
                    <td class="text-right"><a href="/users/view/<?php echo $data['userID']; ?>/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
>>>>>>> f982a3c5f5a7c464d7b2406249f4cd39d0ae4149
                </tr>
            <?php } } else { ?>
            	<tr>
                    <td colspan="5">No reports to show</td>
                </tr>
            <?php } ?>
        </tbody>
	</table>
<?php } 

	if( !isset( $page['action'] ) || $page['action'] == 'new' ) {
		
?>
	<h1>Add New User</h1>
    <div class="row">
        <form class="col-md-14" method="post" action="">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" name="name" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="pass" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Re-enter Password</label>
            <input type="password" class="form-control" name="pass2" placeholder="Re-enter Password">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="admin" value="1"> Administrator?
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" name="active" value="1"> Active?
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } ?>