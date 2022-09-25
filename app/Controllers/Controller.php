<?php

namespace App\Controllers;

use Database\Database;
abstract class Controller{ //abstract parce qu'elle ne sera jamais instancier

    protected $conn;

    public function __construct(Database $conn)
    {
        $this->conn = $conn;
    }

    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';
        $content = ob_get_clean();
        require VIEWS . 'layout.php';
    }

    protected function getConnection()
    {
        return $this->conn;
    }
}

?>