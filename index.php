
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attractive Web Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS styles here -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            margin-bottom: 20px;
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="jumbotron">
        <h1 class="display-4">Welcome to My Attractive Web Page time 23:34</h1>
        <p class="lead">This is a simple example using PHP, HTML, and Bootstrap.</p>
    </div>

    <div class="container">
        <div class="row">
            <?php
            // Example PHP loop to generate content dynamically
            for ($i = 1; $i <= 3; $i++) {
                echo '<div class="col-md-4">
                        <div class="card">
                            <img src="https://via.placeholder.com/300" class="card-img-top" alt="Placeholder Image">
                            <div class="card-body">
                                <h5 class="card-title">Card Title '.$i.'</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>
                                <a href="#" class="btn btn-primary">Learn More</a>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <!-- Include Bootstrap JS and any other JavaScript libraries if needed -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

