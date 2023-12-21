<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Include your common stylesheets, scripts, etc. here -->
</head>
<body>

<header>
    <h1>My Website</h1>
    <!-- Include common header content here -->
</header>

<main>
    <?php echo $content; ?>
</main>

<footer>
    <!-- Include common footer content here -->
    <p>&copy; <?php echo date('Y'); ?> My Website</p>
</footer>

</body>
</html>
