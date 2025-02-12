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
            
            if (!$this->auth->check() || $this->auth->user()->role !== 'admin') 
            {
                header('Location: /login');
                exit;
            }
        }

        public function index() 
        {
            $companies = Company::all(); 

            // echo '<pre>';
            // var_dump($companies);
            // echo '</pre>';
            // die();
            
            return $this->view('admin/companies/companies', ['companies' => $companies]);
        }
        
        public function create()
        {
            return $this->view('admin/companies/create');
        }

        public function store()
        {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $contact_info = $_POST['contact_info'] ?? '';
            
            if (empty($name) || empty($description) || empty($contact_info))
            {
                $this->session->set('error', 'Tous les champs sont obligatoires');
                header('Location: /admin/companies/create');
                exit;
            }

            $company = new Company();
            $company->name = $name;
            $company->description = $description;
            $company->contact_info = $contact_info;

            $company->save();

            $this->session->set('success', 'Entreprise créée avec succès');
            header('Location: /admin/companies');
            exit;
        }

        public function edit($id)
        {
            $company = Company::find($id);

            if (!$company)
            {
                $this->session->set('error', 'Entreprise non trouvée');
                header('Location: /admin/companies');
                exit;
            }

            return $this->view('admin/companies/edit', [
                'company' => $company
            ]);
        }

        public function update($id)
        {
            $company = Company::find($id);
            if (!$company) {
                $this->session->set('error', 'Entreprise non trouvée');
                header('Location: /admin/companies');
                exit();
            }

            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $contact_info = $_POST['contact_info'] ?? '';

            if (empty($name) || empty($description) || empty($contact_info)) 
            {
                $this->session->set('error', 'Tous les champs sont obligatoires');
                header("Location: /admin/companies/edit/{$id}");
                exit();
            }

            $company->name = $name;
            $company->description = $description;
            $company->contact_info = $contact_info;
            $company->save();

            $this->session->set('success', 'Entreprise mise à jour avec succès');
            header('Location: /admin/companies');
            exit();
        }

        public function delete($id)
        {
            $company = Company::find($id);
            if ($company) 
            {
                $company->delete();
                $this->session->set('success', 'Entreprise supprimée avec succès');
            } 
            else 
            {
                $this->session->set('error', 'Entreprise non trouvée');
            }

            header('Location: /admin/companies');
            exit();
        }
    }