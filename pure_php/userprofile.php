<?php
include "db.php";
if (!isset($_SESSION['id'])) :
    header("location: login.php");
endif;

$message = '';
$error = '';
if (isset($_REQUEST["submit"])) {
    if (file_exists('json.json')) {
        /*$current_data = file_get_contents('json.json');
        $array_data = json_decode($current_data, true);*/
        $extra = array(
            'Name'           =>   $_POST['name'],
            'Email'          =>   $_POST['email'],
            'Date of Birth'  =>   $_POST['date'],
            'contact'        =>   $_POST['contact']
        );
        $array_data[] = $extra;
        $final_data = json_encode($array_data);
        if (file_put_contents('json.json', $final_data)) {
            $message = "<label class='text-success'>File Downloaded Success fully in C:/xampp/htdocs/onboarding/json</p>";
        }
    } else {
        $error = 'JSON File not exits';
    }
}


?>

<!DOCTYPE html>
 <html lang="en">

 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="app.js"></script>

 </head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <div class="card">
                    <span class="up_error"></span>
                    <div class="card-header">
                        <h3>User Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="form" enctype="multipart/form-data">
                            <?php
                            if (isset($error)) {
                                echo $error;
                            }
                            ?>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">First Name</label>
                                    <input type="text" id="form_fname" name="name" class="form-control fname" placeholder="Name" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['fname']; ?>">
                                    <span class="error_form" id="fname_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                                <div class="form-group col">
                                    <label for="">Last Name</label>
                                    <input type="text" id="form_lname" name="lname" class="form-control lname" placeholder="Name" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['lname']; ?>">
                                    <span class="error_form" id="lname_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email ID</label>
                                <input type="email" id="form_email" name="email" class="form-control email" placeholder="Email" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['email']; ?>">
                                <span class="error_form" id="email_error_message" style="font-size: 16px; color:red;"></span>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label for="">Date of Birth</label>
                                    <input type="date" id="form_date" name="date" class="form-control date" placeholder="Date of Birth" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['date']; ?>">
                                    <span class="error_form" id="date_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                                <div class="form-group col">
                                    <label for="">Phone Number</label>
                                    <input type="text" id="form_contact" name="contact" class="form-control contact" placeholder="Contact Number" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['contact']; ?>">
                                    <span class="error_form" id="contact_error_message" style="font-size: 16px; color:red;"></span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label for="">Password</label>
                                <input type="password" id="form_password" name="password" class="form-control password" placeholder="Password" style="margin-bottom: 3%;" required value="<?php echo $_SESSION['password']; ?>">
                                <span class="error_form" id="password_error_message" style="font-size: 16px; color:red;"></span>
                                <span><input type='checkbox' id='pro_toggle'>&nbsp; <span id='pro_toggleText'>Show Password</span></span>
                            </div>

                            <div class="form-group">
                                <!--<p><a href="login.php" class="text-decoration-none">Already have an account?</a></p>-->
                                <button type="button"  id="update" class="btn btn-info">Update</button>
                                <button type="submit" name="submit" id="submit" class="btn btn-info">JSON</button>
                                <button class="btn btn-info"><a href="profile.php" class="text-decoration-none" style="color: black;">Cancel</a></button>
                            </div>
                            <?php
                            if (isset($message)) {
                                echo $message;
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $("#pro_toggle").change(function() {
            if ($(this).is(':checked')) {
                $("#form_password").attr("type", "text");
                $("#pro_toggleText").text("Hide");
            } else {
                $("#form_password").attr("type", "password");
                $("#pro_toggleText").text("Show");
            }

        });
    });
</script>

</html>