<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	
	$id=$_POST['id'];
	$FirstName=$_POST['eFirstName'];
	$LastName=$_POST['eLastName'];
	$Gender=$_POST['eGender'];
	$Department=$_POST['eDepartment'];
	$DateEmployed=$_POST['eDateEmployed'];
	$Salary=$_POST['eSalary'];	
	
	// checking empty fields
	if(empty($FirstName) || empty($LastName) || empty($Gender) || empty($Department) || empty($DateEmployed) || empty($Salary)) {	
			
		if(empty($FirstName)) {
			echo "<font color='red'>First Namefield is empty.</font><br/>";
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
	} else {	
		//updating the table
		$sql = "UPDATE tbl_employee SET eFirstName=:eFirstName, eLastName=:eLastName, eGender=:eGender, eDepartment=:eDepartment, eDateEmployed=:eDateEmployed, eSalary=:eSalary WHERE id=:id";
		$query = $dbConn->prepare($sql);
		$query->bindparam(':id', $id);		
		$query->bindparam(':eFirstName', $FirstName);
		$query->bindparam(':eLastName', $LastName);
		$query->bindparam(':eGender', $Gender);
		$query->bindparam(':eDepartment', $Department);
		$query->bindparam(':eDateEmployed', $DateEmployed);
		$query->bindparam(':eSalary', $Salary);
		$query->execute();
		
		// Alternative to above bindparam and execute
		// $query->execute(array(':id' => $id, ':name' => $name, ':email' => $email, ':age' => $age));
				
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}

?>
<?php
//getting id from url

$id = isset($_GET['id']);

//selecting data associated with this particular id
$sql = "SELECT * FROM tbl_employee WHERE id";
$query = $dbConn->prepare($sql);
$query->execute(array(':id' => $id));

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
	$id = $row['id'];
	$FirstName = $row['eFirstName'];
	$LastName = $row['eLastName'];
	$Gender = $row['eGender'];
	$Department = $row['eDepartment'];
	$DateEmployed = $row['eDateEmployed'];
	$Salary = $row['eSalary'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>FirstName</td>
				<td><input type="text" name="eFirstName" value="<?php echo $FirstName;?>"></td>
			</tr>
			<tr> 
				<td>LastName</td>
				<td><input type="text" name="eLastName" value="<?php echo $LastName;?>"></td>
			</tr>
			<tr> 
				<td>Gender</td>
				<td><input type="text" name="eGender" value="<?php echo $Gender;?>"></td>
			</tr>
			<tr> 
				<td>Department</td>
				<td><input type="text" name="eDepartment" value="<?php echo $Department;?>"></td>
			</tr>
			<tr> 
				<td>DateEmployed</td>
				<td><input type="text" name="eDateEmployed" value="<?php echo $DateEmployed;?>"></td>
			</tr>
			<tr> 
				<td>Salary</td>
				<td><input type="text" name="eSalary" value="<?php echo $Salary;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $id = isset($_GET['id']);?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
