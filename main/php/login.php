<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-7 mx-auto mt-5">
                <div class="card">
                    <?php if (isset($_SESSION['created'])) : ?>
                        <div class="alert alert-success">
                            <?php echo $_SESSION['created']; ?>
                        </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['created']); ?>
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                    </svg></span>
                                <label for="">Email ID</label>
                                <input type="email" id="email" class="form-control email">
                                <div class="invalid-feedback emailError" style="font-size: 16px;">Email is requied</div>
                            </div>
                            <div class="form-group">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z" />
                                    </svg></span>
                                <label for="">Password</label>
                                <input type="password" id="password" class="form-control password">
                                <div class="invalid-feedback passwordError" style="font-size: 16px;">Password is requied</div>
                                <span><input type='checkbox' id='logtoggle'>&nbsp; <span id='logtoggleText'>Show Password</span></span>
                            </div>
                            <div class="form-group d-flex justify-content-between" style="margin-top: 2%;">
                                <p>Not a member ?<a href="index.php" class="text-decoration-none">Sign up Now</a></p>
                            </div>
                            <div class="form-group">
                                <button type="button" id="login" class="btn btn-info">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
</body>

</html>