<?php 
$currentPage = 'add_company';
include_once __DIR__ . '/../components/header.php';
include_once __DIR__ . '/../components/navbar.php';
include_once __DIR__ . '/../components/sidebar.php';
?>

<!-- Main Content -->
<main class="ml-64 mt-16 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Ajouter une Nouvelle Entreprise</h1>
        
        <form action="process_add_company.php" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="name" id="name" required
                       class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm border focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="3" required
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            
            <div class="mb-4">
                <label for="sector" class="block text-sm font-medium text-gray-700">Secteur</label>
                <input type="text" name="sector" id="sector" required
                       class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm border focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mb-4">
                <label for="contact_info" class="block text-sm font-medium text-gray-700">Contact</label>
                <input type="text" name="contact_info" id="contact_info" required
                       class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm border focus:border-blue-500 focus:ring-blue-500">
            </div>
            
            <div class="mt-5 flex justify-end gap-3">
                <a href="companies.php" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">
                    Annuler
                </a>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</main>
