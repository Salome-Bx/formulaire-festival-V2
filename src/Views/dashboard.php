<?php include __DIR__ . '/includes/header.php'; ?>
<?php include __DIR__ . '/user/headerUser.php'; ?>
<?php
switch ($section) {
    case 'monprofil':
        switch ($action) {
            case 'edit':
                include_once __DIR__ . '/user/inscriptionUser.php';
                break;

            default:
                # code...
                break;
        }
        break;

    default:
        include_once __DIR__ . '/reservation/FormReservationTicket.php';
        break;
}

?>
<?php include __DIR__ . '/includes/footer.php'; ?>
