<?php
include "database.php";
                        if(isset($_POST["country_id"])){ 
                        $country_id = $_POST["country_id"];
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM states WHERE country_id ='$country_id'  ORDER BY name ASC"; 
     $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select State</option>';
        while($row = $result->fetch_assoc()){ 
           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
        }
    }else{ 
        echo '<option value="State not available">State not available</option>'; 
    } 
}elseif(isset($_POST["country_idd"])){ 
                        $country_idd = $_POST["country_idd"];
    // Fetch state data based on the specific country 
    $query = "SELECT * FROM states WHERE country_id ='$country_idd'  ORDER BY name ASC"; 
     $result = $conn->query($query); 
     
    // Generate HTML of state options list 
    if($result->num_rows > 0){ 
        echo '<option value="">Select State</option>';
        while($row = $result->fetch_assoc()){ 
           echo '<option value="'.$row['name'].'">'.$row['name'].'</option>'; 
        }
    }else{ 
        echo '<option value="State not available">State not available to update</option>'; 
    } 
}
?>