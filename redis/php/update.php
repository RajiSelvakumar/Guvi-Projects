<?php
include "db.php";

if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])  && isset($_POST['date'])  && isset($_POST['contact']) && isset($_POST['password'])) {
    $id = $_SESSION['id'];
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $date = trim($_POST['date']);
    $contact = trim($_POST['contact']);
    $password = trim($_POST['password']);

    $pdoQuery = "UPDATE users SET fname=:fname, lname=:lname, email=:email, date=:date, contact=:contact, password=:password WHERE id=:id";
    $pdoQuery_run = $db->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(":fname" => $fname, ":lname" => $lname, ":email" => $email, ":date" => $date, ":contact" => $contact, ":password" => $password, ":id" => $id));

    if ($pdoQuery_exec) {
        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['date'] = $date;
        $_SESSION['contact'] = $contact;
        $_SESSION['password'] = $password;
        $_SESSION['create'] = "Updated Successfully";
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Update failure']);
    }
}
?>