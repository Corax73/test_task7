<?php

require_once "vendor/autoload.php";
include 'src/main.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div container>
        <div class="row row-cols-2">
            <div class="col">
                    <button class="btn btn-primary" id="regBtn">
                        Registration
                    </button>
                    <?php if (isset($message)) {?><span class="text-danger"><?php print $message; ?></span><?php } ?>
                    <form id="formReg" class="row gx-3 gy-2 align-items-center" method="POST" action="">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Name</label>
                        <input type="text" name="name" class="form-control" id="specificSizeInputName" placeholder="Name">
                        <?php if (isset($error['name'])) {?><span class="text-danger"><?php print $error['name']; ?></span><?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="phone">Phone number with country code</label>
                        <input type="number" step="1" id="phone" name="phone" class="form-control" data-mdb-input-mask="+48 999-999-999" placeholder="Phone number with country code">
                        <?php if (isset($error['phone'])) {?><span class="text-danger"><?php print $error['phone']; ?></span><?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Name</label>
                        <input type="email" name="email" class="form-control" id="specificSizeInputName" placeholder="Email">
                        <?php if (isset($error['email'])) {?><span class="text-danger"><?php print $error['email']; ?></span><?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <?php if (isset($error['password'])) {?><span class="text-danger"><?php print $error['password']; ?></span><?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleInputPasswordConfirm" class="form-label">Confirm password</label>
                        <input type="password" name="passwordConfirm" class="form-control" id="exampleInputPasswordConfirm">
                        <?php if (isset($error['passwordConfirm'])) {?><span class="text-danger"><?php print $error['passwordConfirm']; ?></span><?php } ?>
                        <?php if (isset($error['passwordMismatch'])) {?><span class="text-danger"><?php print $error['passwordMismatch']; ?></span><?php } ?>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col">
                    <button class="btn btn-primary" id="loginBtn">
                        Login
                    </button>
                    <form id="formLogin" class="row gx-3 gy-2 align-items-center" method="POST" action="">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Email or phone</label>
                        <input type="text" name="login" class="form-control" id="specificSizeInputName" placeholder="Email or phone">
                        <?php if (isset($error['login'])) {?><span class="text-danger"><?php print $error['login']; ?></span><?php } ?>
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="passwordForLogin" class="form-control" id="exampleInputPassword1">
                        <?php if (isset($error['passwordForLogin'])) {?><span class="text-danger"><?php print $error['passwordForLogin']; ?></span><?php } ?>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script src="js/form.js"></script>
</body>
</html>
