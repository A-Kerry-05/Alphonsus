<html>
    <head>
        <title>Registration</title>
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
        if (isset($_POST["submit"])) {
              $username = $_POST["username"];
              $email = $_POST["email"];
              $password = $_POST["password"];
              $create_DT = date("Y-m-d H:i:s");
        
        
            $sql = "INSERT INTO users(username,email,pass_word,create_DT) VALUES ('$username' , '$email', '" . md5 ($password) . "', '$create_DT')";
            $result = mysqli_query($link, $sql);

            if ($result) {
                echo "<div class='form'>
        <h3>You are successfully registered</h3><br>
        <p class='link'>Click here to <a href='index.php'>login</a></p>
      </div>";

            } else {
                echo "<div class='form'>
        <h3>Required fields are missing</h3><br>
        <p class='link'>Click here to <a href='index.php'>try again</a></p>
      </div>";

            } 
        } else {
        ?>

        <h2>Registration</h2>

        <form name="registration" method="post" action="registration.php">
            <label for="username">Username: </label>
            <input type="text" name="username">

            <label for="email">Email Address: </label>
            <input type="email" name="email">

            <label for="password">Password: </label>
            <input type="password" name="password">

            <input type="submit" name="submit" value="Register">
        </form>

        <?php
            }
        ?>



    </body>
</html>