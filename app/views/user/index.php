<!DOCTYPE html>
<html>
<head>
    <title>Job Announcements</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Job Announcements</h1>
            <div class="space-x-4">
                <a href="/logout" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-2xl font-bold mb-4">Available Job Positions</h2>
            
            <?php if(empty($announcements)): ?>
                <p class="text-gray-500">No job announcements available at the moment.</p>
            <?php else: ?>
                <div class="grid gap-6">
                    <?php foreach($announcements as $announcement): ?>
                        <div class="border p-6 rounded-lg hover:shadow-lg transition-shadow">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-xl font-bold text-blue-600"><?= htmlspecialchars($announcement->title) ?></h3>
                                    <p class="text-gray-600 mt-1"><?= htmlspecialchars($announcement->company->name) ?></p>
                                </div>
                                <a href="/announcements/<?= $announcement->id ?>" 
                                   class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition-colors">
                                    View Details
                                </a>
                            </div>
                            <p class="text-gray-700 mt-4"><?= nl2br(htmlspecialchars(substr($announcement->description, 0, 200))) ?>...</p>
                            <div class="mt-4 text-sm text-gray-500">
                                Posted: <?= date('F j, Y', strtotime($announcement->created_at)) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>