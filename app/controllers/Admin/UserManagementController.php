<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Session;
use App\Models\User;

class UserManagementController extends Controller
{
    protected $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    public function index()
    {
        // Récupérer la page courante depuis l'URL
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = 10;

        // Récupérer les utilisateurs avec pagination
        $users = User::query()
            ->orderBy('created_at', 'desc')
            ->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get();

        $total = User::count();

        $data = [
            'currentPage' => 'users',
            'users' => $users,
            'pagination' => [
                'current' => $page,
                'perPage' => $perPage,
                'total' => $total,
                'start' => ($page - 1) * $perPage + 1,
                'end' => min($page * $perPage, $total),
                'prev' => $page > 1,
                'next' => ($page * $perPage) < $total
            ]
        ];

        return $this->view('admin/users/index', $data);
    }

    public function edit($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            $this->session->set('error', 'Utilisateur non trouvé');
            header('Location: /admin/users');
            exit();
        }

        return $this->view('admin/users/edit', ['user' => $user]);
    }

    public function update($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            $this->session->set('error', 'Utilisateur non trouvé');
            header('Location: /admin/users');
            exit();
        }

        // Validate input
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email)) {
            $this->session->set('error', 'Le nom et l\'email sont obligatoires');
            header("Location: /admin/users/edit/$id");
            exit();
        }

        // Update user
        $user->name = $name;
        $user->email = $email;
        
        // Only update password if provided
        if (!empty($password)) {
            $user->password = $password;
        }

        try {
            $user->save();
            $this->session->set('success', 'Utilisateur mis à jour avec succès');
        } catch (\Exception $e) {
            $this->session->set('error', 'Erreur lors de la mise à jour');
        }

        header('Location: /admin/users');
        exit();
    }

    public function delete($id)
    {
        $user = User::find($id);
        
        if ($user) {
            try {
                $user->delete();
                $this->session->set('success', 'Utilisateur supprimé avec succès');
            } catch (\Exception $e) {
                $this->session->set('error', 'Erreur lors de la suppression');
            }
        } else {
            $this->session->set('error', 'Utilisateur non trouvé');
        }

        header('Location: /admin/users');
        exit();
    }
} 