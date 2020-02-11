<?php
// Connect database
$conn = mysqli_connect('localhost', 'root', 'Vothanhvan522') or die(mysqli_error());

/* search is the name of database we've created */
mysqli_select_db($conn, 'search');
