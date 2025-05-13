<?php include("../functions/bankbalance.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XWEBAPP</title>
    <!-- Include the bootstrap libraries. -->
    <link rel="stylesheet" href="/inc/bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="/inc/bootstrap-5.3.3-dist/js/bootstrap.js" defer></script>
</head>
<body>
    <!-- Include the header. -->
    <?php include("../inc/header.php"); ?>

    <!-- Include the main content. -->
     <main class="card" style="height: 90vh;">
        <div class="card-header text-center">
            Check Your Bank Balance!
        </div>
        <div class="card-body">
            <div class="container">
                <form action="/pages/sqli.php" method="post">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="username" id="username" placeholder="username">
                        <label class="form-label" for="username">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="password" name="password" id="password" placeholder="password">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div id="form-feedback" class="mt-3 mb-3">
                        <?php echo $results ?>
                    </div>
                    <button class="btn btn-primary" type="submit">Find Out</button>
                </form>
            </div>
        </div>
     </main>

    <!-- Include the footer. -->
    <?php include("../inc/footer.php"); ?>

    <script>
        // Make the "About" link active.
        document.getElementsByClassName("nav-link")[2].classList.add("active");
    </script>
</body>
</html>
