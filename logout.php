<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION["fullname"]);
unset($_SESSION["degree"]);
unset($_SESSION["skills"]);
unset($_SESSION["phone"]);
unset($_SESSION["email"]);
unset($_SESSION["n"]);
header('Location: index.html');
?>