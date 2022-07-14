<?php
include "db.php";

    if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['date']) && isset($_POST['password'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $contact = trim($_POST['contact']);
        $date = trim($_POST['date']);
        $password = trim($_POST['password']); 
        $checkEmail = $db->prepare("SELECT email FROM users WHERE email = ? ");
        $checkEmail->execute([$email]);
        if($checkEmail->rowCount() > 0){
            echo json_encode(['status' => 'error','message' => 'Sorry this email is already exists']);
        }else{
            $Query = $db->prepare("INSERT INTO users (fname, lname, email, contact, date, password) VALUES(?,?,?,?,?,?)");
            $Query->execute([$fname,$lname,$email,$contact,$date,$password]);
            if($Query){
                $_SESSION['created'] = "Your account has been created successfully";
                echo json_encode(['status'=>'success']);
            }
        }
    }


?>