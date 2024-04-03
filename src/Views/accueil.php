<?php include __DIR__ . '/includes/header.php'; ?>
<?php include __DIR__ . '/includes/navigation.php'; ?>
<?php
switch ($section) {

    case 'menu':
        switch ($action) {
            case 'connexion':
                include_once __DIR__ . '/user/connexion.php';
                break;
            case 'inscription':
                include_once __DIR__ . '/user/inscriptionUser.php';
                break;
            default:
                break;
        }
        break;

    default:
        break;
}
?>

<?php include __DIR__ . '/includes/footer.php'; ?>
