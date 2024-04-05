<?php include __DIR__ . '/includes/header.php'; ?>
<?php include __DIR__ . '/user/headerUser.php'; ?>
<?php
var_dump($allresa);
switch ($section) {
    case 'monprofil':
        switch ($action) {
            case 'edit':
                include_once __DIR__ . '/user/inscriptionUser.php';

                break;

            default:
                break;
        }
        break;
    case "reservation":
        switch ($action) {
            case 'new':
                include_once __DIR__ . "/reservation/formulaireReservation.php";
                break;

            default:
                # code...
                break;
        }
    default:
        include_once __DIR__ . '/reservation/FormReservationTicket.php';
        break;
}

?>
<?php include __DIR__ . '/includes/footer.php'; ?>
