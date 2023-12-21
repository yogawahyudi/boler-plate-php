<?php
$pageTitle = "Page 1";
ob_start(); // Start buffering output
?>

<h2>Welcome to <?= $title?></h2>
<p>This is the content for Page 1.</p>

<?php
$content = ob_get_clean(); // Get the buffered content
include('layout/layout.php');
?>
