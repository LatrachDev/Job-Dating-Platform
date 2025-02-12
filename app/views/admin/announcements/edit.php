<!DOCTYPE html>
<html>
<head>
    <title>Modifier une Annonce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation bar -->
    <?php include __DIR__ . '/../components/navbar.php'; ?>
    
    <!-- Sidebar -->
    <?php include __DIR__ . '/../components/sidebar.php'; ?>

    <div class="ml-64 mt-16 p-6">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Modifier une Annonce</h1>
                    <p class="mt-1 text-sm text-gray-600">Modifiez les informations de l'annonce</p>
                </div>
                <a href="/admin/announcements" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Retour
                </a>
            </div>

            <?php if(isset($_SESSION['error'])): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline"><?= $_SESSION['error'] ?></span>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <div class="bg-white shadow rounded-lg">
                <form action="/admin/announcements/update/<?= $announcement->id ?>" method="POST" class="space-y-6 p-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre de l'annonce</label>
                        <input type="text" name="title" id="title" required
                               value="<?= htmlspecialchars($announcement->title) ?>"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="company_id" class="block text-sm font-medium text-gray-700">Entreprise</label>
                        <select name="company_id" id="company_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Sélectionnez une entreprise</option>
                            <?php foreach($companies as $company): ?>
                                <option value="<?= $company->id ?>" <?= $company->id == $announcement->company_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($company->name) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" required
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"><?= htmlspecialchars($announcement->description) ?></textarea>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="window.location.href='/admin/announcements'"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Annuler
                        </button>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-save mr-2"></i>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 