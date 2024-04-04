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
                break;
        }
        break;

    default:
        # code...
        break;
}

?>
<?php include __DIR__ . '/includes/footer.php'; ?>
