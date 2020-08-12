	<?php
	include "database.php";
	if(isset($_POST["update"]))
					{
						$id=$_POST['id'];
						echo $id;
						?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #countryupdate,.stateupdate{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
  }
  #countryupdate:focus,.stateupdate:focus{
  background-color: #ddd;
  outline: none;
  }
  </style>
 </head>
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_formupdate" method="post">
					<div class="modal-header">	
									
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
					</div>
					<?php
				
					
					
				$result = mysqli_query($conn,"SELECT * FROM details where id='$id'");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>	
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" value="<?php echo $id; ?>"required>					
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="fname" name="fname" class="form-control" value="<?php echo $row["firstname"]; ?>" required>
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="lname" name="lname" class="form-control" value="<?php echo $row["lastname"]; ?>" required>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>" required>
						</div>
						<div class="form-group">
							<label>Mobile No.</label>
							<input type="number" id="phone" name="phone" class="form-control" value="<?php echo $row["mobile"]; ?>" required>
						</div>
						<div class="form-group">
						<label>Country</label><br>
						<?php
						$query = "SELECT * FROM country ORDER BY country_name ASC"; 
					    $result = $conn->query($query); 
					    ?>
						<select id="countryupdate" name="country">
						<option value="">Select Country</option>
                        <?php 
                        if($result->num_rows > 0){ 
                        while($row = $result->fetch_assoc()){  
                        echo '<option value="'.$row['id'].'">'.$row['country_name'].'</option>'; 
                        } 
                        }else{ 
                        echo '<option value="">Country not available</option>'; 
                        } 
                        ?>
                        </select>
						</div>
						<div class="form-group">
                        <label>Stateupdate:</label><br>
                        <select class="stateupdate" name="state">
                        
                        </select>
                        </div>
						<div class="form-group">
							<label>Pin code</label>
							<input type="number" id="pin" name="pin" class="form-control" value="<?php echo $row["pincode"]; ?>" required>
						</div>
						  <div class="form-group">
					       <label for="file">File</label>
					       <input type="file" class="btn btn-primary form-control" id="file" name="file" required />
                           </div>											
					</div>
<?php
}

?>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" name="submit" class="btn btn-info" id="update" value="Update">
					</div>
				</form>
			</div>
		</div>
	</div>
	</html>
	<?php
}
?>