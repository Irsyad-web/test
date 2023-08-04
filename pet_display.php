<!DOCTYPE html>

<html>
<?php

    $petname = $_POST["petname"];
    $pettype = $_POST["pettype"];
    $petbreed = $_POST["petbreed"];
    $petcolor = $_POST["petcolor"];
    $petDOB = $_POST["petDOB"];
    $petsex = $_POST["petsex"];
    $petprice = $_POST["petprice"];
    $petremarks = $_POST["petremarks"];

    $petDOBNew = new DateTime($petDOB);
    $servername="localhost";
    $username="root";
    $password="";
    $dbname = "MY_PETWORLD";

    $conn=new mysqli($servername,$username,$password,$dbname);

      if ($conn->connect_error){
          die("Connection failed: " .$conn->connect_error);
        } else {
	  
		$queryInsert = "INSERT INTO pets (Pet_ID, Pet_Name, Pet_Type, Pet_Breed, Pet_Color, Pet_DOB, Pet_Sex, Pet_Price, Remarks, OwnerID)
		VALUES ('"."', '".$petname"', '".$pettype"', '".$petbreed"', '".$petcolor"', '".$petDOB"', '".$petsex"', '".$petprice"', '".$petremarks"', '"."', )";

        if ($conn->query($queryInsert) === TRUE) {
            echo "<p style = 'color:blue;'>Success insert Pet record</p>";
        } else {
            echo "<p style = 'color:red;'>Error: Invalid query" . $conn->error. "</p>";
        }

	  }

$conn->close();
?>

<style>

    body {
        
        background-image: url(pets2.png);
        background-position: top;
        background-repeat: no-repeat;
        background-color: antiquewhite;
        }
    
    h1 {
        background-color: rgb(69, 165, 209);
        color: rgb(252, 219, 180);
        text-align: center;
        }

    h2 {
        color: rgb(88, 206, 206);
    }

</style>

<body>

    <h1>~Irsyad Meowz PetWorld~</h1>
    <h2>PET REGISTRATION DETAILS</h2>


<table border="1" width="30%">

<tr>
    <td> Pet Name: </td>
    <th> <b> <?php echo $petname; ?> </b> </th>
</tr>

<tr>
    <td> Pet Type: </td>
    <th> <b> <?php echo $pettype; ?> </b> </th>
</tr>

<tr>
    <td> Pet Breed: </td>
    <th> <b> <?php echo $petbreed; ?> </b> </th>
</tr>

<tr>
    <td> Pet Color: </td>
    <th> <b> <?php echo "<b style='color:$petcolor;'>this COLOR</b>"; $petcolor; ?> </b> </th>
</tr>

<tr>
    <td> Pet DOB: </td>
    <th> <b> <?php echo $petDOBNew->format('d-m-Y'); ?> </b> </th>
</tr>

<tr>
    <td> Pet Sex: </td>
    <th> <b> <?php echo $petsex; ?> </b> </th>
</tr>

<tr>
    <td> Pet Price: </td>
    <th> <b>RM <?php echo $petprice; ?> </b> </th>
</tr>

<tr>
    <td> Pet Remarks: </td>
    <th> <b> <?php echo $petremarks; ?> </b> </th>
</tr>
</table>

<p> <u> <a href="pet_form.html" target="null" ><b>Insert New Record</b></a> </u> </p> 

</body>
</html>