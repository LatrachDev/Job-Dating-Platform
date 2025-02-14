<!-- Sidebar -->
<aside class="fixed left-0 top-16 h-full w-64 bg-gray-800 text-white">
    <div class="p-4">
        <nav class="space-y-2">
            <a href="/admin/dashboard" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 <?= $currentPage === 'dashboard' ? 'bg-blue-600' : '' ?>">
                <i class="fas fa-tachometer-alt"></i>
                <span>Tableau de bord</span>
            </a>
            <a href="/admin/companies" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 <?= $currentPage === 'companies' ? 'bg-blue-600' : '' ?>">
                <i class="fas fa-building"></i>
                <span>Entreprises</span>
            </a>
            <a href="/admin/announcements" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 <?= $currentPage === 'announcements' ? 'bg-blue-600' : '' ?>">
                <i class="fas fa-bullhorn"></i>
                <span>Annonces</span>
            </a>
            <a href="/admin/users" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700 <?= $currentPage === 'users' ? 'bg-blue-600' : '' ?>">
                <i class="fas fa-users"></i>
                <span>Utilisateurs</span>
            </a>
        </nav>
    </div>
</aside> 