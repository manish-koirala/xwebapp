<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XWEBAPP</title>
    <!-- Include the bootstrap libraries. -->
    <link rel="stylesheet" href="../inc/bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="../inc/bootstrap-5.3.3-dist/js/bootstrap.js" defer></script>
</head>
<body>
    <!-- Include the header. -->
    <?php include("../inc/header.php"); ?>

    <!-- Include the main content. -->
    <main class="card" style="height: 90vh;">
        <div class="card-header text-center">
            XWebApp - A simple vulnerable Web Application
        </div>
        <div class="card-body">
            <h5 class="card-title text-center">General Info:</h5>
            <p class="container card-text p-2 text-center">
                This project is a simple web application written in PHP. It is made intentionally vulnerable towards common web
                application vulnerabilities such as:
            </p>
            <div class="container" >
                <div class="row">
                    <!-- Cross Site Scripting -->
                    <div class="col col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Cross Site Scripting (XSS)
                            </div>
                            <div class="card-body">
                                <img class="card-img-top" src="/public/xss.png" alt="Cross Site Scripting logo">
                                <p>A to-do list tracker application to demonstrate reflected XSS.</p>
                                <a href="/pages/xss.php" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                    <!-- SQL Injection -->
                    <div class="col col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                SQL Injection (SQLI)
                            </div>
                            <div class="card-body">
                                <img class="card-img-top" src="/public/sqli.png" alt="SQL Injection logo">
                                <p>A form for pulling bank balance amount for registered users.</p>
                                <a href="/pages/sqli.php" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                    <!-- Command Injection -->
                    <div class="col col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Command Injection
                            </div>
                            <div class="card-body">
                                <img class="card-img-top" src="/public/shell.png" alt="Command Injection logo">
                                <p>A ping application for checking connections to public servers.</p>
                                <a href="/pages/command-injection.php" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                    <!-- Path Traversal -->
                    <div class="col col-md-3">
                        <div class="card">
                            <div class="card-header text-center">
                                Directory Path Traversal
                            </div>
                            <div class="card-body">
                                <img class="card-img-top" src="/public/dirtraversal.png" alt="Cross Site Scripting logo">
                                <p>Make changes to the URL to catch this vulnerability.</p>
                                <a href="/pages/path-traversal.php" class="btn btn-primary">Show</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </main>

    <!-- Include the footer. -->
    <?php include("../inc/footer.php"); ?>

    <script>
        // Make the "About" link active.
        document.getElementsByClassName("nav-link")[0].classList.add("active");
    </script>
</body>
</html>