<html>
<head>
    <title>Login Page..</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg,transparent, #ff6b81,  #2ecc71, #fdcb6e, #e74c3c,#74b9ff,#89763d,transparent);
    margin: 0px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 0px;
    padding-top: 0px;
    height: 156vh;
}
.container {
    background-color: #fff;
    margin-top: 0px;
    padding: 70px;
    border-radius: 8px;
    height: 130vh;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
}

input {
    margin-top: 0px;
    padding-top: 0px;
    padding: 8px;
    border-radius: 30px;
    margin-bottom: 16px;
    width: 250px;
}

input[type="submit"] {
    background-color: #efa4a4;
    color: #333;
    cursor: pointer;
    border-radius: 30px;
    cursor: pointer;
    font-weight: bold;
    font-size: 22px;
}
input[type="submit"]:hover{
    background-color: #74b9ff;
}
@keyframes fadeInn
{
    0%{
        opacity: 0;
    }
    100%{
        opacity: 1;
    }
}
.animated-text{
    animation: fadeInn 4s ease-in-out;
}

.password-container {
    position: relative;
}
.eye {
    position: absolute;
    top: 35%;
    right: 9px;
    transform: translateY(-50%);
    width: 20px;
    height: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 50%;
    cursor: pointer;
}

.eye:before {
    content: "";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 6px;
    height: 6px;
    background-color: #000;
    border-radius: 50%;
    transition: width 0.3s ease;
}

.eye.visible:before {
    width: 2px;
}


</style>

</head>
<body>
<div class="container">
        <form action="" method="post">
            <h1 class="animated-text" style="color: #ea7982; margin-top: 0px;">ATM Login Form</h1>
            
			<lable for="firstname" class="animated-text">First Name:</lable>
			<input type="text" name="firstname" class="animated-text" required>

            <label for="middlename" class="animated-text">Middle Name:</label>
            <input type="text" name="middlename" class="animated-text" required>

            <label for="lastname" class="animated-text">Last Name:</label>
            <input type="text" name="lastname" class="animated-text" required>

            <label for="password" class="animated-text">Password:</label>
            <div class="password-container">
                <input type="password" name="password" id="password" class="animated-text" required>
                <span class="animated-text">
                <span class="eye" onclick="togglePasswordVisibility()"></span></span>
            </div>

            <label for="dob" class="animated-text">Date of Birth:</label>
            <input type="date" class="animated-text" name="dob">

            <label for="email" class="animated-text">Email:</label>
            <input type="email"  class="animated-text" name="email" id="emailField" required>

            
            <label for="state" class="animated-text">State:</label>
            <input type="text" class="animated-text" name="state" required>

            <label for="city" class="animated-text">City:</label>
            <input type="text" class="animated-text" name="city" id="city" oninput="fillPinCode()" required>
            
            <label for="pin code" class="animated-text">Pin Code:</label>
            <input type="number" class="animated-text" id="pinCode" name="pin_code" readonly required>

            <input type="submit" value="Submit" class="animated-text">

        </form>
    </div>

    <script>
     
     document.addEventListener("DOMContentLoaded", function() {
  const emailField = document.getElementById('emailField');
  
  emailField.addEventListener('focus', function() {
    // Check if the field is empty or does not contain '@gmail.com'
    if (!this.value || !this.value.includes('@gmail.com')) {
      // If so, set the value to '@gmail.com' and move the cursor to the start
      this.value = '@gmail.com';
      this.setSelectionRange(0, 0);
    }
  });
  
  emailField.addEventListener('blur', function() {
    // If the field is left empty, reset the value
    if (!this.value) {
      this.value = '';
    }
  });
  
  emailField.addEventListener('input', function() {
    // If the field contains '@gmail.com', do nothing
    if (this.value.includes('@gmail.com')) {
      return;
    }
    
    // Otherwise, check if the value contains '@'
    const atIndex = this.value.indexOf('@');
    
    // If the '@' is found and is not at the start, set the value to everything before '@gmail.com'
    if (atIndex !== -1 && atIndex !== 0) {
      this.value = this.value.substring(0, atIndex) + '@gmail.com';
    }
  });
});


      
         function fillPinCode() {
            var cityInput = document.getElementById("city");
            var pinCodeInput = document.getElementById("pinCode");

            var cityToPinCode = {
                "Latur": "413512",
                "Dharashiv": "413501",
                "Pune":"411100",
                "Mumbai":"400001",
                "Solapur": "413001",
                "Pandharpur": "413304",
                "Mohal": "413216",
                "Barshi": "413404",
                "barshi": "413403",
                "Tuljapur":"413502"
                
            };

            var cityName = cityInput.value.trim();

            if (cityName in cityToPinCode) {
                pinCodeInput.value = cityToPinCode[cityName];
            } else {
                pinCodeInput.value = ""; 
            }
        }

        function fillemail() {
            var emailInput = document.getElementById("email");
           // var pinCodeInput = document.getElementById("pinCode");

            var cityToPinCode = "gmail.com";

            var emailName = emailInput.value.trim();

            if (emailName in cityToPinCode) {
                emailInput.value = cityToPinCode[emailName];
            } else {
                emailInput.value = ""; 
            }
        }

        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".eye");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.add("visible");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("visible");
            }
        }
        </script>


<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
        $servername="localhost";
		$username="root";
		$password="";
		$database="ankita";

		//create a connection
		$conn=mysqli_connect($servername,$username,$password,$database);

		$username=$_POST['firstname'];
		$middle_Name=$_POST['middlename'];
		$last_name=$_POST['lastname'];
		$date_of_birth=$_POST['dob'];
		$cus_email=$_POST['email'];
        $state_name=$_POST['state'];
		$city=$_POST['city'];
        $pincode=$_POST['pin_code'];

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
       
		$sql="INSERT INTO `login_details`(`First_Name`, `Middle_Name`, `Last_Name`, `DOB`, `Email`, `State`, `City`, `Pin Code`,`password`) VALUES ('$username','$middle_Name','$last_name','$date_of_birth','$cus_email','$state_name','$city','$pincode','$password')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			echo '<script>alert("Account created Successfully..!!");</script>';
		}
		else
		{
			echo '<script>alert("Error");</script>';
		}
	}
?>
</body>
</html>	
