 <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">Attendance MS</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/logo.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?= $_SESSION['NAME']?></h5>
                                    <!-- <span class="status"></span><span class="ml-2">Online</span> -->
                                </div>
                                <a class="dropdown-item" href="php/logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
         <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">

                            <li class="nav-item ">
                                <a class="nav-link" href="../index.php" aria-expanded="false" ><i class="fas fa-tachometer-alt"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>

 
                            <li class="nav-item ">
                                <a class="nav-link" href="../manage_emp.php" aria-expanded="false" ><i class="fa fa-fw fa-user-circle"></i>Manage Employee <span class="badge badge-success">6</span></a>
                            </li>
                            
                            <li class="nav-item ">
                                <a class="nav-link" href="../dtr.php" aria-expanded="false" ><i class="fa fa-fw fa-book"></i>Daily Time Record <span class="badge badge-success">6</span></a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="../dept.php" aria-expanded="false" ><i class="fa fas fa-archive"></i>Department List <span class="badge badge-success">6</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== --> 