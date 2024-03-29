<?php 
require "connect.php";
date_default_timezone_set("Asia/Dhaka");
@session_start();
if(!isset($_SESSION['userName'])){
  header("location:Login.php");  
}

?>


<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />

    <!--Theme Styles-->
    <link href="assets/css/dark-theme.css" rel="stylesheet" />
    <link href="assets/css/light-theme.css" rel="stylesheet" />
    <link href="assets/css/semi-dark.css" rel="stylesheet" />
    <link href="assets/css/header-colors.css" rel="stylesheet" />

    <title>HR PAYROLL SOFTWARE</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <?php require "headers.php"?>
        </header>
        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <?php require "SidebarMenu.php"?>
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $sql="SELECT COUNT(employee_name) as Total From employee";
                              $query=mysqli_query($conn,$sql);
                            $num=mysqli_fetch_array($query);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Total Employees</p>
                                    <h4 class="my-1"><?php echo $num['Total'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-person-square"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                                    @$present="Present";
                                    $today=date("Y-m-d");
                              $sql="SELECT COUNT(attendaneStatus) as presnt From attendance WHERE attendaneStatus='$present' && attendancedate='$today'";
                                $query=mysqli_query($conn,$sql);
                            $num=mysqli_fetch_array($query);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Present Today</p>
                                    <h4 class="my-1"><?php echo $num['presnt'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-person-check-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                     <?php 
                                    @$absent="Absent";
                                    $today=date("Y-m-d");
                              $sql="SELECT COUNT(attendaneStatus) as abse From attendance WHERE attendaneStatus='$absent' && attendancedate='$today'";
                              $query=mysqli_query($conn,$sql);
                            $num=mysqli_fetch_array($query);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Total Absent</p>
                                    <h4 class="my-1"><?php echo $num['abse'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $today=date("Y-m-d");
                              $sqls="SELECT COUNT(leave_start_date) as leav From leaves WHERE leave_start_date='$today'";
                              $querys=mysqli_query($conn,$sqls);
                            $nums=mysqli_fetch_array($querys);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Onleave Today</p>
                                    <h4 class="my-1"><?php echo $nums['leav'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $today=date("Y-m-d");
                              $s="SELECT COUNT(employee_name) as jnt From employee WHERE joining_date='$today'";
                              $q=mysqli_query($conn,$s);
                            $n=mysqli_fetch_array($q);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Employee Added Today</p>
                                    <h4 class="my-1"><?php echo $n['jnt'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-person-plus-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $today=date("Y-m-d");
                              $sqls="SELECT COUNT(leave_start_date) as leav From leaves WHERE leave_start_date='$today'";
                              $querys=mysqli_query($conn,$sqls);
                            $nums=mysqli_fetch_array($querys);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Total Claim</p>
                                    <h4 class="my-1"><?php echo $nums['leav'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-bell-slash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                 <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $month=date("F");
                              $sqls="SELECT MONTHNAME(`salary_date`)as mnname,
SUM(`gross_salary`) as amts FROM salary GROUP BY Month(`salary_date`)
HAVING mnname='$month'";
                              $querys=mysqli_query($conn,$sqls);
                            $nums=mysqli_fetch_array($querys);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Salary Cost</p>
                                    <h4 class="my-1"><?php if($nums != null)echo $nums['amts']; else echo 0;?></h4>

                                </div>
                                 <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
                              $month= date("F");
                              $sqls="SELECT MONTHNAME(`expense_date`)as mname,
SUM(amount) as amt FROM expense_list GROUP BY Month(`expense_date`)
HAVING mname='$month'";
                              $querys=mysqli_query($conn,$sqls);
                            $nums=mysqli_fetch_array($querys);
                              
                              ?>
                                    <p class="mb-0 text-secondary">Total Expenses</p>
                                    <h4 class="my-1"><?php if($nums!= null)echo $nums['amt']; else echo 0; ?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-cash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->



        </main>
        <!--end page main-->

        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->


    <!-- Bootstrap bundle JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
    <script src="assets/plugins/peity/jquery.peity.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <script src="assets/js/pace.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <!--app-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/index.js"></script>

    <script>
        new PerfectScrollbar(".best-product")
        new PerfectScrollbar(".top-sellers-list")

    </script>

</body>

</html>
