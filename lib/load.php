<?php 

function load_template($name){
    include __DIR__ ."/../templates/main/$name.php";
}


function connections() {
    $servername = "mysql.selfmade.ninja";
    $username = "jemz_DB";
    $password = "@1234Jemz";
    $dbname = "jemz_DB_user_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn; // Return the connection object
    
}

function close_connection($conn){
    $conn->close();
}   

function user_data($username,$password,$email,$number) {
    $conn = connections();
      
      $sql = "INSERT INTO user_data (username, password, email, number) VALUES ('$username','$password','$email','$number')";
      
      if ($conn->query($sql) === TRUE) {
return $conn->affected_rows;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
}

function login($username,$password) {
    $conn = connections();
      
      $sql = "SELECT * FROM user_data WHERE username = '$username' AND password = '$password' ";
      
      $result = $conn->query($sql);

      // Check if the query returns any rows
      if ($result->num_rows > 0) {
          // If a match is found
          while ($row = $result->fetch_assoc()) {
            $uname = $row['username'];
            $upass = $row['password'];
            if ($uname and $upass) {
                echo "Login Success!";
            } else {
                echo "Invalid username or password.";
            }
        }
      } else {
          // If no match is found
          echo "Invalid username or password.";
      }
      
      $conn->close();

}


