<!DOCTYPE html>
<html>
<head>
	
</head>
<body>

<?php

	 if( empty($_GET["skill"]) ) { 
	echo "<div>Please select some option!</div>"; 
	}
   else { 
	$skill=$_GET["skill"];
	}

	if (isset($_GET['terms'])) {

   // Checkbox is selected
 

	$servername = "localhost";
	$username = "root";
	$pass = "";
	$db = "skills";

// Create connection
$conn = new mysqli($servername, $username, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql =" CREATE TABLE skill (
			id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
			markZuckerberg INT(30),
			expert INT(20),
			experienced INT(30),
			intermediate INT(30),
			newbie INT(30) 
)";

if ($conn->query($sql) === TRUE) {
    echo "Table Skills created successfully";
} else {
    //echo "Error creating table: " . $conn->error;
}

 if ($skill=="vZuck") {
 	$string="update skill set markZuckerberg = markZuckerberg+1;";
 }
 else if ($skill=="vExpert") {
 	$string="update skill set expert = expert+1;";
 }
 else if ($skill=="vExperienced") {
 	$string="update skill set experienced = experienced+1;";
 }
 else if ($skill=="vIntermediate") {
 	$string="update skill set intermediate = intermediate+1;";
 }
 else if ($skill=="vNewbie") {
 	$string="update skill set newbie = newbie+1;";
 }

   if ($conn->query($string) === TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  $sql="select markZuckerberg, expert, experienced, intermediate, newbie from skill;";
        $result = $conn->query($sql);

   if ($result->num_rows > 0) {
            // output data of each row
         
        

   while($row = $result->fetch_assoc()) {
                                    $res = $row["markZuckerberg"]+$row["expert"]+$row["experienced"]+$row["intermediate"]+$row["newbie"];
                                    $zuc = number_format($row["markZuckerberg"]/$res, 3)*100;
                                    $exp = number_format($row["expert"]/$res, 3)*100;
                                    $ex = number_format($row["experienced"]/$res, 3)*100;
                                    $int = number_format($row["intermediate"]/$res, 3)*100;
                                    $new = number_format($row["newbie"]/$res, 3)*100;
                                    echo "<div style='border: ridge;'>
                                    <div>
                                    <span style='width:100%;'>Mark Zuckerberg:</span>
                                    <div style='width:".$zuc."%;height:10px;background:tomato; display:block; border-radius:5px'></div> ".$zuc."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Expert:</span>
                                    <div style='width:".$exp."%;height:10px;background:dodgerblue; display:block; border-radius:5px'></div> ".$exp."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Experienced:</span>
                                    <div style='width:".$ex."%;height:10px;background:violet; display:block; border-radius:5px'></div> ".$ex."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Intermediate:</span>
                                    <div style='width:".$int."%;height:10px;background:orange; display:block; border-radius:5px'></div> ".$int."%
                                    </div>
                                    <div>
                                    <span style='width:100%;'>Newbie:</span>
                                    <div style='width:".$new."%;height:10px;background:green; display:block; border-radius:5px'></div> ".$new."%
                                    </div>"
                                    ."</div>";
                                }
                                 } else {
                                 	echo "No results";
                                 }
                          }else{
                          	echo "<div>Please confirm checkbox!</div>";
                          }

?>

</body>
</html>