<?php

include_once "../config.php";

    function getNbUsers(){
        $db = config::getConnexion();
        
        $userQuery = "SELECT count(*) AS nb FROM users";//query to get number of users in the table
        $agenceQuery = "SELECT count(*) AS nb FROM agence";//query to get number of agence in the table

        try {
            $res = $db->query($userQuery);
            $data = $res->fetch();
            $nbUsers = $data['nb'];

        } catch (PDOException $e) {
            $e->getMessage();
        }

        try {
            $res = $db->query($agenceQuery);
            $data = $res->fetch();
            $nbAgence = $data['nb'];

        } catch (PDOException $e) {
            $e->getMessage();
        }

        $nbUtilisateurs = $nbUsers + $nbAgence;

        return $nbUtilisateurs;
    }

    function getNbOnlineUsers(){
        $db = config::getConnexion();
        
        $Query = "SELECT count(*) AS nb FROM onlineUsers";//query to get number of students in the table

        try {
            $res = $db->query($Query);
            $data = $res->fetch();
            $nbUsers = $data['nb'];
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $nbUsers;
    }

    function getNumberOfCourses(){
        $db = config::getConnexion();
        
        $Query = "SELECT count(*) AS nb FROM courses";//query to get number of courses in the table

        try {
            $res = $db->query($Query);
            $data = $res->fetch();
            $nbCourses = $data['nb'];
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $nbCourses;
    }

    function getNumberUnreadNotifications(){
        $db = config::getConnexion();
        
        $Query = "SELECT count(*) AS nb FROM notification where status='unread'";//query to get number of courses in the table

        try {
            $res = $db->query($Query);
            $data = $res->fetch();
            $nbCourses = $data['nb'];
            
        } catch (PDOException $e) {
            $e->getMessage();
        }
        return $nbCourses;
    }

    $searchADM = "ADM";
    session_start();
    if(!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != true || !preg_match("/{$searchADM}/i", $_SESSION['userId'])){    
        header('location:../../Front/View/login.html');
    }
    else{
        $nbUsers = getNbUsers();
        $nbOnlineUsers = getNbOnlineUsers();
        $nbCourses = getNumberOfCourses();
        $nbUnreadNotifications = getNumberUnreadNotifications();
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduEasy Admin</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- =======================================NAV BAR STARTS======================================= -->
        <?php include "adminSideBar.php" ?>
        <!-- =======================================NAV BAR ENDS======================================= -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <center>
                                <!-- <h3 class="card-title">Student DataTable</h3> -->
                                <h3>
                                    <img src="images/favicon.png" alt="EduEasyLogo" style="length: 7vw; width: 7vw">
                                    DashBoard
                                </h3>
                            </center>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                <a href="showNotifications.php" style="color:black;">
                    <div class="col-md-3 col-sm-6 col-12 float-sm-right">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">New Notifications</span>
                                <span class="info-box-number"><?php echo $nbUnreadNotifications; ?></span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                </a>
            </div>

            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $nbCourses; ?></h3>

                            <p>Number Of Courses
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="MoreInfoCourses.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> <sup style="font-size: 20px"> <?php echo $nbOnlineUsers ?> </sup></h3>

                            <p>Online Users

                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                        <a href="MoreInfoOnlineUsers.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $nbUsers ?></h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="MoreInfoUserRegistration.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!--</div> /.container-fluid -->
            <!-- /.content -->
        </div>
        <footer class="main-footer">
        </footer>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

</body>

</html>