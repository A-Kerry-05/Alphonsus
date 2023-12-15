<html>
    <head>
       <title>Login</title>
         <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>

    <body>
    <?php
           $link = mysqli_connect("localhost","root","","Alphonsus");
        
           if ($link === false) {
               die("Connection Failed: ");
           }
        ?>

      <?php
        session_start();

          if (isset($_POST["username"])) {
            $username = $_POST['username'];
            $password = $_POST['password'];


            $sql = "SELECT * FROM users WHERE username = '$username' AND pass_word = '" . md5($password) . "'";
            $result = mysqli_query($link, $sql);
            $rows = mysqli_num_rows($result);

            if ($rows == 1 && $username == "admin") {
                header("location: index1.html");
                exit;

            } else if ($rows == 1 && $username != "admin")  {
                header("location: index2.html");
                exit;
                
            } else {
                echo "<div class='form'>
        <h3>Incorrect username/password</h3><br>
        <p class='link'>Click here to <a href='index.php'>try again</a></p>
        </div>";

            } 
        } else {
        ?>

        <h1>St Alphonsus R.C. Primary School DataBase</h1>

        <h3>Login</h3>

        <form name="login" method="post" action="index.php">
            <label for="username">Username: </label>
            <input type="text" name="username">

            <label for="password">Password: </label>
            <input type="password" name="password">

            <input type="submit" name="submit" value="Login">

        </form>

        <p class='link'>Click here to <a href='registration.php'>register</a></p>

        <?php
        }
        ?>
    </body>
</html>