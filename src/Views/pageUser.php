<?php
session_start();

use src\Models\Database;
use src\Models\User;
use src\Repository\UserRepository;
use src\Repository\ReservationRepository;

include __DIR__ . '/includes/header.php';
$User = new User();
?>
<?php include __DIR__ . '/includes/headerUser.php'; ?>


<?php include __DIR__ . '/includes/footer.php'; ?>