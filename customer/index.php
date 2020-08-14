<?php
include 'database.php';
if(isset($_POST["update"]))
{
	echo $_POST["id"];
}
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
	<!-- <link rel="stylesheet" type="text/css" href="css/style.css" media="screen"> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>
	<style>
		#country,#state{
 width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}
#country:focus,#state:focus{
  background-color: #ddd;
  outline: none;
}
	</style>
  </head>
<body>
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Manage Users</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Add New User</span></a>
						<!-- <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons"></i> <span>Delete</span></a> -->						
					</div>
                </div>
            </div>
<!--             <table class="table table-striped table-hover"> -->
            	<table id="example" class="table table-striped table-bordered" style="width:80%">
                <thead>
                    <tr>
						<th>
							<!-- <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span> -->
						</th>
						<th>SL NO</th>
                        <th>FIRSTNAME</th>
                        <th>LASTNAME</th>
                        <th>EMAIL</th>
						<th>MOBILE NUMBER</th>
                        <th>COUNTRY</th>
                        <th>STATES</th>
						<th>PINCODE</th>
						<th>PHOTO</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM details");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
						$cnid= $row["country"];
				?>
				<tr id="<?php echo $row["id"]; ?>">
				<td>
							<!-- <span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["UserID"]; ?>">
								<label for="checkbox2"></label>
							</span> -->
						</td>
						
					<td><?php echo $i; ?></td>
					<td><?php echo $row["firstname"]; ?></td>
					<td><?php echo $row["lastname"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["mobile"]; ?></td>
					<td><?php echo $row["country"]; ?></td>
					<td><?php echo $row["state"]; ?></td>
					<td><?php echo $row["pincode"]; ?></td>
					<td><img src='./images/<?php echo $row["photo"]; ?>' style='width:50px; height:50px; border:groove #000'></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["id"]; ?>"
							data-name="<?php echo $row["firstname"]; ?>"
							data-email="<?php echo $row["lastname"]; ?>"
							data-phone="<?php echo $row["email"]; ?>"
							data-city="<?php echo $row["mobile"]; ?>"
							data-city="<?php echo $row["country"]; ?>"
							data-city="<?php echo $row["state"]; ?>"
							data-city="<?php echo $row["pincode"]; ?>"
							data-city="<?php echo $row["photo"]; ?>"
							title="Edit"></i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete"></i></a>
                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>First Name</label>
							<input type="text" id="fname" name="fname" class="form-control" placeholder="Enter First Name" required pattern="[A-Za-z]{2,15}" title="Minimum Length 2 and Maximum Length 15/Enter only Alphabets">
						</div>
						<div class="form-group">
							<label>Last Name</label>
							<input type="text" id="lname" name="lname" class="form-control" placeholder="Enter Last Name" required pattern="[A-Za-z]{2,15}" title="Minimum Length 2">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email" required title="Enter in Email format">
						</div>
						<div class="form-group">
							<label>Mobile No.</label>
							<input type="number" id="phone" name="phone" class="form-control" placeholder="Enter mobile" required pattern="^[6-9][0-9]{9}" title="Mobile Number Should Began With 6/7/8/9 with valid 10 digit format">
						</div>
						<div class="form-group">
						<label>Country</label><br>
						<?php
						$query = "SELECT * FROM country ORDER BY country_name ASC"; 
					    $result = $conn->query($query); 
					    ?>
						<select id="country" name="country">
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
                        <label>State:</label><br>
                        <select id="state" name="state">
                        	
                        </select>
                        </div>
						<div class="form-group">
							<label>Pin code</label>
							<input type="number" id="pin" name="pin" class="form-control" required>
						</div>
						  <div class="form-group">
        <label for="file">File</label>
        <input type="file" class="btn btn-primary form-control" id="file" name="file" required />
    </div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<!-- 						<button type="button" class="btn btn-success">Add</button> -->

<button type="submit" class="btn btn-success submitBtn">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
<div id="get"></div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="edmodal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>    