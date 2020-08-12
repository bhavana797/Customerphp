<?php 
$uploadDir = 'images/'; 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 
if(isset($_POST['id']) || isset($_POST['fname']) || isset($_POST['lname']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['country']) || isset($_POST['state']) || isset($_POST['pin']) || isset($_POST['file'])){ 
    // Get the submitted form data 
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    
    // Check whether submitted data is not empty 
    if(!empty($id) && !empty($fname) && !empty($lname) && !empty($email) && !empty($phone) && !empty($country) && !empty($state) && !empty($pin)){ 
        // Validate email 
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
            $response['message'] = 'Please enter a valid email.'; 
        }else{ 
            $uploadStatus = 1; 
             
            // Upload file 
            $uploadedFile = ''; 
            if(!empty($_FILES["file"]["name"])){ 
                 
                // File path config 
                $fileName = basename($_FILES["file"]["name"]); 
                $targetFilePath = $uploadDir . $fileName; 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 
                // Allow certain file formats 
                $allowTypes = array('pdf', 'doc', 'docx', 'jpg', 'png', 'jpeg'); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to the server 
                    if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                        $uploadedFile = $fileName; 
                    }else{ 
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    } 
                }else{ 
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                } 
            } 
             
            if($uploadStatus == 1){ 
                // Include the database config file 
                include_once 'database.php'; 
                 
                // update form data in the database 
            
                $update = mysqli_query($conn,"UPDATE `details` SET `firstname`='$fname',`lastname`='$lname',`email`='$email',`mobile`='$phone',`country`='$country',`state`='$state',`pincode`='$pin',`photo`='$uploadedFile' WHERE id=$id");

                if($update){ 
                    $response['status'] = 1; 
                    $response['message'] = 'Form data updated successfully!'; 
                } 
            } 
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields (name and email).'; 
    } 
} 
 
// Return response 
echo json_encode($response);