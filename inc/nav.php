<nav class="navbar navbar-default navbar-static-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand" href="/">SWS App Admin</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php echo ( !isset( $page['page'] ) || $page['page'] == '' ? 'class="active"' : '' ); ?>><a href="#">Dashboard</a></li>
        <li class="dropdown <?php echo ( isset( $page['page'] ) && $page['page'] == 'reports' ? ' active "' : '' ); ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reports <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/reports/all/">View Reports</a></li>
          </ul>
        </li>
        <li class="dropdown <?php echo ( isset( $page['page'] ) && $page['page'] == 'clients' ? ' active ' : '' ); ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Clients <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/clients/all/">View Clients</a></li>
            <li><a href="/clients/new/">New Client</a></li>
          </ul>
        </li>
        <li class="dropdown <?php echo ( isset( $page['page'] ) && $page['page'] == 'users' ? ' active ' : '' ); ?>"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Users <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="/users/all/">View Users</a></li>
            <li><a href="/users/new/">New User</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Dan Taylor <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">View Profile</a></li>
            <li class="divider"></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>