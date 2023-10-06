<?php

if (isset($_SESSION["adm"]) && $_SESSION['adm'] == '0') {
    header("Location: ../index.php");
    exit();
}

require('../models/cadastrofilme.model.php');
require('../views/cadastrofilme.view.php');
