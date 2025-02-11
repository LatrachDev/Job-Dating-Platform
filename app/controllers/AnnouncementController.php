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
        // Get all announcements with their related companies
        $announcements = Announcement::with('company')->get();
        return $this->view('user/index', ['announcements' => $announcements]);
    }

    public function show($id)
    {
        $announcement = Announcement::with('company')->find($id);
        if (!$announcement) {
            $this->session->setFlash('error', 'Announcement not found');
            header('Location: /user/announcements');
            exit();
        }
        return $this->view('announcements/show', ['announcement' => $announcement]);
    }

    public function create()
    {
        // Only admin or company users can create announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->setFlash('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        $companies = Company::all();
        return $this->view('announcements/create', ['companies' => $companies]);
    }

    public function store()
    {
        // Only admin or company users can create announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->setFlash('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        // Validate input
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $company_id = $_POST['company_id'] ?? null;

        if (empty($title) || empty($description) || empty($company_id)) {
            $this->session->setFlash('error', 'All fields are required');
            header('Location: /announcements/create');
            exit();
        }

        // Create new announcement
        $announcement = new Announcement();
        $announcement->title = $title;
        $announcement->description = $description;
        $announcement->company_id = $company_id;
        $announcement->save();

        $this->session->setFlash('success', 'Announcement created successfully');
        header('Location: /user/announcements');
        exit();
    }

    public function edit($id)
    {
        // Only admin or company users can edit announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->setFlash('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if (!$announcement) {
            $this->session->setFlash('error', 'Announcement not found');
            header('Location: /user/announcements');
            exit();
        }

        $companies = Company::all();
        return $this->view('announcements/edit', [
            'announcement' => $announcement,
            'companies' => $companies
        ]);
    }

    public function update($id)
    {
        // Only admin or company users can update announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->setFlash('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if (!$announcement) {
            $this->session->setFlash('error', 'Announcement not found');
            header('Location: /user/announcements');
            exit();
        }

        // Validate input
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $company_id = $_POST['company_id'] ?? null;

        if (empty($title) || empty($description) || empty($company_id)) {
            $this->session->setFlash('error', 'All fields are required');
            header("Location: /announcements/edit/$id");
            exit();
        }

        // Update announcement
        $announcement->title = $title;
        $announcement->description = $description;
        $announcement->company_id = $company_id;
        $announcement->save();

        $this->session->setFlash('success', 'Announcement updated successfully');
        header('Location: /user/announcements');
        exit();
    }

    public function delete($id)
    {
        // Only admin or company users can delete announcements
        if (!$this->auth->check() || !in_array($this->auth->user()->role, ['admin', 'company'])) {
            $this->session->setFlash('error', 'Unauthorized access');
            header('Location: /user/announcements');
            exit();
        }

        $announcement = Announcement::find($id);
        if ($announcement) {
            $announcement->delete();
            $this->session->setFlash('success', 'Announcement deleted successfully');
        } else {
            $this->session->setFlash('error', 'Announcement not found');
        }

        header('Location: /user/announcements');
        exit();
    }
}