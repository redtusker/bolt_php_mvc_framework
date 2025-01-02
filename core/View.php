<?php

namespace Core;

class View
{
    public static function render($view, $data = [])
    {
        extract($data);
        $viewFile = __DIR__ . '/../src/Views/' . $view . '.php';
        if (file_exists($viewFile)) {
            include __DIR__ . '/../src/Views/layout.php';
        } else {
            echo "View file not found: " . $viewFile;
        }
    }
}
