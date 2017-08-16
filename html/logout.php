<?php
session_start();

session_unset('connecte');
session_destroy();

header('Location: login.html');
