<?PHP

session_start();
session_destroy();
echo '<script> window.location="index.php"; </script>';

?>