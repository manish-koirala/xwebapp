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
            Directory Path Traversal
        </div>
        <div class="card-body">
            <img class="card-img-top d-block mx-auto" src="/public/dirtraversal.png" alt="Command Injection logo" style="width: 320px;">
            <p class="mt-5 text-center">Try using these following routes after this path to access hidden documents.</p>
            <div class="container">
                <ul class="list-group">
                    <li class="list-group-item">../secret.txt</li>
                    <li class="list-group-item">../../../etc/passwd</li>
                    <li class="list-group-item">../../../etc/shadow</li>
                </ul>
            </div>
                
        </div>
    </main>

    <!-- Include the footer. -->
    <?php include("../inc/footer.php"); ?>

    <script>
        // Make the "About" link active.
        document.getElementsByClassName("nav-link")[4].classList.add("active");
    </script>
</body>
</html>