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
    <div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Available Job Positions</h2>
    
    <?php if(empty($announcements)): ?>
        <p class="text-gray-500 text-lg">No job announcements available at the moment.</p>
    <?php else: ?>
        <div class="grid gap-8">
            <?php foreach($announcements as $announcement): ?>
                <div class="border border-gray-200 p-6 rounded-lg hover:shadow-xl transition-shadow duration-300 ease-in-out">
                    <div class="flex flex-col md:flex-row gap-6">
                        <!-- Thumbnail Image from CDN -->
                        <?php if (!empty($announcement->thumbnail)): ?>
                            <div class="w-full md:w-1/4">
                                <img src="<?= htmlspecialchars($announcement->thumbnail) ?>" 
                                     alt="<?= htmlspecialchars($announcement->title) ?>" 
                                     class="w-full h-40 object-cover rounded-lg">
                            </div>
                        <?php endif; ?>

                        <div class="flex-1">
                            <!-- Job Title and Company -->
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="text-2xl font-bold text-blue-600 hover:text-blue-700 transition-colors">
                                        <?= htmlspecialchars($announcement->title) ?>
                                    </h3>
                                    <p class="text-gray-600 mt-2 font-medium">
                                        <?= htmlspecialchars($announcement->company->name) ?>
                                    </p>
                                </div>
                                <a href="/announcements/<?= $announcement->id ?>" 
                                   class="bg-blue-500 text-white px-5 py-2 rounded-md hover:bg-blue-600 transition-colors whitespace-nowrap">
                                    View Details
                                </a>
                            </div>

                            <!-- Job Description Excerpt -->
                            <p class="text-gray-700 mt-4 leading-relaxed">
                                <?= nl2br(htmlspecialchars(substr($announcement->description, 0, 200))) ?>...
                            </p>

                            <!-- Posted Date -->
                            <div class="mt-4 text-sm text-gray-500">
                                Posted: <?= date('F j, Y', strtotime($announcement->created_at)) ?>
                            </div>
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