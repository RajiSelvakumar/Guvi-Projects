<?php 
include "db.php";
    
if(isset($_POST['email']) && isset($_POST['password'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $Query = $db->prepare("SELECT * FROM users WHERE email =?");
    $Query->execute([$email]);
    if($Query->rowCount() > 0){
        $row = $Query->fetch(PDO::FETCH_OBJ);
        $email = $row->email;
        $dbpassword = $row->password;
        $fname = $row->fname;
        $lname = $row->lname;
        $date = $row->date;
        $contact = $row->contact;
        $id = $row->id;
        if($password === $dbpassword){
            $_SESSION['id'] = $id;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['email'] = $email;
            $_SESSION['date'] = $date;
            $_SESSION['contact'] = $contact;
            $_SESSION['password'] = $password;
            echo json_encode(['status' => 'success']);
        }else {
            echo json_encode(['status' => 'passwordError', 'message' => 'Your password is wrong']);
        }
       }else {
            echo json_encode(['status' => 'emailError','message' => 'Your email is wrong']);
        }
    }
?>
