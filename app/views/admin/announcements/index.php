<!DOCTYPE html>
<html>
<head>
    <title>Gestion des Annonces</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Ajouter jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation bar -->
    <?php include __DIR__ . '/../components/navbar.php'; ?>
    
    <!-- Sidebar -->
    <?php include __DIR__ . '/../components/sidebar.php'; ?>

    <div class="ml-64 mt-16 p-6"> 

        <!--error and success messages-->
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
                <h1 class="text-2xl font-semibold text-gray-900">Gestion des Annonces</h1>
                <p class="mt-1 text-sm text-gray-600">Liste de toutes les annonces disponibles</p>
            </div>
            <a href="/admin/announcements/create" 
               class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <i class="fas fa-plus -ml-1 mr-2 h-5 w-5"></i>
                Nouvelle Annonce
            </a>
        </div>

        <!-- Search and Filter Section -->
        <div class="mb-6">
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 pr-12 sm:text-sm border-gray-300 rounded-md" 
                       placeholder="Rechercher une annonce...">
            </div>
        </div>

        <!-- Announcements Table -->
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nom
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Secteur
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Contact
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php if(empty($announcements)): ?>
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Aucune annonce trouvée
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($announcements as $announcement): ?>
                            <tr data-id="<?= $announcement->id ?>" class="hover:bg-gray-50">
                                <?php if($announcement->thumbnail): ?>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="<?= $announcement->thumbnail ?>"
                                                     alt="">
                                            </div>
                                        </div>
                                    </td>
                                <?php else: ?>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full"
                                                     src="https://ui-avatars.com/api/?name=<?= $announcement->company->name ?>"
                                                     alt="">
                                            </div>
                                        </div>
                                    </td>
                                <?php endif; ?>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                <?= htmlspecialchars($announcement->title) ?>
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <?= htmlspecialchars($announcement->company->name) ?>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <?= htmlspecialchars($announcement->company->name) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <?= htmlspecialchars(substr($announcement->description, 0, 50)) ?>...
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-3">
                                        <a href="/announcements/<?= $announcement->id ?>" 
                                           class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="/admin/announcements/edit/<?= $announcement->id ?>" 
                                           class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button onclick="deleteAnnouncement(<?= $announcement->id ?>)" 
                                                class="text-red-600 hover:text-red-900 delete-btn">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Add any JavaScript functionality here
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.querySelector('input[type="text"]');
            searchInput.addEventListener('input', function(e) {
                const searchTerm = e.target.value.toLowerCase();
                const rows = document.querySelectorAll('tbody tr');
                
                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        });

        function deleteAnnouncement(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette annonce?')) {
                $.ajax({
                    url: `/admin/announcements/delete/${id}`,
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    success: function(response) {
                        try {
                            // Parse la réponse si elle n'est pas déjà un objet
                            const result = typeof response === 'string' ? JSON.parse(response) : response;
                            
                            // Si la suppression est réussie
                            if (result.success) {
                                // Log pour déboguer
                                console.log('Suppression réussie, ID:', id);
                                console.log('Element à supprimer:', $(`tr[data-id="${id}"]`));
                                
                                // Supprimer la ligne du tableau
                                $(`tr[data-id="${id}"]`).fadeOut(400, function() {
                                    $(this).remove();
                                });
                                
                                // Afficher le message de succès
                                const successAlert = `
                                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 success-alert" role="alert">
                                        <span class="block sm:inline">${result.message}</span>
                                    </div>
                                `;
                                $('.success-alert, .error-alert').remove();
                                $('.ml-64.mt-16.p-6').prepend(successAlert);
                                
                                // Faire disparaître le message après 3 secondes
                                setTimeout(() => {
                                    $('.success-alert').fadeOut();
                                }, 3000);
                            }
                        } catch (e) {
                            console.error('Erreur lors du traitement de la réponse:', e);
                        }
                    },
                    error: function(xhr) {
                        console.error('Erreur Ajax:', xhr);
                        const errorAlert = `
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4 error-alert" role="alert">
                                <span class="block sm:inline">Une erreur est survenue lors de la suppression</span>
                            </div>
                        `;
                        $('.success-alert, .error-alert').remove();
                        $('.ml-64.mt-16.p-6').prepend(errorAlert);
                        
                        setTimeout(() => {
                            $('.error-alert').fadeOut();
                        }, 3000);
                    }
                });
            }
        }
    </script>
</body>
</html>