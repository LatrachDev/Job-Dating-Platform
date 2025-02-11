<?php

namespace App\Core;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Controller
{
    protected $twig;

    public function __construct()
    {
        $this->initTwig();
    }

    private function initTwig()
    {
        try {
            // Chemin absolu vers le dossier des vues
            $viewsPath = dirname(__DIR__) . '/views';
            
            // Vérifier si le dossier existe
            if (!is_dir($viewsPath)) {
                throw new \Exception("Le dossier des vues n'existe pas: " . $viewsPath);
            }

            $loader = new FilesystemLoader($viewsPath);
            $this->twig = new Environment($loader, [
                'cache' => false,
                'debug' => true,
                'auto_reload' => true
            ]);

            // Ajouter l'extension personnalisée
            $this->twig->addExtension(new TwigExtensions());

        } catch (\Exception $e) {
            die('Erreur d\'initialisation de Twig: ' . $e->getMessage());
        }
    }

    protected function render($view, $data = [])
    {
        if (!$this->twig) {
            $this->initTwig();
        }

        try {
            echo $this->twig->render($view, $data);
        } catch (\Exception $e) {
            die('Erreur de rendu du template: ' . $e->getMessage());
        }
    }

    protected function view($view, $data = [])
    {
        extract($data);
        
        $view = str_replace('.', '/', $view);
        $viewPath = "../app/views/{$view}.php";
        
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            throw new \Exception("View {$view} not found");
        }
    }

    protected function redirectWithError($path, $message)
    {
        $_SESSION['errors'] = [$message];
        header("Location: {$path}");
        exit();
    }

    protected function redirectWithSuccess($path, $message)
    {
        $_SESSION['success'] = $message;
        header("Location: {$path}");
        exit();
    }
}
