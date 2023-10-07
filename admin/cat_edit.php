<?php

 // db connetion
    include '../lib/connection.php';

    // update sql start 
    if( isset($_POST['c_update']) ){
      
      $u_id  = $_POST['c_id'];
      $cname = $_POST['c_name'];
      $cicon = $_POST['c_icon'];

      $update_sql = "UPDATE category SET name='$cname', icon= '$cicon' WHERE id=$u_id";

      if( $conn -> query($update_sql) ){
          header("location:cat.php");
      }else{
        die($conn-> error);
      }
    }


    // select sql start
    if (isset($_GET['id'] ) ){   

     $e_id = $_GET['id'];

     $select_sql = "SELECT * FROM category WHERE id=$e_id";

     $s_sql = $conn -> query($select_sql);

     if($s_sql -> num_rows > 0){   

     while( $final = $s_sql -> fetch_assoc() ) {    

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> MyNews </title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="admin.php"> MyNews </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            
                            <div class="sb-sidenav-menu-heading"> Pages </div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="cat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                category
                            </a>

                            <a class="nav-link active" href="news.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                news
                            </a>

                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4 text-danger"> Category </h1>
                        
                    <!--- insert category --->
                        <div class="card mb-4">
                            <div class="card-body">
                            <h4 class="mt-1 mb-3"> Update Category </h4>

                         <div class="cat_insert"> 
                             <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                             <input value = "<?php echo $final['id'];?>" type="hidden" class="form-control" name="c_id" required>

                     <!---- name ---->
                                <div class="mb-3">
                                   <label for="c_name" class="form-label"> Category name </label>
                                   <input value = "<?php echo $final['name'];?>" type="text" class="form-control c_name" id="c_name" name="c_name" required>
                                </div>

                     <!---- icon ---->
                                <div class="mb-3">
                                   <label for="c_icon" class="form-label"> Category icon </label>
                                   <input value = "<?php echo $final['icon'];?>" type="text" class="form-control c_icon" id="c_icon" name="c_icon" required>
                                </div>

                                <div class="mb-3">
                                  <button type="submit" class="btn btn-success" name="c_update"> Update </button>
                                  <button type="reset" class="btn btn-dark"> Reset </button>
                                </div>

                             </form>
                         </div>

                                 <div class="result">
                                   <!--- <?php echo $result;?> --->
                                 </div>

                            </div>
                        </div>

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; MyNews 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php

   }

  }else{
    header("Location:cat.php");
  }


 }else{
    header("Location:cat.php");
 }

?>