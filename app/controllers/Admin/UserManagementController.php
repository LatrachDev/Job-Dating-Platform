<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\User;

class UserManagementController extends Controller
{
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

        return $this->render('admin/UserManagement.twig', $data);
    }

    public function delete($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                return json_encode(['success' => true]);
            }

            // Redirection avec message de succès
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } catch (\Exception $e) {
            if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
                return json_encode(['success' => false, 'message' => $e->getMessage()]);
            }

            // Redirection avec message d'erreur
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
} 