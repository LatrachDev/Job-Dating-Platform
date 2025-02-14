<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Session;
use App\Core\Security;
use App\Models\Announcement;
use App\Models\Company;

class AnnouncementController extends Controller
{
    protected Auth $auth;
    protected Session $session;
    protected Security $security;

    public function __construct()
    {
        $this->session = new Session();
        $this->security = new Security();
        $this->auth = new Auth($this->session, $this->security);
    }

    public function index()
    {
        // Get all active announcements with their related companies, excluding soft deleted ones
        $announcements = Announcement::with('company')->whereNull('deleted_at')->get();
        return $this->view('user/index', ['announcements' => $announcements]);
    }

    public function show($id)
    {
        $announcement = Announcement::with('company')->find($id);
        if (!$announcement) {
            $this->session->set('error', 'Announcement not found');
            header('Location: /user/announcements');
            exit();
        }
        return $this->view('user/show', ['announcement' => $announcement]);
    }

    public function AdminAnnouncementsShow()
    {
        // Only admin or company users can create announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /logout');
            exit();
        }

        // Get all announcements with their related companies, excluding soft deleted ones
        $announcements = Announcement::with('company')->whereNull('deleted_at')->get();
        return $this->view('admin/announcements/index', ['announcements' => $announcements]);
    }

    public function create()
    {
        // Only admin or company users can create announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /logout');
            exit();
        }

        // Get all companies for the dropdown
        $companies = Company::all();
        
        return $this->render('admin/announcements/create.twig', [
            'companies' => $companies,
            'session' => [
                'error' => $this->session->get('error')
            ]
        ]);
    }

    public function store()
    {
        // Only admin or company users can create announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /logout');
            exit();
        }

        // Validate input
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $company_id = $_POST['company_id'] ?? null;
        $thumbnail = $_POST['thumbnail'] ?? null;

        if (empty($title) || empty($description) || empty($company_id)) {
            $this->session->set('error', 'All Fields are required');
            header('Location: /admin/announcements/create');
            exit();
        }

        // Create new announcement
        $announcement = new Announcement();
        $announcement->title = $title;
        $announcement->description = $description;
        $announcement->company_id = $company_id;
        $announcement->thumbnail = $thumbnail;
        $announcement->save();

        $this->session->set('success', 'Annonce créée avec succès');
        header('Location: /admin/announcements');
        exit();
    }

    public function edit($id)
    {
        // Only admin or company users can edit announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if (!$announcement) {
            $this->session->set('error', 'Announcement not found');
            header('Location: /admin/announcements');
            exit();
        }

        $companies = Company::all();
        return $this->render('admin/announcements/edit.twig', [
            'announcement' => $announcement,
            'companies' => $companies,
            'session' => [
                'error' => $this->session->get('error')
            ]
        ]);
    }

    public function update($id)
    {
        // Only admin or company users can update announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /admin/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if (!$announcement) {
            $this->session->set('error', 'Announcement not found');
            header('Location: /admin/announcements');
            exit();
        }

        // Validate input
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $company_id = $_POST['company_id'] ?? null;
        $thumbnail = $_POST['thumbnail'] ?? null;

        if (empty($title) || empty($description) || empty($company_id || empty($thumbnail))) {
            $this->session->set('error', 'All fields are required');
            header("Location: /announcements/edit/$id");
            exit();
        }

        // Update announcement
        $announcement->title = $title;
        $announcement->description = $description;
        $announcement->company_id = $company_id;
        $announcement->thumbnail = $thumbnail;
        $announcement->save();

        $this->session->set('success', 'Announcement updated successfully');
        header('Location: /admin/announcements');
        exit();
    }

    public function delete($id)
    {
        // Only admin or company users can delete announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            if ($this->isAjaxRequest()) {
                http_response_code(403);
                echo json_encode(['success' => false, 'message' => 'Unauthorized access']);
                exit();
            }
            $this->session->set('error', 'Unauthorized access');
            header('Location: /admin/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if ($announcement) {
            try {
                // The delete() method will now perform a soft delete
                $announcement->delete();
                
                if ($this->isAjaxRequest()) {
                    echo json_encode([
                        'success' => true,
                        'message' => 'Annonce supprimée avec succès'
                    ]);
                    exit();
                }
                
                $this->session->set('success', 'Announcement deleted successfully');
            } catch (\Exception $e) {
                if ($this->isAjaxRequest()) {
                    http_response_code(500);
                    echo json_encode([
                        'success' => false,
                        'message' => 'Erreur lors de la suppression'
                    ]);
                    exit();
                }
                $this->session->set('error', 'Error deleting announcement');
            }
        } else {
            if ($this->isAjaxRequest()) {
                http_response_code(404);
                echo json_encode([
                    'success' => false,
                    'message' => 'Annonce non trouvée'
                ]);
                exit();
            }
            $this->session->set('error', 'Announcement not found');
        }

        if (!$this->isAjaxRequest()) {
            header('Location: /admin/announcements');
            exit();
        }
    }

    // Add these new methods for managing trashed announcements
    public function trashed()
    {
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /admin/announcements');
            exit();
        }

        $trashedAnnouncements = Announcement::onlyTrashed()->with('company')->get();
        return $this->view('admin/announcements/trashed', ['announcements' => $trashedAnnouncements]);
    }

    public function restore($id)
    {
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /admin/announcements');
            exit();
        }

        $announcement = Announcement::withTrashed()->find($id);
        if ($announcement) {
            $announcement->restore();
            $this->session->set('success', 'Announcement restored successfully');
        } else {
            $this->session->set('error', 'Announcement not found');
        }

        header('Location: /admin/announcements/trashed');
        exit();
    }

    public function forceDelete($id)
    {
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin'])) {
            $this->session->set('error', 'Unauthorized access');
            header('Location: /admin/announcements');
            exit();
        }

        $announcement = Announcement::withTrashed()->find($id);
        if ($announcement) {
            $announcement->forceDelete();
            $this->session->set('success', 'Announcement permanently deleted');
        } else {
            $this->session->set('error', 'Announcement not found');
        }

        header('Location: /admin/announcements/trashed');
        exit();
    }

    // Ajouter cette méthode helper dans le contrôleur
    private function isAjaxRequest(): bool
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && 
               strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}