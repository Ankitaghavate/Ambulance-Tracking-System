<?php
session_start();
        
         $servername="localhost";
         $username="root";
         $password="";
         $database="ankita";
 
         $conn=mysqli_connect($servername,$username,$password,$database);
 
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $user_name = $_POST["login_username"];
            $password = $_POST["login_password"];
        
            $sql = "SELECT * FROM login_details WHERE First_Name = '$user_name'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row["password"])) {
                        header("Location: home_page.php");
                        exit();      
                }
                 else 
                 {
                    echo '<script>alert("Incorrect password!");</script>';
                }
            } 
            else 
            {
                echo '<script>alert("User not found!!");</script>';
            }
        }
        $conn->close();
        ?>