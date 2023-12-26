<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <title><?php echo $pageTitle; ?></title>
    <!-- Include your common stylesheets, scripts, etc. here -->
</head>
<body>
    <?php include_once 'views/partials/navbar.php'; ?>
    <div class="container-fluid">
        <main>
            <?php echo $content; ?>
        </main>
        <nav class="navbar fixed-bottom navbar-dark bg-primary">
            <div class="container-fluid">
                <p>&copy; <?php echo date('Y'); ?> My Website</p>
            </div>
        </nav>
    </div>

<script src="../../assets/js/boostrap.min.js"></script>
<script src="../../assets/js/popper.min.js"></script>
</body>
</html>
