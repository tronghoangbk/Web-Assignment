<?php
                  
                 
                      session_start(); 
            
                      $error_fullname="";
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "thth_company";
                      $conn = new mysqli($servername, $username, $password, $dbname);
                      if ($conn->connect_error) {
                          echo "connect fail";
                          die("Connection failed: " . $conn->connect_error);
                          }
                      $id = $_POST["id"];
                      $password = $_POST["password"]; 
                      $sql = "SELECT * from account where account_id = '$id' && password = '$password'";
                      $result = mysqli_query($conn,$sql);
                      $result2 = mysqli_query($conn,$sql);
                      $num = mysqli_num_rows($result);
                      if ($num == 1)
                      {
                          $permission = $result->fetch_array()['permission'];
                          $status = $result2->fetch_array()['status'];
                        if($permission == 1)
                        {
                            header('location:admin-dashboard.php');
                        }
                        else
                        { 
                          if( $status == 1)
                          {
                            $_SESSION['username'] = $id;
                            header('location:index.php');
                           
                          }
                          else
                          {
                            $_SESSION['error'] = "This account has been ban from admin";
                            header('location:login.php');
                         }
                          }
                        
                          
                      }
                      else
                      {

                        $_SESSION['error'] = "Incorect username or password";
                        header('location:login.php');
                          
                      }
                      

                  
                  ?>