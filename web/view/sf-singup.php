<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Sales Follow UP | Login</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body>
    <main class="d-flex flex-column justify-content-center">
        <h1 class="text-center mt-5">Sales Follow UP</h1>
    <p class="h1 text-center text-muted"> Sign Up</p>

    <div class="col-6 my-5 mx-auto">
        <?php if (isset($message)) {echo "<div class='alert alert-info' role='alert'>".$message."</div>";}?>
        <form class="col-10 mx-auto" action="../salesfu/?" method="post">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" maxlength="40" required autofocus>
                    <small id="nameHelp" class="form-text text-muted">e.g. Charles</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Lastname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastnameHelp" maxlength="40" required>
                    <small id="lastnameHelp" class="form-text text-muted">e.g. Garden</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="book" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                    <small id="emailHelp" class="form-text text-muted">e.g. chg@company.com</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" id="inputPassword" class="form-control" name="password" aria-describedby="passwordHelp" required pattern="(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <small id="passwordHelp" class="form-text text-muted">Passwords must be at least 7 characters and contain at least 1 number, 1 capital letter and 1 special character</small>
                </div>
            </div>
            <div class="form-group row">
                <label for="passwordConfirm" class="col-sm-2 col-form-label">Confirm Password</label>
                <div class="col-sm-10">
                    <input type="password" id="passwordConfirm" class="form-control"  name="passwordConfirm" aria-describedby="passwordConfirm" required pattern="(?=^.{7,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">
                    <small id="passwordConfirmHelp" class="form-text text-muted">Passwords must be at least 7 characters and contain at least 1 number, 1 capital letter and 1 special character</small>
                </div>
            </div>
            <div class="col my-2 mx-auto p-0">
                <button type="submit" class="w-100 btn btn-primary">Register</button>
                <input type="hidden" name="action" value="insertTM">
                <p class="text-muted text-center m-2">Have an account? <a href="../salesfu/" class="text-dark">Sing in</a></p>
            </div>

        </form>
    </div>
    </main>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>