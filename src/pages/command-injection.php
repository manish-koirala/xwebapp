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
            Ping App
        </div>
        <div class="card-body">
            <h5 class="card-title">View Ping Results To An IP or Domain Name:</h5>
            <form onsubmit="getResults(event)" class="mb-3">
                <div class="mb-3">
                    <label for="target" class="form-label" >IP or domain: </label>
                    <input type="text" id="target" name="target" class="form-control" placeholder="www.google.com">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Ping</button>
            </form>
            <div class="container d-none" id="ping-results-container">
                <div class="card text-light bg-secondary">
                    <div class="card-header text-center">
                        Results
                    </div>
                    <pre class="card-body" id="ping-results">
                    </pre>
                </div>
            </div>
                
        </div>
     </main>

    <!-- Include the footer. -->
    <?php include("../inc/footer.php"); ?>

    <script>
        // Make the "About" link active.
        document.getElementsByClassName("nav-link")[3].classList.add("active");


        // Submit form for getting the ping results.
        function getResults(event) {
            event.preventDefault();
            fetch(`/functions/ping.php?target=${document.getElementById("target").value}`)
            .then(response => response.text())
            .then(data => {
                const resultsContainer = document.getElementById("ping-results-container");
                const results = document.getElementById("ping-results");
                if (resultsContainer.classList.contains("d-none")) {
                    resultsContainer.classList.remove("d-none");
                }
                results.innerHTML = data;
            })
            .catch(error => {
                console.error("Error fetching ping results.", error)
            });
        }
    </script>
</body>
</html>