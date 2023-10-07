<?php
  // db connection
    include '../lib/connection.php';

    $result = null;

  // insert sql
    if(isset($_POST['n_submit'])){

      $ntitle = $_POST['n_title'];
      $nicon = $_POST['n_icon'];
      $ndesc = $_POST['n_desc'];
      $npass = md5($_POST['n_pass']);
      $cpass = md5($_POST['c_pass']);
      $cid = $_POST['c_id'];

      if($npass == $cpass){
       // $result = "<h2 class ='text-success'> password match </h2>";

       $insert_sql = "INSERT INTO news(id, title, icon, description, pass, c_id) VALUES ('$ntitle', '$nicon', '$ndesc', '$npass', $cid)";

       if($conn -> query($insert_sql)){
         $result ="<h2 class ='text-success'>data inserted successfully </h2>";

        }else{
           die($conn -> error);

        }

      }else{
        $result = "<h2 class ='text-danger'> Invalid Password </h2>";
      }

    }  

    // select sql start
      $select_sql = "SELECT * FROM news";

      $r_sql = $conn -> query( $select_sql);

      //echo $r_sql -> num_rows;
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
                            <a class="nav-link active" href="cat.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                category
                            </a>

                            <a class="nav-link" href="news.php">
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
                        <h1 class="mt-4 text-danger"> News </h1>
                        
                    <!--- insert category --->
                        <div class="card mb-4">
                            <div class="card-body">
                            <h4 class="mt-1 mb-3"> Update News </h4>

                         <div class="cat_insert"> 
                             <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                     <!---- title ---->
                                <div class="mb-3">
                                   <label for="n_title" class="form-label"> News title </label>
                                   <input type="text" class="form-control n_title" id="n_title" name="n_title" required>
                                </div>


                     <!---- icon ---->
                                <div class="mb-3">
                                   <label for="n_icon" class="form-label"> News icon </label>
                                   <input type="text" class="form-control n_icon" id="n_icon" name="n_icon" required>
                                </div>


                     <!---- desc ---->
                                <div class="mb-3">
                                   <label for="n_icon" class="form-label"> News Description </label>
                                   <textarea name = "n_desc" id="n_desc" class="form-control n_desc" required> </textarea>
                                </div>


                     <!---- password ---->
                                <div class="mb-3">
                                   <label for="n_pass" class="form-label"> Password </label>
                                   <input type="password" class="form-control n_pass" id="n_pass" name="n_pass" required>
                                </div>


                     <!---- Confirm password ---->
                                <div class="mb-3">
                                   <label for="c_pass" class="form-label"> Confirm Password </label>
                                   <input type="password" class="form-control c_pass" id="c_pass" name="c_pass" required>
                                </div>

                     <!-----c_id ---->
                                <div class="mb-3">
                                   <label for="c_id" class="form-label"> Category Id</label>
                                   <input type="number" class="form-control c_id" id="c_id" name="c_id" required>
                                </div>

                     <!---- submit ---->
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-success" name="n_submit"> Submit </button>
                                  <button type="reset" class="btn btn-dark"> Reset </button>
                                </div>

                             </form>
                         </div>

                                 <div class="result">
                                    <?php echo $result;?>
                                 </div>

                            </div>
                        </div>

                    <!----category info ----->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h4 class="mt-1 mb-3"> News Info </h4>
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th> Category title </th>
                                            <th> Category password </th>
                                            <th> Category description </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php if($r_sql -> num_rows >0){ ?>
                                       
                                        <?php while($final = $r_sql -> fetch_assoc() ) {?>
                                        <tr>      
                                            <td> <?php echo $final ['title']; ?> </td>
                                            <td> <?php echo $final ['icon']; ?></td>
                                            <td> <?php echo $final ['description']; ?></td>
                                            <td>
                                               <a href="news_edit.php?id=<?php echo $final['id']; ?>">Edit</a>
                                               <a href="#id=<?php echo $final['id'];?>"> delete </a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                        
                                        <?php } else { ?>

                                        <tr>
                                           <!--- <td>Gavin Joyce</td>
                                            <td>Developer</td>
                                            <td>Edinburgh</td>
                                            <td>42</td>
                                            <td>2010/12/22</td>
                                            <td>$92,575</td> ---->
                                        <td colspan="4"> <p> no data show </p> </td>
                                        </tr>
                                        <?php }?>

                                    </tbody>
                                </table>
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
