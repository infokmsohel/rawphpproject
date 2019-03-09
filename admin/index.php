<?php
    session_start();
    if(isset($_SESSION['id'])) {
        header('Location: dashboard.php');
    }


    require_once '../vendor/autoload.php';
    use App\classes\Login;

    $message = '';
    if(isset($_POST['btn'])) {
        $login = new Login();
        $message = $login->adminLoginCheck($_POST);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Admin Login</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container" style="margin-top: 150px;">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-danger"><?php echo $message; ?></h4>
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" name="btn" class="btn btn-primary">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
    </body>
</html>