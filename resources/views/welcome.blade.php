<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LeaveFlow - Modern Leave Management</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-slate-700 font-sans antialiased">

    <!-- Navbar -->
    <nav class="bg-white border-b border-slate-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-3">
                    <div class="bg-brand-600 text-white p-1.5 rounded-lg">
                        <i data-lucide="calendar-check" class="w-6 h-6"></i>
                    </div>
                    <span class="text-xl font-bold text-brand-900 tracking-tight">Leave<span class="text-brand-600">Flow</span></span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="/login" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-brand-700 bg-brand-50 hover:bg-brand-100 rounded-lg transition-colors">
                        Sign In
                    </a>
                    <a href="/register" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-colors shadow-lg shadow-brand-200">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-brand-50">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-brand-200 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-brand-300 rounded-full blur-3xl"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
            <div class="text-center max-w-3xl mx-auto">
                <div class="inline-flex items-center gap-2 bg-white border border-brand-200 rounded-full px-4 py-1.5 text-sm font-medium text-brand-700 mb-6 shadow-sm">
                    <span class="w-2 h-2 bg-brand-500 rounded-full animate-pulse"></span>
                    Simple & Intuitive Leave Management
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-brand-950 leading-tight">
                    Manage leave<br>
                    <span class="text-brand-600">without the hassle</span>
                </h1>
                <p class="mt-6 text-lg sm:text-xl text-slate-600 max-w-2xl mx-auto leading-relaxed">
                    A clean, modern platform for employees to apply for leave and managers to approve requests. All in one beautiful dashboard.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="/register" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-brand-600 hover:bg-brand-700 text-white font-semibold rounded-xl transition-all shadow-xl shadow-brand-200 text-lg">
                        Get Started Free
                        <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="/login" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white hover:bg-slate-50 text-slate-700 font-semibold rounded-xl transition-all border border-slate-200 text-lg">
                        Sign In
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900">Everything you need</h2>
                <p class="mt-3 text-lg text-slate-500">Streamlined leave management for modern teams</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="group bg-slate-50 rounded-2xl p-8 border border-slate-100 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-100 transition-all">
                    <div class="w-14 h-14 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i data-lucide="send" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Easy Applications</h3>
                    <p class="text-slate-500 leading-relaxed">Apply for leave in seconds with a simple, intuitive form. No paperwork, no confusion.</p>
                </div>
                <div class="group bg-slate-50 rounded-2xl p-8 border border-slate-100 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-100 transition-all">
                    <div class="w-14 h-14 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i data-lucide="check-circle" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Quick Approvals</h3>
                    <p class="text-slate-500 leading-relaxed">Managers can review and approve requests instantly. Real-time status updates for everyone.</p>
                </div>
                <div class="group bg-slate-50 rounded-2xl p-8 border border-slate-100 hover:border-brand-200 hover:shadow-lg hover:shadow-brand-100 transition-all">
                    <div class="w-14 h-14 bg-brand-100 text-brand-600 rounded-xl flex items-center justify-center mb-5 group-hover:scale-110 transition-transform">
                        <i data-lucide="bar-chart-3" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-2">Track Balances</h3>
                    <p class="text-slate-500 leading-relaxed">Always know how many leave days you have left. Visual balance tracking at a glance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Test Login CTA -->
    <section class="py-20 bg-brand-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Try it out now</h2>
            <p class="text-brand-100 text-lg mb-8">Use our test account to explore the dashboard instantly.</p>
            <div class="bg-white/10 backdrop-blur rounded-2xl p-8 border border-white/20 inline-block">
                <div class="flex flex-col sm:flex-row items-center gap-6">
                    <div class="text-center sm:text-left">
                        <p class="text-brand-100 text-sm font-medium uppercase tracking-wide">Test Login</p>
                        <div class="mt-2 flex items-center gap-3 text-white">
                            <span class="font-mono text-lg font-semibold">1@1.com</span>
                            <span class="text-brand-200">/</span>
                            <span class="font-mono text-lg font-semibold">12345678</span>
                        </div>
                    </div>
                    <a href="/login" class="px-6 py-3 bg-white text-brand-700 font-bold rounded-xl hover:bg-brand-50 transition-colors shadow-lg">
                        Sign In Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="bg-brand-600 text-white p-1 rounded">
                    <i data-lucide="calendar-check" class="w-4 h-4"></i>
                </div>
                <span class="font-bold text-white">LeaveFlow</span>
            </div>
            <p class="text-sm"> Built with Laravel & Tailwind CSS</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>

