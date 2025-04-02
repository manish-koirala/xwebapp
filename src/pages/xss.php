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
            To-Do List Application
        </div>
        <div class="card-body">
            <div class="container">
                <form onsubmit="handleSubmit(event)">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="task" id="task" placeholder="Add a task here.">
                        <label class="form-label" for="task">Task</label>
                    </div>
                    <button class="btn btn-primary" type="submit">Add Task</button>
                </form>
                <table class="table table-primary table-striped mt-5">
                    <thead>
                        <tr>
                            <td class="text-center"><b>Tasks</b></td>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Fill with the tasks obtained from the backend. -->
                    </tbody>
                </table>
            </div>
        </div>
     </main>

    <!-- Include the footer. -->
    <?php include("../inc/footer.php"); ?>

    <script>
        // Make the "About" link active.
        document.getElementsByClassName("nav-link")[1].classList.add("active");

        const tableBody = document.getElementById("tableBody");
        if (tableBody.children.length == 0) {
            const p = document.createElement("p")
            p.innerText = "No items added to the list yet."
            p.classList.add("text-center")
            p.classList.add("mt-2")
            tableBody.appendChild(p)
        }
    </script>
</body>
</html>