<?php 
    $currentPage = 'companies';
    include_once __DIR__ . '/../components/header.php';
    include_once __DIR__ . '/../components/navbar.php';
    include_once __DIR__ . '/../components/sidebar.php';
?>

<main class="ml-64 mt-16 p-6">
    <div class="container mx-auto">
        <div class="max-w-2xl mx-auto">
            <header class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Modifier l'entreprise</h1>
            </header>

            <!-- Error Messages -->
            <?php if(isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?= $_SESSION['error'] ?></span>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="bg-white rounded-lg shadow">
                <form action="/admin/companies/update/<?= $company->id ?>" method="POST" class="space-y-6 p-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom de l'entreprise</label>
                        <input type="text" name="name" id="name" required value="<?= htmlspecialchars($company->name) ?>"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?= htmlspecialchars($company->description) ?></textarea>
                    </div>

                    <div>
                        <label for="contact_info" class="block text-sm font-medium text-gray-700">Informations de contact</label>
                        <textarea name="contact_info" id="contact_info" rows="3" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?= htmlspecialchars($company->contact_info) ?></textarea>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="/admin/companies" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                            Annuler
                        </a>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>