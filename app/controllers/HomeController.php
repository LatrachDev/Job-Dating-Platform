<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Session;
use App\Core\Security;
use App\Models\Article;
use Config\Twig;

class HomeController extends Controller
{
    protected Auth $auth;
    protected Session $session;
    protected Security $security;
    protected $twig;

    public function __construct()
    {
        $this->session = new Session();
        $this->security = new Security();
        $this->auth = new Auth($this->session, $this->security);
        $this->twig = Twig::getInstance();
    }

    public function index()
    {
        return $this->twig->render('layout.twig', [
            'title' => 'Welcome to Job Dating Platform'
        ]);
    }

    public function getArticles()
    {
        $articles = Article::findAll();
        return $this->view('home/articles', ['articles' => $articles]);
    }
}
