<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'AI Study Planner - Dashboard')</title>
    <link rel="icon" type="image/png" href="/favicon.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'gradient': 'gradient 8s ease infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'bounce-slow': 'bounce 3s infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'fade-in': 'fadeIn 1s ease-in',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'wave': 'wave 2s ease-in-out infinite',
                        'shimmer': 'shimmer 2s linear infinite',
                        'progress': 'progress 2s ease-out forwards',
                        'ai-thinking': 'aiThinking 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0px)'
                            },
                            '50%': {
                                transform: 'translateY(-20px)'
                            },
                        },
                        gradient: {
                            '0%, 100%': {
                                backgroundPosition: '0% 50%'
                            },
                            '50%': {
                                backgroundPosition: '100% 50%'
                            },
                        },
                        glow: {
                            '0%': {
                                boxShadow: '0 0 10px rgba(56, 189, 248, 0.5)'
                            },
                            '100%': {
                                boxShadow: '0 0 20px rgba(56, 189, 248, 0.8)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        slideUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(20px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        scaleIn: {
                            '0%': {
                                opacity: '0',
                                transform: 'scale(0.9)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'scale(1)'
                            },
                        },
                        wave: {
                            '0%, 100%': {
                                transform: 'translateX(0)'
                            },
                            '50%': {
                                transform: 'translateX(10px)'
                            },
                        },
                        shimmer: {
                            '0%': {
                                backgroundPosition: '-1000px 0'
                            },
                            '100%': {
                                backgroundPosition: '1000px 0'
                            },
                        },
                        progress: {
                            '0%': {
                                width: '0%'
                            },
                            '100%': {
                                width: 'var(--progress-width)'
                            },
                        },
                        aiThinking: {
                            '0%, 100%': {
                                opacity: '0.3'
                            },
                            '50%': {
                                opacity: '1'
                            },
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'gradient-conic': 'conic-gradient(from 180deg at 50% 50%, var(--tw-gradient-stops))',
                    }
                }
            }
        }
    </script>

    <!-- Custom Styles -->
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #38bdf8 0%, #0ea5e9 100%);
            background-size: 200% 200%;
            animation: gradient 8s ease infinite;
        }

        .tech-bg {
            background-image: url('https://sfile.chatglm.cn/images-ppt/d2d799095873.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .tech-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(56, 189, 248, 0.9) 0%, rgba(14, 165, 233, 0.9) 100%);
            z-index: 1;
        }

        .tech-bg>* {
            position: relative;
            z-index: 2;
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1);
            animation: glow 2s ease-in-out infinite alternate;
        }

        .btn-primary {
            background: linear-gradient(135deg, #38bdf8 0%, #0ea5e9 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(56, 189, 248, 0.3);
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .pulse-slow {
            animation: pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .text-gradient {
            background: linear-gradient(135deg, #fbbf24 0%, #fb923c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(90deg, #38bdf8, #0ea5e9);
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        .feature-card {
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .tech-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%239C92AC' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .shimmer {
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            background-size: 1000px 100%;
            animation: shimmer 2s infinite;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s infinite ease-in-out;
        }

        .bubble:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            width: 60px;
            height: 60px;
            left: 30%;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 100px;
            height: 100px;
            left: 60%;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 40px;
            height: 40px;
            left: 80%;
            animation-delay: 6s;
        }

        .stagger-animation>* {
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        .stagger-animation>*:nth-child(1) {
            animation-delay: 0.1s;
        }

        .stagger-animation>*:nth-child(2) {
            animation-delay: 0.2s;
        }

        .stagger-animation>*:nth-child(3) {
            animation-delay: 0.3s;
        }

        .stagger-animation>*:nth-child(4) {
            animation-delay: 0.4s;
        }

        .stagger-animation>*:nth-child(5) {
            animation-delay: 0.5s;
        }

        .stagger-animation>*:nth-child(6) {
            animation-delay: 0.6s;
        }

        .rotating-border {
            position: relative;
            overflow: hidden;
        }

        .rotating-border::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #38bdf8, #0ea5e9, #38bdf8);
            background-size: 400% 400%;
            z-index: -1;
            animation: gradient 3s ease infinite;
            border-radius: inherit;
        }

        .text-shadow {
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .animated-gradient-text {
            background: linear-gradient(90deg, #38bdf8, #0ea5e9, #38bdf8);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s linear infinite;
        }

        .wave-animation {
            position: relative;
            overflow: hidden;
        }

        .wave-animation::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, transparent, #38bdf8, transparent);
            animation: wave 2s linear infinite;
        }

        .progress-bar {
            height: 6px;
            border-radius: 3px;
            background-color: rgba(255, 255, 255, 0.2);
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: 3px;
            animation: progress 2s ease-out forwards;
        }

        .priority-high {
            background: linear-gradient(90deg, #ef4444, #f87171);
        }

        .priority-medium {
            background: linear-gradient(90deg, #f59e0b, #fbbf24);
        }

        .priority-urgent {
            background: linear-gradient(90deg, #dc2626, #ef4444);
            animation: pulse 2s infinite;
        }

        .ai-visualization {
            position: relative;
            height: 60px;
            margin-top: 10px;
            overflow: hidden;
        }

        .ai-node {
            position: absolute;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.8);
            animation: aiThinking 3s ease-in-out infinite;
        }

        .ai-connection {
            position: absolute;
            height: 2px;
            background-color: rgba(255, 255, 255, 0.4);
            transform-origin: left center;
        }

        .task-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 12px;
            padding: 12px;
            margin-bottom: 12px;
            transition: all 0.3s ease;
        }

        .task-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }

        .mini-calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            margin-top: 10px;
        }

        .calendar-day {
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            font-size: 10px;
            color: rgba(255, 255, 255, 0.7);
        }

        .calendar-day.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .calendar-day.today {
            background-color: rgba(255, 255, 255, 0.4);
            color: white;
            font-weight: bold;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans tech-pattern">
    <!-- Navigation -->
    <nav class="bg-white/90 backdrop-blur-md shadow-sm border-b sticky top-0 z-50 animate-fade-in">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div
                            class="w-10 h-10 bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg flex items-center justify-center mr-3 shadow-lg hover-lift">
                            <span class="text-white font-bold text-lg">ASP</span>
                        </div>
                        <h1 class="text-xl font-semibold text-gray-900">AI Study Planner</h1>
                    </div>
                </div>
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-4">
                    <a href="{{ route('planner.dashboard') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Dashboard
                    </a>
                    <a href="{{ route('planner.tasks') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Tugas
                    </a>
                    <a href="{{ route('planner.prefs') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Preferensi
                    </a>
                    <a href="{{ route('planner.tutorial') }}"
                        class="btn-primary text-white px-4 py-2 rounded-md text-sm font-medium rotating-border">
                        Panduan
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="inline">
                        @csrf
                        <button type="submit"
                            class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Logout
                        </button>
                    </form>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" aria-controls="mobile-menu" aria-expanded="false"
                        class="p-2 -mr-2 text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-sky-400 rounded-md">
                        <span id="mobile-menu-icon" class="material-icons text-2xl">menu</span>
                    </button>
                </div>
            </div>
            <!-- Mobile Navigation Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-md rounded-lg mt-2 shadow-lg border">
                    <a href="{{ route('planner.dashboard') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Dashboard
                    </a>
                    <a href="{{ route('planner.tasks') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Tugas
                    </a>
                    <a href="{{ route('planner.prefs') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Preferensi
                    </a>
                    <a href="{{ route('planner.tutorial') }}"
                        class="block px-3 py-2 text-base font-medium btn-primary text-white rounded-md text-center mt-2">
                        Panduan
                    </a>
                    <form action="{{ route('logout') }}" method="post" class="mt-2">
                        @csrf
                        <button type="submit"
                            class="block w-full px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md text-left">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen">
        @if (session('ok'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div
                    class="mb-4 p-4 bg-emerald-50 border border-emerald-200 rounded-lg text-emerald-800 animate-fade-in">
                    <div class="flex items-center">
                        <span class="material-icons mr-2">check_circle</span>
                        {{ session('ok') }}
                    </div>
                </div>
            </div>
        @endif
        @if (session('error'))
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800 animate-fade-in">
                    <div class="flex items-center">
                        <span class="material-icons mr-2">error</span>
                        {{ session('error') }}
                    </div>
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div class="mb-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-800 animate-fade-in">
                    <div class="flex items-center">
                        <span class="material-icons mr-2">warning</span>
                        {{ $errors->first() }}
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 border-t mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-center items-center">
                <div class="flex items-center mb-4 md:mb-0">
                    <div
                        class="w-8 h-8 bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg flex items-center justify-center mr-3">
                        <span class="text-white font-bold text-sm">ASP</span>
                    </div>
                    <span class="text-gray-600 text-center">© 2025 AI Study Planner. Dibuat secara profesional untuk pelajar.</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');

            if (!mobileMenuButton || !mobileMenu) return;

            function setOpen(open) {
                mobileMenu.classList.toggle('hidden', !open);
                mobileMenuButton.setAttribute('aria-expanded', String(open));
                if (mobileMenuIcon) mobileMenuIcon.textContent = open ? 'close' : 'menu';
                document.body.classList.toggle('overflow-hidden', open);
            }

            // Toggle on click
            mobileMenuButton.addEventListener('click', function (e) {
                e.stopPropagation();
                const isOpen = mobileMenu.classList.contains('hidden') === false;
                setOpen(!isOpen);
            });

            // Close when clicking outside
            document.addEventListener('click', function (event) {
                const isOpen = mobileMenu.classList.contains('hidden') === false;
                if (!isOpen) return;
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    setOpen(false);
                }
            });

            // Close on escape
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') setOpen(false);
            });

            // Generic loading state for forms
            document.querySelectorAll('form[data-loading]')?.forEach((form)=>{
                form.addEventListener('submit', function(){
                    const btn = form.querySelector('button[type="submit"],button:not([type])');
                    if (!btn) return;
                    const text = form.getAttribute('data-loading') || 'Memproses...';
                    btn.disabled = true;
                    btn.classList.add('opacity-70','pointer-events-none');
                    btn.innerHTML = `<span class="material-icons mr-2 animate-spin">progress_activity</span>${text}`;
                });
            });
        });
    </script>
</body>

</html>
