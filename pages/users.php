<?php 
	if( !isset( $page['action'] ) || $page['action'] == 'view' ) {
?>
	<h1>View All Users</h1>
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
        	<tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="/users/view/1/" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
            <tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
            <tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
            <tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
            <tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
            <tr>
            	<td>Dan Taylor</td>
                <td>dan@tailored.im</td>
                <td class="text-center"><a href="#">10</a></td>
                <td class="text-center">30/03/2015</td>
                <td class="text-right"><a href="#" class="btn btn-primary btn-xs"><i class="fa fa-search fa-fw"></i></a> <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-fw"></i></td>
            </tr>
        </tbody>
	</table>
<?php } 

	if( !isset( $page['action'] ) || $page['action'] == 'new' ) {
?>
	<h1>Add New User</h1>
    <div class="row">
        <form class="col-md-14">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" class="form-control" placeholder="Full Name">
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" class="form-control" placeholder="Email Address">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Re-enter Password</label>
            <input type="password" class="form-control" placeholder="Re-enter Password">
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox"> Administrator?
            </label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php } ?>