<?php

//include $_SERVER['DOCUMENT_ROOT'] . '/index.html';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Main</title>
</head>
<body>
    <div container>
        <div class="row row-cols-2">
            <div class="col">
                    <button id="regBtn">
                        Registration
                    </button>
                    <form id="formReg" class="row gx-3 gy-2 align-items-center" style="display: none;" method="post" action="">
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputName">Name</label>
                        <input type="text" class="form-control" id="specificSizeInputName" placeholder="Name">
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="phone">Phone number with country code</label>
                        <input type="text" id="phone" class="form-control" data-mdb-input-mask="+48 999-999-999" placeholder="Phone number with country code">
                    </div>
                    <div class="col-sm-3">
                        <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
                        <div class="input-group">
                            <div class="input-group-text">@</div>
                            <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="col-sm-3">
                        <label for="exampleInputPasswordConfirm" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="exampleInputPasswordConfirm">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col">
                    <button id="loginBtn">
                        Login
                    </button>
            </div>
        </div>
    </div>
<script src="js/form.js"></script>
</body>
</html>
