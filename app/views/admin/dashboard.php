<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - Job Dating Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Navbar fixe -->
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="max-w-full px-6 mx-auto">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">JobDating</span>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-gray-700">Admin</span>
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <aside class="fixed left-0 top-16 h-full w-64 bg-gray-800 text-white">
        <div class="p-4">
            <nav class="space-y-2">
                <a href="/admin/dashboard" class="flex items-center space-x-2 p-2 rounded-lg bg-blue-600 hover:bg-blue-700">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Tableau de bord</span>
                </a>
                <a href="/admin/companies" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-building"></i>
                    <span>Entreprises</span>
                </a>
                <a href="/admin/announcements" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-bullhorn"></i>
                    <span>Annonces</span>
                </a>
                <a href="/admin/users" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-700">
                    <i class="fas fa-users"></i>
                    <span>Utilisateurs</span>
                </a>
            </nav>
        </div>
    </aside>

    <!-- Contenu principal -->
    <main class="ml-64 mt-16 p-6">
        <div class="container mx-auto">
            <!-- En-tête de la page -->
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Tableau de bord</h1>
            </header>

            <!-- Cartes statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Entreprises</p>
                            <h3 class="text-3xl font-bold">12</h3>
                        </div>
                        <i class="fas fa-building text-3xl text-blue-500"></i>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Annonces Actives</p>
                            <h3 class="text-3xl font-bold">25</h3>
                        </div>
                        <i class="fas fa-bullhorn text-3xl text-green-500"></i>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Total Utilisateurs</p>
                            <h3 class="text-3xl font-bold">150</h3>
                        </div>
                        <i class="fas fa-users text-3xl text-purple-500"></i>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500">Sessions Job Dating</p>
                            <h3 class="text-3xl font-bold">8</h3>
                        </div>
                        <i class="fas fa-calendar-alt text-3xl text-orange-500"></i>
                    </div>
                </div>
            </div>

            <!-- Dernières activités -->
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-4">Dernières Activités</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Détails</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">2024-03-20</td>
                                    <td class="px-6 py-4">Nouvelle entreprise ajoutée</td>
                                    <td class="px-6 py-4">Microsoft Maroc</td>
                                    <td class="px-6 py-4"><span class="px-2 py-1 bg-green-100 text-green-800 rounded">Complété</span></td>
                                </tr>
                                <!-- Ajoutez plus de lignes selon vos besoins -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
