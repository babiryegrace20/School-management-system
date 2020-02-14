<?php 

unset($_SESSION['username']); // Delete the username key
unset($_SESSION['usertype']);

// session_destroy(); // This would delete all of the session keys

echo '<meta http-equiv="refresh" content="0;url=?page=login.php" />'; // Redirect to login.php
exit;

 ?>