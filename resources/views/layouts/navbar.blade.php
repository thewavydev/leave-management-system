<nav class="bg-white border-b border-brand-100 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="bg-brand-600 text-white p-1.5 rounded-lg">
                    <i data-lucide="calendar-check" class="w-6 h-6"></i>
                </div>
                <a href="/" class="text-xl font-bold text-brand-900 tracking-tight">
                    Leave<span class="text-brand-600">Flow</span>
                </a>
            </div>
            <!-- Right Side -->
            <div class="flex items-center gap-3">
                @auth
                    <!-- User Dropdown -->
                    <div class="relative" id="user-dropdown">
                        <button onclick="toggleDropdown()" class="flex items-center gap-3 pl-3 pr-2 py-1.5 rounded-lg hover:bg-slate-50 transition-colors border border-transparent hover:border-slate-200">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-semibold text-slate-900 leading-tight">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-500 leading-tight capitalize">{{ auth()->user()->role }}</p>
                            </div>
                            <div class="w-9 h-9 bg-brand-100 text-brand-700 rounded-full flex items-center justify-center font-bold text-sm border-2 border-brand-200">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 transition-transform" id="dropdown-chevron"></i>
                        </button>

                        <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-lg border border-slate-100 py-2 z-50">
                            <div class="px-4 py-2 border-b border-slate-100 sm:hidden">
                                <p class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-slate-500 capitalize">{{ auth()->user()->role }}</p>
                            </div>
                            <a href="/dashboard" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-700 hover:bg-brand-50 hover:text-brand-700 transition-colors">
                                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                                Dashboard
                            </a>
                            <div class="border-t border-slate-100 my-1"></div>
                            <form method="POST" action="/logout">
                                @csrf
                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                    <i data-lucide="log-out" class="w-4 h-4"></i>
                                    Logout
                                </button>
                            </form>
                        </div>
                @else
                    <a href="/login" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-brand-700 bg-brand-50 hover:bg-brand-100 rounded-lg transition-colors">
                        <i data-lucide="log-in" class="w-4 h-4"></i>
                        Sign In
                    </a>
                    <a href="/register" class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-brand-600 hover:bg-brand-700 rounded-lg transition-colors shadow-sm">
                        <i data-lucide="user-plus" class="w-4 h-4"></i>
                        Get Started
                    </a>
                @endauth

                <!-- Mobile menu button -->
                @auth
                <button onclick="toggleMobileMenu()" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                    <i data-lucide="menu" class="w-5 h-5" id="mobile-menu-open"></i>
                    <i data-lucide="x" class="w-5 h-5 hidden" id="mobile-menu-close"></i>
                </button>
                @endauth
            </div>
    </div>
</nav>

<script>
    function toggleDropdown() {
        const menu = document.getElementById('dropdown-menu');
        const chevron = document.getElementById('dropdown-chevron');
        menu.classList.toggle('hidden');
        chevron.style.transform = menu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        const openIcon = document.getElementById('mobile-menu-open');
        const closeIcon = document.getElementById('mobile-menu-close');
        menu.classList.toggle('hidden');
        openIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
        const dropdown = document.getElementById('user-dropdown');
        const menu = document.getElementById('dropdown-menu');
        const chevron = document.getElementById('dropdown-chevron');
        if (dropdown && !dropdown.contains(e.target) && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
            chevron.style.transform = 'rotate(0deg)';
        }
    });
</script>
