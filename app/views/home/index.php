<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Dating</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .float { animation: float 4s ease-in-out infinite; }
        .fade-in { animation: fadeIn 2s ease-in-out; }
        .hover-scale { transition: transform 0.3s ease; }
        .hover-scale:hover { transform: scale(1.05); }
        .gradient-bg {
            background: linear-gradient(270deg, #3b82f6, #60a5fa, #93c5fd);
            background-size: 200% 200%;
            animation: gradientBackground 8s ease infinite;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="flex justify-between items-center p-6 bg-white shadow-lg">
        <div class="flex items-center space-x-3">
            <span class="text-2xl font-bold text-blue-900">JobDating</span>
        </div>
        <a href="/login">
    <button class="bg-blue-500 text-white px-6 py-2 rounded-lg hover:bg-blue-600 transition duration-300 hover-scale">
        Login
    </button>
</a>
    </nav>

    <!-- Hero Section -->
    <div class="flex flex-col items-center justify-center h-screen bg-blue-50 fade-in">
        <div class="text-center mb-8">
            <h1 class="text-6xl font-bold text-blue-900 mb-6">Find Your Dream Job or Talent</h1>
            <p class="text-xl text-blue-700 mb-8">Join Job Dating to connect with top companies and candidates effortlessly.</p>
            
            <a href="/register">
                <button class="bg-blue-500 text-white px-8 py-3 rounded-lg hover:bg-blue-600 transition duration-300 hover-scale">
                    Get Started
                </button>
            </a>
        </div>
        <!-- Full-Width Hero Image -->
        <div class="w-full h-96 overflow-hidden relative">
            <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" 
                 alt="Job Dating Hero Image" 
                 class="w-full h-full object-cover transform hover:scale-105 transition duration-500">
            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
                <h2 class="text-4xl font-bold text-white text-center">Your Future Starts Here</h2>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-blue-900 text-center mb-12">Why Choose Job Dating?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg hover-scale">
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Easy to Use</h3>
                    <p class="text-blue-700">Intuitive interface for seamless navigation.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg hover-scale">
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Secure</h3>
                    <p class="text-blue-700">Your data is safe with our advanced security.</p>
                </div>
                <div class="bg-blue-50 p-8 rounded-lg shadow-lg hover-scale">
                    <h3 class="text-2xl font-bold text-blue-900 mb-4">Efficient</h3>
                    <p class="text-blue-700">Streamline your recruitment process.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Call-to-Action Section -->
    <div class="gradient-bg py-16 text-white text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Transform Your Career or Hiring Process?</h2>
        <p class="text-xl mb-8">Join Job Dating today and take the first step towards success.</p>
        <a href="/register">
    <button class="bg-white text-blue-500 px-8 py-3 rounded-lg hover:bg-blue-50 transition duration-300 hover-scale">
        Sign Up Now
    </button>
    </a>
    </div>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white text-center p-6">
        <p>&copy; 2025 Lorenz Cipher. All rights reserved.</p>
    </footer>
</body>
</html>