<?php 
	
	if( isset( $_POST['email'] ) ) {
		$user_id = UUID::v4();	
		if( isset( $_POST['active'] ) && $_POST['active'] == 1 ) {
			$active = 1;
		} else {
			$active = 0;
		}
		if( isset( $_POST['admin'] ) && $_POST['admin'] == 1 ) {
			$type = 1;
		} else {
			$type = 0;
		}
		$query = "INSERT INTO user ( userID, userName, userEmail, userPass, userActive, userType ) VALUES ( '$user_id', '$_POST[name]', '$_POST[email]', '$_POST[pass]', '$active', '$type')";
		if( $result = $db->query( $query ) ) {
			header("Location:/users/view/?msg");	
		}
	}

	if( !isset( $page['action'] ) || $page['action'] == 'all' ) {
		$result = $db->query( "SELECT * FROM user ORDER BY userName ASC" );
?>
	<h1>View All Users</h1>
    <table class="table table-hover">
		<thead>
        	<tr>
            	<th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th class="text-center">Reports</th>
                <th class="text-center">Added</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        	<?php while( $data = $result->fetch_assoc() ) { ?>
                <tr>
                    <td><?php echo $data['userName']; ?></td>
                    <td><?php echo $data['userEmail']; ?></td>
                    <td><?php echo $data['userPass']; ?></td>
                    <td class="text-center"><a href="/reports/view/?user=<?php echo $data['userID']; ?>/">10</a></td>
                    <td class="text-center"><?php echo date("d/m/Y", strtotime( $data['userCreated'] ) ); ?></td>
                    <td class="text-right"><a href="/users/view/<?php echo $data['userID']; ?>/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></a></td>
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