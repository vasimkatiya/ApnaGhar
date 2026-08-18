<?php

require 'db.php';

mysqli_query($conn,"DELETE FROM inquiries WHERE id = " . $_GET['id']);

header('Location:myInquiries.php');
exit();

?>