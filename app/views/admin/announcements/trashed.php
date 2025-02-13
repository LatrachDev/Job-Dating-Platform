<!DOCTYPE html>
<html>
<head>
    <title>Annonces Supprimées</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Navigation bar -->
    <?php include __DIR__ . '/../components/navbar.php'; ?>
    
    <!-- Sidebar -->
    <?php include __DIR__ . '/../components/sidebar.php'; ?>

    <div class="ml-64 mt-16 p-6">
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

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Annonces Supprimées</h1>
                <p class="mt-1 text-sm text-gray-600">Liste des annonces dans la corbeille</p>
            </div>
            <a href="/admin/announcements" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-600 hover:bg-gray-700">
                <i class="fas fa-arrow-left mr-2"></i>
                Retour
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Titre
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Entreprise
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date de suppression
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(empty($announcements)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Aucune annonce dans la corbeille
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($announcements as $announcement): ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?= htmlspecialchars($announcement->title) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?= htmlspecialchars($announcement->company->name) ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?= $announcement->deleted_at ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <form action="/admin/announcements/<?= $announcement->id ?>/restore" method="POST" class="inline-block">
                                            <button type="submit" class="text-green-600 hover:text-green-900">
                                                <i class="fas fa-undo"></i> Restaurer
                                            </button>
                                        </form>
                                        <form action="/admin/announcements/<?= $announcement->id ?>/force-delete" 
                                              method="POST" 
                                              class="inline-block"
                                              onsubmit="return confirm('Cette action est irréversible. Êtes-vous sûr?');">
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash"></i> Supprimer définitivement
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> 