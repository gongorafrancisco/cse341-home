<?php if (isset($_SESSION['message'])) {$message = $_SESSION['message'];} ?>
<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Sales Follow UP | Login</title>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/common/head.php'; ?>
</head>

<body class="d-flex flex-column justify-content-center">
    <h1 class="text-center my-3">Sales Follow UP</h1>
    <div class="col-3 text-center my-5 mx-auto">
        <h4 class="text-muted">Please sing in</h4>
        <?php if (isset($message)) {echo "<div class='alert alert-info' role='alert'>".$message."</div>"; unset($message);}?>
        <form class="form-signin" action="../salesfu/index.php" method="post">
            <div class="my-3">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
            </div>
            <div class="my-3">
                <label for="password" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <input type="hidden" name="action" value="login">
            
            <p class="text-muted mt-2">Not a member? <a href="../salesfu/?action=register" class="text-dark">Register</a></p>

            <p class="mt-4 mb-3 text-muted">&copy;2020</p>
        </form>
    </div>
    <script src="../js/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="../js/scripts.js"></script>
</body>

</html>
<?php unset($_SESSION['message']); ?>