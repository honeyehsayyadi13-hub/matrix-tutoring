<?php
session_start();//starting session to modify
session_unset();//clearing session variables
session_destroy();//destroying session data on the server
header("Location: ../html/index.html");//redirects user to home page
exit();
?>