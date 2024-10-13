<?php
require_once "../controllers/logout.php";

killSession();

header("Location: /");
exit();
