<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Your AdminLTE Page</title>
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/skins/skin-blue.min.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <a href="#" class="logo">
                <span class="logo-mini"><b>A</b>LT</span>
                <span class="logo-lg"><b>Admin</b>LTE</span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                                <!-- Search Bar -->
                                <div class="navbar-custom-menu">
                                    <ul class="nav navbar-nav">
                                        <li>
                                            <form class="navbar-form">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search">
                                                    <span class="input-group-btn">
                                                        <button type="submit" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Username</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <p>
                                        Username
                                        <small>Member since Jan. 2023</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <!-- Sidebar User Panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>Username</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="active"><a href="#"><i class="fa fa-list"></i> <span>Dashboard</span></a></li>
                    <li><a href="#"><i class="fa fa-edit"></i> <span>Forms</span></a></li>
                    <li><a href="#"><i class="fa fa-table"></i> <span>Tables</span></a></li>
                </ul>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
<!-- Your page content goes here -->
<section class="content">
    <h1>Welcome to your AdminLTE page with Projects and Tasks</h1>

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Project Information</h3>
        </div>
        <div class="box-body">
            <p><strong>Project Name:</strong> Project Alpha</p>
            <p><strong>Description:</strong> This is a sample project description.</p>
            <p><strong>Start Date:</strong> January 1, 2023</p>
            <p><strong>End Date:</strong> December 31, 2023</p>
        </div>
    </div>

    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Task Information</h3>
        </div>
        <div class="box-body">
            <p><strong>Task Title:</strong> Task 1 for Project Alpha</p>
            <p><strong>Description:</strong> This is a sample task description for Task 1.</p>
        </div>
    </div>
</section>

        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://adminlte.io/themes/AdminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
