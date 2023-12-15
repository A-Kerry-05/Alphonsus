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
            let x = document.forms['myForm4']['CID'].value;
            let y = document.forms['myForm4']['CName'].value;
            let z = document.forms['myForm4']['CCapacity'].value;

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
              window.alert("Capacity must be filled out");
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
        <form name="myForm4" method="post" action="addClass.php" onSubmit="validateForm()">
            <label for="CID">Class ID: </label>
            <input type="number" name="CID">

            <label for="CName">Class Name: </label>
            <input type="text" name="CName">

            <label for="CCapacity">Class Capacity: </label>
            <input type="number" name="CCapacity">

            <label>Select Teacher:</label>
            <select name = "tid">
              <?php
              $sql = mysqli_query($link, "SELECT TID, TName, TEmail FROM teacher");
              while ($row = $sql -> fetch_assoc()) {
                echo "<option value='{$row['TID']}'>
                                     {$row['TName']}
                                     </option>";
              }

              ?>

            <br>
            <br>

            <input type="submit" name="Submit" value="Submit">
        </form>
    
        <?php


        if (isset($_POST["Submit"])) {
              $cid = $_POST["CID"];
              $cname = $_POST["CName"];
              $ccapacity = $_POST["CCapacity"];
        }
        
            $sql = "INSERT INTO class(CID,CName,CCapacity) VALUES ('$cid' , '$cname', '$ccapacity');";
            if (mysqli_query($link, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error adding record";
            }

        

        ?>
    </body> 
</html>
