<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Core\Auth;
use App\Core\Session;
use App\Core\Security;
use DateTime;

class AdminController extends Controller
{
    protected Auth $auth;
    protected Session $session;
    protected Security $security;

    public function __construct()
    {
        parent::__construct();
        $this->session = new Session();
        $this->security = new Security();
        $this->auth = new Auth($this->session, $this->security);
        
        // Check if user is admin
        if (!$this->auth->check() || $this->auth->user()->role !== 'admin') {
            header('Location: /login');
            exit();
        }
    }

    public function dashboard()
    {
        $data = [
            'currentPage' => 'dashboard',
            'admin' => [
                'name' => 'Admin Name'
            ],
            'stats' => [
                [
                    'title' => 'Total Entreprises',
                    'value' => 12,
                    'icon' => 'fa-building',
                    'color' => 'text-blue-500'
                ],
                [
                    'title' => 'Annonces Actives',
                    'value' => 25,
                    'icon' => 'fa-bullhorn',
                    'color' => 'text-green-500'
                ],
                [
                    'title' => 'Total Utilisateurs',
                    'value' => 150,
                    'icon' => 'fa-users',
                    'color' => 'text-purple-500'
                ]
            ],
            'activities' => [
                [
                    'date' => new DateTime(),
                    'action' => 'Nouvelle entreprise ajoutée',
                    'details' => 'Microsoft Maroc',
                    'status' => [
                        'label' => 'Complété',
                        'color' => 'green'
                    ]
                ]
                // Ajoutez d'autres activités ici
            ]
        ];

        return $this->render('admin/dashboard.twig', $data);
    }

    public function companies()
    {
        return $this->view('admin/companies');
    }

    public function articles()
    {
        $articles = Article::all();
        return $this->view('admin/articles', [
            'articles' => $articles,
            'user' => $this->auth->user()
        ]);
    }

    public function deleteArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /admin/articles');
            exit();
        }

        $articleId = $_POST['article_id'] ?? null;

        if (!$articleId) {
            $_SESSION['error'] = 'Article ID is required';
            header('Location: /admin/articles');
            exit();
        }

        try {
            Article::deleteArticle($articleId);
            $_SESSION['success'] = 'Article deleted successfully';
        } catch (\Exception $e) {
            $_SESSION['error'] = 'Error deleting article';
        }

        header('Location: /admin/articles');
        exit();
    }
} 