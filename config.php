<?php
    // lors de la mise en open source, remplacer les infos concernant la base de données.
    
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'todolist');
    define('DB_USER', 'matodolist');
    define('DB_PWD', 'matodolist');
    define('PREFIXE', 'tdl_');
    
    // Ne pas toucher :
    
    define('DB_INITIALIZED', TRUE);