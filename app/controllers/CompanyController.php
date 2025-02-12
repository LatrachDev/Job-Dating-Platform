<?php

    namespace App\Controllers;

    use App\Core\Controller;
    use App\Core\Auth;
    use App\Core\Session;
    use App\Core\Security;
    use App\Models\Company;

    class CompanyController extends Controller
    {
        protected Auth $auth;
        protected Security $security;
        protected Session $session;

        public function __construct()
        {
            parent::__construct();
            $this->session = new Session();
            $this->security = new Security();
            $this->auth = new Auth($this->session, $this->security);
            
            if (!$this->auth->check() || !$this->auth->user()->role !== 'admin') 
            {
                header('Location: /login');
                exit;
            }
            
        }

        public function index()
        {
            $companies = Company::all();
            return $this->view('admin/companies/companies', [
                'companies' => $companies
            ]);
        }
        
        public function create()
        {
            return $this->view('admin/companies/add_company.php');
        }
    }