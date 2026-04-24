<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LeaveFlow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-brand-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-5xl grid lg:grid-cols-2 gap-8 items-center">

    <!-- Left Side - Branding -->
    <div class="hidden lg:flex flex-col items-start space-y-6 animate-fade-in">
        <!-- Test Login Card -->
        <div class="w-full bg-white rounded-2xl shadow-xl border border-brand-100 p-6 mt-4">
            <div class="flex items-center gap-2 mb-4">
                <i data-lucide="key-round" class="w-5 h-5 text-brand-600"></i>
                <h3 class="font-bold text-brand-900">Test Login Credentials</h3>
            </div>
            <div class="space-y-3">
                <div class="flex items-center justify-between bg-slate-50 rounded-lg px-4 py-3 border border-slate-200">
                    <div>
                        <p class="text-xs text-slate-500 uppercase tracking-wide font-semibold">manager Account</p>
                        <p class="text-sm font-mono text-slate-800 mt-0.5">lehlohonolo@manager.com</p>
                    </div>
                    <span class="text-xs bg-white border border-slate-300 text-slate-700 px-2 py-1 rounded font-mono">password</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Form -->
    <div class="w-full max-w-md mx-auto lg:mx-0 animate-slide-up">
        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
            <div class="text-center mb-8">
                <div class="lg:hidden flex justify-center mb-4">
                    <div class="bg-brand-600 text-white p-2 rounded-xl shadow-lg shadow-brand-200">
                        <i data-lucide="calendar-check" class="w-7 h-7"></i>
                    </div>
                </div>
                <h2 class="text-2xl font-bold text-slate-900">Welcome back</h2>
                <p class="text-slate-500 mt-1">Sign in to your account</p>
            </div>

            @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-start gap-3 mb-6">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 mt-0.5 shrink-0"></i>
                    <span class="text-sm font-medium">{{ session('error') }}</span>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-start gap-3 mb-6">
                    <i data-lucide="check-circle" class="w-5 h-5 text-emerald-600 mt-0.5 shrink-0"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            <!-- Mobile Test Login (shown only on small screens) -->
            <div class="lg:hidden mb-6 bg-brand-50 border border-brand-200 rounded-xl p-4">
                <p class="text-xs text-brand-600 font-semibold uppercase tracking-wide mb-2">Test Login</p>
                <div class="flex gap-2 text-sm">
                    <span class="font-mono text-brand-800 bg-white px-2 py-1 rounded border border-brand-200">1@1.com</span>
                    <span class="text-slate-400">/</span>
                    <span class="font-mono text-brand-800 bg-white px-2 py-1 rounded border border-brand-200">12345678</span>
                </div>
            </div>

            <form method="POST" action="/login" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                    <div class="relative">
                        <i data-lucide="mail" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                    <div class="relative">
                        <i data-lucide="lock" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                        <input type="password" name="password" placeholder="Enter your password" required
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-brand-600 focus:ring-brand-500">
                        <span class="text-slate-600">Remember me</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-lg shadow-brand-200 hover:shadow-brand-300 flex items-center justify-center gap-2">
                    <i data-lucide="log-in" class="w-4 h-4"></i>
                    Sign In
                </button>
            </form>

            <p class="text-center mt-6 text-slate-500 text-sm">
                Don't have an account?
                <a href="/register" class="text-brand-600 hover:text-brand-700 font-semibold hover:underline transition-colors">Create one</a>
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (window.lucide) {
            lucide.createIcons();
        }
    });
</script>
</body>
</html>

