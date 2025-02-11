<?php 
$currentPage = 'dashboard';
include_once 'components/header.php';
include_once 'components/navbar.php';
include_once 'components/sidebar.php';
?>

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

<?php include_once 'components/footer.php'; ?>
