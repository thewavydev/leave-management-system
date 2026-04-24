<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LeaveFlow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    @vite('resources/css/app.css')
</head>
<body class="bg-brand-50 min-h-screen flex items-center justify-center p-4">

<div class="w-full max-w-md animate-slide-up">
    <div class="bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <div class="text-center mb-8">
            <div class="flex justify-center mb-4">
                <div class="bg-brand-600 text-white p-2 rounded-xl shadow-lg shadow-brand-200">
                    <i data-lucide="calendar-check" class="w-7 h-7"></i>
                </div>
            </div>
            <h2 class="text-2xl font-bold text-slate-900">Create Account</h2>
            <p class="text-slate-500 mt-1">Get started with LeaveFlow</p>
        </div>

        @if($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl mb-6">
                <div class="flex items-start gap-3">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-red-600 mt-0.5 shrink-0"></i>
                    <ul class="list-disc list-inside text-sm space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form method="POST" action="/register" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Full Name</label>
                <div class="relative">
                    <i data-lucide="user" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input name="name" value="{{ old('name') }}" placeholder="John Doe" required
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                <div class="relative">
                    <i data-lucide="mail" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="john@example.com" required
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="password" name="password" placeholder="Minimum 8 characters" required
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1.5">Confirm Password</label>
                <div class="relative">
                    <i data-lucide="lock" class="w-5 h-5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="password" name="password_confirmation" placeholder="Repeat your password" required
                        class="w-full pl-10 pr-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-slate-900 placeholder:text-slate-400 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>
            </div>

            <button type="submit" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-lg shadow-brand-200 hover:shadow-brand-300 flex items-center justify-center gap-2">
                <i data-lucide="user-plus" class="w-4 h-4"></i>
                Create Account
            </button>
        </form>

        <p class="text-center mt-6 text-slate-500 text-sm">
            Already have an account?
            <a href="/login" class="text-brand-600 hover:text-brand-700 font-semibold hover:underline transition-colors">Sign in</a>
        </p>
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

