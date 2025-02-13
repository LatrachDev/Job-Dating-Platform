<?php 
$currentPage = 'companies';
include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../components/navbar.php';
include_once __DIR__ . '/../components/sidebar.php';
?>

<main class="ml-64 mt-16 p-6">
    <div class="container mx-auto">
        <!-- Page Header -->
        <header class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Gestion des Entreprises</h1>
            <a href="/admin/companies/create" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus-circle mr-2"></i>
                Nouvelle Entreprise
            </a>
        </header>

        <?php if(isset($_SESSION['success'])): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?= $_SESSION['success'] ?></span>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if(isset($_SESSION['error'])): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <span class="block sm:inline"><?= $_SESSION['error'] ?></span>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <!-- Companies Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">


            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($companies)): ?>
                    <?php foreach($companies as $company): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><?= htmlspecialchars($company->name) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars(substr($company->description, 0, 100)) ?>...</td>
                            <td class="px-6 py-4"><?= htmlspecialchars($company->contact_info) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="/admin/companies/edit/<?= $company->id ?>" class="text-blue-600 hover:text-blue-900 mr-4">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <form action="/admin/companies/delete/<?= $company->id ?>" method="POST" class="inline">
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?')">
                                        <i class="fas fa-trash"></i> Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Aucune entreprise trouvée.</td>
                    </tr>
                <?php endif; ?>


                
                </tbody>

            </table>
        </div>
    </div>
</main>