<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>HTML Login Form</title>
    <link rel="stylesheet" 
          href="styles/style.css">
</head>

<body>
    <div class="main">
        <h1>ShaRay</h1>
        <h3>Enter your login credentials</h3>
        <?php
					/* If email is already taken, print a danger alert that tells "email is already taken"*/
                                    if (!empty($_SESSION["up-flash"])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php
                                    $x = $_SESSION["up-flash"];
                                    echo $x;
                                    $_SESSION["up-flash"] = "";
                                    
                                
                                    ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
        <form action="php/signup.php" method="POST">
            <label for="name">
                Fullname:
            </label>
          <input type="text" 
                 id="name"
                 name="name"
                 placeholder="Enter your Fullname" required>

            <label for="email">
                  Email:
              </label>
            <input type="email" 
            data-validate = "Valid email is required: ex@abc.xyz"
                   id="email"
                   name="email"
                   placeholder="Enter your Email" required>

            <label for="password">
                  Password:
              </label>
            <input type="password"
                   id="password" 
                   name="password"
                   data-validate = "Password is required"
                   placeholder="Enter your Password" required>

            <label for="confirmpassword">
                   Confirm Password:
                </label>
              <input type="password"
                     id="confirmpassword"
                     name = "confirmpassword"
                     data-validate = "Confirm is required"
                     placeholder="Confirm your Password" required>

            <div class="wrap">
                <button type="submit"
                        onclick="solve()">
                    Submit
                </button>
            </div>
        </form>
      
    </div>
</body>

</html>