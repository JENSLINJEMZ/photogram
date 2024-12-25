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

    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    //   }
      
      $sql = "INSERT INTO user_data (username, password, email, number) VALUES ('$username','$password','$email','$number')";
      
      if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
}

// function user_data($username,$password,$email,$number) {
//     $conn = connections();
     
//       $sql = "INSERT INTO user_data (username, password, email, number) VALUES ($username, $password, $email, $number)";
      
//       if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//       } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//       }
      
//       $conn->close();
// }
