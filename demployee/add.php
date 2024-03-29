<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {
	$FirstName = $_POST['eFirstName'];
	$LastName = $_POST['eLastName'];
	$Gender = $_POST['eGender'];
	$Department = $_POST['eDepartment'];
	$DateEmployed = $_POST['eDateEmployed'];
	$Salary = $_POST['eSalary'];
		
	// checking empty fields
	if(empty($FirstName) || empty($LastName) || empty($Gender) || empty($Department) || empty($DateEmployed) || empty($Salary)) {
				
	
		if(empty($FirstName)) {
			echo "<font color='red'>FirstName field is empty.</font><br/>";
		}
		if(empty($LastName)) {
			echo "<font color='red'>LastName field is empty.</font><br/>";
		}
		if(empty($Gender)) {
			echo "<font color='red'>Gender field is empty.</font><br/>";
		}
		if(empty($Department)) {
			echo "<font color='red'>Department field is empty.</font><br/>";
		}
		if(empty($DateEmployed)) {
			echo "<font color='red'>DateEmployed field is empty.</font><br/>";
		}
		if(empty($Salary)) {
			echo "<font color='red'>Salary field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database		
		$sql = "INSERT INTO tbl_employee(eFirstName, eLastName, eGender, eDepartment, eDateEmployed, eSalary) VALUES(:eFirstName, :eLastName, :eGender, :eDepartment, :eDateEmployed, :eSalary)";
		$query = $dbConn->prepare($sql);		
		$query->bindparam(':eFirstName', $FirstName);
		$query->bindparam(':eLastName', $LastName);
		$query->bindparam(':eGender', $Gender);
		$query->bindparam(':eDepartment', $Department);
		$query->bindparam(':eDateEmployed', $DateEmployed);
		$query->bindparam(':eSalary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':name' => $name, ':email' => $email, ':age' => $age));
		// $query->execute(array(':eid' => $id, ':eFirstName' => $FirstName, ':eLastName' => $LastName, ':eGender' => $LastName, ':eDepartment' => $Department, ':eDateEmployed' => $DateEmployed, ':eSalary' => $Salary));
		
		//display success message

		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
