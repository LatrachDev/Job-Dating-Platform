<!DOCTYPE html>
<html>
<head>
    <title>Job Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="fixed top-0 left-0 right-0 bg-white shadow-md z-50">
        <div class="max-w-full px-6 mx-auto">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <span class="text-2xl font-bold text-blue-600">JobDating</span>
                </div>
                <div class="flex items-center gap-4">
                    <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" onclick="location.href='/logout'">
                        <i class="fas fa-sign-out-alt mr-2"></i>Déconnexion
                    </button>
                </div>
            </div>
        </div>
    </nav> 

    <div class="container mx-auto mt-20 p-4">
        <div class="bg-white rounded-lg shadow-2xl p-6 animate-fade-in">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Available Job Positions</h2>

            <?php if(empty($announcements)): ?>
                <p class="text-gray-500 text-lg">No job announcements available at the moment.</p>
            <?php else: ?>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <?php foreach($announcements as $announcement): ?>
        <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden flex flex-col h-full">
            <!-- Thumbnail Image Section -->
            <div class="w-full h-48 relative">
                <?php if (!empty($announcement->thumbnail)): ?>
                    <img src="<?= htmlspecialchars($announcement->thumbnail) ?>" 
                         alt="<?= htmlspecialchars($announcement->title) ?>" 
                         class="w-full h-full object-cover">
                <?php else: ?>
                    <img src="https://ui-avatars.com/api/?name=<?= urlencode($announcement->company->name) ?>&background=random&size=256" 
                         alt="<?= htmlspecialchars($announcement->company->name) ?>" 
                         class="w-full h-full object-cover">
                <?php endif; ?>
            </div>

            <!-- Content Section -->
            <div class="p-6 flex-1 flex flex-col">
                <div class="mb-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        <?= htmlspecialchars($announcement->title) ?>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4">
                        <?= htmlspecialchars($announcement->company->name) ?>
                    </p>
                </div>

                <!-- Description -->
                <p class="text-gray-700 text-sm mb-4 line-clamp-3 flex-1">
                    <?= htmlspecialchars($announcement->description) ?>
                </p>

                <!-- Posted Date -->
                <div class="text-xs text-gray-500">
                    Posted: <?= date('M d, Y', strtotime($announcement->created_at)) ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>