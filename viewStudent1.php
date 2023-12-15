<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body {
              font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
              background-color: #F9F7F7;
              
            }
    
            .navbar {
              overflow: hidden;
              background-color: #EA8A8A;
              width: 21.5%;
              margin-left: 39%;
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
              background-color: #685454;
            }
    
            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #ddd;
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
              background-color: #EBD5D5;
            }
    
            .dropdown:hover .dropdown-content {
              display: block;
            }
            </style>
    </head>
    <body>
    <body>
        <div class="navbar">
            <a href="index2.html">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="viewStudent1.php">Student</a>
                    <a href="viewParent1.php">Parent</a>
                    <a href="viewTeacher1.php">Teacher</a>
                    <a href="viewClass1.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="addStudent1.php">Student</a>
                    <a href="addParent1.php">Parent</a>
                    <a href="addTeacher1.php">Teacher</a>
                    <a href="addClass1.php">Class</a>
                </div>
            </div>
            <a href="Contact.html">Contact Us</a>
        </div>
        <?php
          $link = mysqli_connect("localhost","root","","Alphonsus");
        
          if ($link === false) {
              die("Connection Failed: ");
          }
        ?>

        <br>
        <h3>See All Students</h3>

            <table>
                <tr>
                    <th width="150px">Student ID<br><hr></th>
                    <th width="250px">SName<br><hr></th>
                        <th width="250px">SEmail<br><hr></th>

        </tr>

        <?php

        $sql = mysqli_query($link,"SELECT StudentID, SName, SEmail FROM Student" );
        while ($row = $sql->fetch_assoc()) {
            echo "
            <tr>
                <th>{$row["StudentID"]}</th>
                <th>{$row["SName"]}</th>
                <th>{$row["SEmail"]}</th>
            </tr>";
        }
        ?>
            </table>
    </body> 
</html>
