<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <!-- Your content -->

        <?php
        switch ($section) {
            case 'reservation':
                switch ($action) {
                    case 'new':
                        include_once __DIR__ . '/reservation/formulaireReservation.php';
                        break;
                    case 'edits':

                        break;
                    case 'delete':

                        break;

                    default:
                        // quand il n'y a pas d'action, retourne toute les résa

                        break;
                }
                break;
            default:

                break;
        }

        ?>


    </div>
</main>