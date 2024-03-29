<?php
include "db.php";
include "profile_id.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row text-center align-items-center justify-content-center">
            <?php if (isset($_SESSION['create'])) : ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['create']; ?>
                </div>
            <?php endif; ?>
            <?php unset($_SESSION['create']); ?>
            <div class="col-md-5" style="background-color: #d3d3d3;margin-top:10%;border-radius:30px;padding:2% 0%;">
                <div class="jumbotron" style="margin-bottom: 3%;">
                    <h4 style="text-transform: capitalize;padding:3% 0%;">Hello, <?php echo $_SESSION['fname']; ?> </h4>
                    <h6 class="pb-2" style="font-weight: 400;text-transform: capitalize;"><strong>First Name : </strong> <?php echo  $_SESSION['fname']; ?></h6>
                    <h6 class="pb-2" style="font-weight: 400;text-transform: capitalize;"><strong>Last Name : </strong> <?php echo  $_SESSION['lname']; ?></h6>
                    <h6 class="pb-2" style="font-weight: 400;"><strong>Email Id : </strong> <?php echo  $_SESSION['email']; ?></h6>
                    <h6 class="pb-2" style="font-weight: 400;"><strong>Date of Birth : </strong><?php echo $_SESSION['date']; ?></h6>
                    <h6 class="pb-4" style="font-weight: 400;"><strong>Phone Number : </strong><?php echo $_SESSION['contact']; ?></h6>
                    <div class="d-flex justify-content-center">
                        <a href="userprofile.php" class="btn btn-primary" role="button" style="margin-right: 2%;">Edit</a>
                        <a href="logout.php" class="btn btn-primary" role="button" style="margin-left: 2%;">Logout</a>
                    </div>

                </div>
            </div>
            </form>
        </div>
    </div>
</body>

</html>