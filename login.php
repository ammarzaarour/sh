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
                                    if (!empty($_SESSION["flash"])){
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                    <?php
                                    $x = $_SESSION["flash"];
                                    echo $x;
                                    $_SESSION["flash"] = "";
                                    
                                
                                    ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
        <form method="POST" action="php/login_code.php">
            <label for="first">
                  Email:
              </label>
            <input type="text" 
                   id="first"
                   name="email" 
                   placeholder="Enter your Username" required>

            <label for="password">
                  Password:
              </label>
            <input type="password"
                   id="password" 
                   name="password" 
                   placeholder="Enter your Password" required>

            <div class="wrap">
                <button type="submit"
                        onclick="solve()">
                    Submit
                </button>
            </div>
        </form>
        <p>Not registered? 
              <a href="signup.php" 
               style="text-decoration: none;">
                Create an account
            </a>
        </p>
    </div>
</body>

</html>