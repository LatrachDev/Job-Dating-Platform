<?php 
$currentPage = 'companies';
include_once 'components/header.php';
include_once 'components/navbar.php';
include_once 'components/sidebar.php';
?>

<!-- Main Content -->
<main class="ml-64 mt-16 p-6">
    <div class="container mx-auto">
        <!-- Page Header -->
        <header class="mb-6 flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-800">Gestion des Entreprises</h1>
            <a href="add_company.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus-circle mr-2"></i>
                Nouvelle Entreprise
            </a>
        </header>

        <!-- Companies Table -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Secteur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <!-- Sample Row -->
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Microsoft Maroc</div>
                                            <div class="text-sm text-gray-500">info@microsoft.ma</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">Technologie</td>
                                <td class="px-6 py-4 text-sm text-gray-500">+212 600-123456</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded text-sm">Active</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-4">
                                        <a href="#" class="text-blue-500 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <!-- More Rows... -->
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full" src="https://via.placeholder.com/40" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Orange Maroc</div>
                                            <div class="text-sm text-gray-500">contact@orange.ma</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">Télécommunications</td>
                                <td class="px-6 py-4 text-sm text-gray-500">+212 700-789012</td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 bg-red-100 text-red-800 rounded text-sm">Inactive</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-4">
                                        <a href="#" class="text-blue-500 hover:text-blue-600">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="text-red-500 hover:text-red-600">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>