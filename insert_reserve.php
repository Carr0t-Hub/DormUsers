<?php
// Establish a database connection (replace with your database configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pds_db";

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the POST request
// $name = $_POST["name"];
// $email = $_POST["email"];
$name = $_POST["name"];
$dateCheckIn = $_POST["dateCheckIn"];
$dateCheckOut = $_POST["dateCheckOut"];
$quantity = $_POST["quantity"];
$Status = "test";

$dateTimein = DateTime::createFromFormat('m-d-y', $dateCheckIn);
$dateTimeOut = DateTime::createFromFormat('m-d-y', $dateCheckOut);

$newdateCheckIn = $dateTimein->format('Y-m-d');
$newdateCheckOut = $dateTimeOut->format('Y-m-d');

//Today (YYYY-MM-DD)
$today = date("Y-m-d");
$query_add = '';


$ref_No = "SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'pds_db'
AND   TABLE_NAME   = 'dormreservation'";
$ref_res = $conn->query($ref_No);

if ($ref_res->num_rows > 0) {
    // output data of each row
    while($row = $ref_res->fetch_assoc()) {
        $controlNo2 = "sample-". $row["AUTO_INCREMENT"];
    }
  } else {
  }

 $controlNo = $controlNo2;  

 $sql = "INSERT INTO dormreservation (
controlNo, 
dateFiled,
`name`,
`status`,
`dateCheckIn`,
`dateCheckOut`

)
 VALUES (
'$controlNo', 
'$today',
'$name',
'$Status',
'$newdateCheckIn',
'$newdateCheckOut'
)";


if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>