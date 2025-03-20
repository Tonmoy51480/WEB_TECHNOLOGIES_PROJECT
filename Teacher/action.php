<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "Full Name" => $_POST['full_name'],
        "Date of Birth" => $_POST['dob'],
        "Gender" => $_POST['gender'],
        "Education Status" => $_POST['education'],
        "Address" => $_POST['address'],
        "City" => $_POST['city'],
        "ZIP Code" => $_POST['zip'],
        "Phone" => $_POST['phone'],
        "Comments" => $_POST['comments']
    ];

    
    
    echo "Registration Successful!";
} else {
    echo "Invalid Request";
}
?>
