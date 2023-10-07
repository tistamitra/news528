<?php
   
   // db connection
    include '../lib/connection.php';

      if(isset($_GET['id']) ){

          //echo $_GET['id'];

        $d_id = $_GET['id'];

        $delete_sql = "DELETE FROM category WHERE id = $d_id";

        if($conn -> query ($delete_sql) ){
           header("location: cat.php");

        }else{
          die ( $conn -> error );
        }


      }else{
          header("location: cat.php");   
      }
      



?>