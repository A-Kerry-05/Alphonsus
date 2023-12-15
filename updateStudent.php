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
              background-color: #3F72AF;
              width: 36%;
              margin-left: 32.5%;
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
              background-color: #112D4E;
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
              background-color: #DBE2EF;
            }
    
            .dropdown:hover .dropdown-content {
              display: block;
            }
            </style>

        <script>
          function validateForm() {
            let x = document.forms['myForm']['SID'].value;
            let y = document.forms['myForm']['SName'].value;
            let z = document.forms['myForm']['SEmail'].value;

            if (x == "")
            {
              window.alert("ID must be filled out");
              return false;
            }
            else if (y == "")
            {
              window.alert("Name must be filled out");
              return false;
            }
            else if (z == "")
            {
              window.alert("Email must be filled out");
              return false;
            }


          }
        </script>
    </head>
    <body>
    <div class="navbar">
            <a href="index1.html">Admin Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="viewStudent.php">Student</a>
                    <a href="viewParent.php">Parent</a>
                    <a href="viewTeacher.php">Teacher</a>
                    <a href="viewClass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="addStudent.php">Student</a>
                    <a href="addParent.php">Parent</a>
                    <a href="addTeacher.php">Teacher</a>
                    <a href="addClass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="delStudent.php">Student</a>
                  <a href="delParent.php">Parent</a>
                  <a href="delTeacher.php">Teacher</a>
                  <a href="delClass.php">Class</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="updateStudent.php">Student</a>
                <a href="updateParent.php">Parent</a>
                <a href="updateTeacher.php">Teacher</a>
                <a href="updateClass.php">Class</a>
            </div>
        </div>
        </div>
        <?php

        $link = mysqli_connect("localhost","root","","Alphonsus");
  
            if ($link === false) {
              die("Connection Failed: ");
            }
        ?>

        <br>
        <form name="myForm" method="post" action="updateStudent.php" onSubmit="validateForm()">
        <label>Select Student:</label>
            <select name = "student_id">
              <?php
              $sql = mysqli_query($link, "SELECT StudentID, SName FROM Student");
              while ($row = $sql -> fetch_assoc()) {
                echo "<option value='{$row['StudentID']}'>
                                     {$row['SName']}
                                     </option>";
              }

              ?>
            </select>
              <br>

            <label for="SName">Student First Name: </label>
            <input type="text" name="SName">

            <label for="SEmail">Student Email: </label>
            <input type="text" name="SEmail">

            <label>Select Parent:</label>
            <select name = "parent_id">
              <?php
              $sql = mysqli_query($link, "SELECT PID, PName, PEmail FROM parent");
              while ($row = $sql -> fetch_assoc()) {
                echo "<option value='{$row['PID']}'>
                                     {$row['PName']}
                                     </option>";
              }

              ?>

            <br>
            <br>
            <br>

            <input type="submit" name="Submit" value="Submit">
        </form>
    
        <?php
            if (isset($_POST["Submit"])) {
                $sid = $_POST["student_id"];
                $sname = $_POST["SName"];
                $semail = $_POST["SEmail"];
                $parent_id = $_POST["parent_id"];
            }

            $sql = "UPDATE Student SET SName='$sname', SEmail='$semail', PID='$parent_id' WHERE StudentID='$sid';";
            if (mysqli_query($link, $sql)) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record";
            }


        ?>
    </body> 
</html>
