<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
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
                        header("Location: roles.html");
                        exit();      
                }
                 else 
                 {
                    echo '<script>alert("Incorrect password!");</script>';
                }
            } 
            else 
            {
                echo '<script>alert("User not found!");</script>';
            }
        }
        $conn->close();
        ?>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }
        body{
            min-height: 100vh;
            background: linear-gradient(135deg,  #e3afdc, #d29764);
            display: flex;
            align-items: center;
            justify-content: center;
           
        }
        .box{
            position: relative;
            width: 380px;
            height: 400px;
            background: #ab39b1;
            border-radius: 10px;
            overflow: hidden;
        }
        .box::before{
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 400px;
            background: linear-gradient(0deg,transparent,transparent,#019da8,#019da8,#019da8);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
        }
        .box::after{
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 400px;
            background: linear-gradient(0deg,transparent,transparent,#019da8,#019da8,#019da8);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
            animation-delay: -3s;
        }
        .border-line{
            position: absolute;
            top: 0;
            inset: 0;
        }
        .border-line::before{
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 400px;
            background: linear-gradient(0deg,transparent,transparent,#b7023e,#b7023e,#b7023e);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
            animation-delay: -1.5s;
        }
        .border-line::after{
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 380px;
            height: 400px;
            background: linear-gradient(0deg,transparent,transparent,#b7023e,#b7023e,#b7023e);
            z-index: 1;
            transform-origin: bottom right;
            animation: animate 6s linear infinite;
            animation-delay: -4.5s;
        }
        @keyframes animate {
            0%{
                transform: rotate(0deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }
        .box form{
            position: absolute;
            inset: 4px;
            background: linear-gradient(135deg, #333,#ff6b81 );
            padding: 50px 40px;
            border-radius: 40px;
            z-index: 2;
            display: flex;
            flex-direction: column;
        }
        .box form h2{
            color: #fff;
            font-size: 26px;
            font-weight: 500;
            text-align: center;
            letter-spacing: 1px;
        }
        .input-box{
            position: relative;
            width: 300px;
            margin-top: 35px;
        }
        .input-box input{
            position: relative;
            width: 100%;
            padding: 20px 10px 10px;
            background: transparent;
            border: none;
            outline: none;
            box-shadow: none;
            color: #23242a;
            font-size: 16px;
            letter-spacing: 1px;
            transition: 0.5s;
            z-index: 10;
        }
        .input-box span{
            position: absolute;
            left: 0;
            padding: 20px 0px 10px;
            pointer-events: none;
            color: #8f8f8f;
            font-size: 16px;
            letter-spacing: 1px;
            transition: 0.5s;
            z-index: 10;
        }
        .input-box input:valid ~ span,
        .input-box input:focus ~ span{
            color: #fff;
            font-size: 12px;
            transform: translateY(-34px);
        }
        .input-box i{
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            transition: 0.5s;
            pointer-events: none;
        }
        .input-box input:valid ~ i,
        .input-box input:focus ~ i{
            height: 44px;
        }
        .imp-links{
            display: flex;
            justify-content: space-between;
        }
        .imp-links a{
            color: #ececec;
            font-size: 14px;
            text-decoration: none;
            margin: 15px 0;
        }
        .imp-links a:hover{
            color: #333;
        }
        .btn{
            width: 40%;
            border: none;
            outline: none;
            padding: 10px;
            border-radius: 45px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-top: 10px;
            cursor: pointer;
        }
        .btn:active{
            opacity: 0.8;
        }
        .btn:hover{
            background: #e4bcef;
        }
        </style>
<body>
    <div class="box">
        <div class="border-line"></div>
        <form action="sign_in.php" method="post">
            <h2>Sign in</h2>
            <div class="input-box">
                <input type="text" required="required" id="login_username" name="login_username">
                <span>Username</span>
                <i></i>
            </div>
            <div class="input-box">
                <input type="password" required="required" id="login_password" name="login_password">
                <span>Password</span>
                <i></i>
            </div>
            <div class="imp-links">
                <a href="forget.php">Forget Password</a>
                <a href="sign_up.php">Sign up</a>
            </div>
        <input type="submit" value="Login" class="btn" >
        </form>
    </div>   
    </html>