<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Leave Management System')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-brand-50 text-slate-700 font-sans antialiased min-h-screen">

    @include('layouts.navbar')

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if(session('success'))
            <div class="mb-6 animate-slide-up">
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-lg flex items-center gap-3 shadow-sm">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 animate-slide-up">
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center gap-3 shadow-sm">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
    @yield('scripts')
</body>
</html>

