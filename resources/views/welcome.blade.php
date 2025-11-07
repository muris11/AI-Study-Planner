<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AI Study Planner - Perencana Belajar Pintar</title>
    <meta name="description"
        content="AI Study Planner membantu Anda merencanakan jadwal belajar dengan cerdas menggunakan kecerdasan buatan.">
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
                                transform: 'translateY(20px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateY(0)',
                                opacity: '1'
                            },
                        },
                        scaleIn: {
                            '0%': {
                                transform: 'scale(0.9)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'scale(1)',
                                opacity: '1'
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
                    <a href="{{ route('welcome') }}"
                            class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Dashboard
                        </a>
                    <a href="{{ route('about') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Tentang
                    </a>
                    <a href="{{ route('help') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Bantuan
                    </a>
                    <a href="{{ route('contact') }}"
                        class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                        Kontak
                    </a>
                        <a href="{{ route('login.form') }}"
                            class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Masuk
                        </a>
                            <a href="{{ route('register.form') }}"
                                class="btn-primary text-white px-4 py-2 rounded-md text-sm font-medium rotating-border">
                                Daftar
                            </a>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-button" aria-label="Toggle navigation"
                        class="inline-flex items-center justify-center w-10 h-10 rounded-md text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
            </div>
            <!-- Mobile Navigation Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <a href="{{ route('welcome') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Dashboard
                    </a>
                    <a href="{{ route('about') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Tentang
                    </a>
                    <a href="{{ route('help') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Bantuan
                    </a>
                    <a href="{{ route('contact') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                        Kontak
                    </a>
                        <a href="{{ route('login.form') }}"
                            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
                            Masuk
                        </a>
                            <a href="{{ route('register.form') }}"
                                class="block px-3 py-2 text-base font-medium btn-primary text-white rounded-md text-center mt-2">
                                Daftar
                            </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="tech-bg text-white relative overflow-hidden">
        <!-- Animated Bubbles -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8 animate-slide-up">
                    <div>
                        <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold leading-tight text-shadow">
                            Perencana Belajar
                            <span class="block text-gradient animate-wave">
                                Berbasis AI
                            </span>
                        </h1>
                        <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                            Optimalkan waktu belajar Anda dengan bantuan kecerdasan buatan. Dapatkan jadwal yang
                            dipersonalisasi berdasarkan prioritas, kesulitan, dan waktu yang tersedia.
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        @auth
                            <a href="{{ route('planner.dashboard') }}"
                                class="bg-white text-blue-600 hover:bg-gray-50 px-8 py-3 rounded-lg font-semibold text-center transition duration-150 shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover-lift">
                                <span class="flex items-center justify-center">
                                    <span class="material-icons mr-2">dashboard</span>
                                    Buka Dashboard
                                </span>
                            </a>
                        @else
                            <a href="{{ route('register.form') }}"
                                class="bg-white text-blue-600 hover:bg-gray-50 px-8 py-3 rounded-lg font-semibold text-center transition duration-150 shadow-lg hover:shadow-xl transform hover:-translate-y-1 hover-lift">
                                <span class="flex items-center justify-center">
                                    <span class="material-icons mr-2 animate-bounce-slow">rocket_launch</span>
                                    Mulai Sekarang - Gratis
                                </span>
                            </a>
                            <a href="{{ route('login.form') }}"
                                class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 rounded-lg font-semibold text-center transition duration-150 hover-lift">
                                Masuk
                            </a>
                        @endauth
                    </div>
                </div>

                <div class="relative">
                    <div class="floating">
                        <div
                            class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl p-6 transform rotate-2 border border-white/20 hover-lift">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold mb-3 flex items-center">
                                    <span class="material-icons mr-2 text-yellow-300">calendar_today</span>
                                    Jadwal Prioritas Hari Ini
                                </h3>
                            </div>

                            <!-- Task Cards with Progress Bars -->
                            <div class="space-y-3">
                                <!-- Math Task -->
                                <div class="task-card">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <span class="material-icons mr-2 text-red-400">calculate</span>
                                            <span class="font-medium">Matematika</span>
                                        </div>
                                        <span
                                            class="text-xs bg-red-500/20 text-red-300 px-2 py-1 rounded-full">Prioritas
                                            Tinggi</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill priority-high" style="--progress-width: 75%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-blue-100">
                                        <span>75% Selesai</span>
                                        <span>2 jam tersisa</span>
                                    </div>
                                </div>

                                <!-- English Task -->
                                <div class="task-card">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <span class="material-icons mr-2 text-yellow-400">language</span>
                                            <span class="font-medium">Bahasa Inggris</span>
                                        </div>
                                        <span
                                            class="text-xs bg-yellow-500/20 text-yellow-300 px-2 py-1 rounded-full">Prioritas
                                            Sedang</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill priority-medium" style="--progress-width: 40%"></div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-blue-100">
                                        <span>40% Selesai</span>
                                        <span>4 jam tersisa</span>
                                    </div>
                                </div>

                                <!-- Physics Task -->
                                <div class="task-card">
                                    <div class="flex items-center justify-between mb-2">
                                        <div class="flex items-center">
                                            <span class="material-icons mr-2 text-orange-400">science</span>
                                            <span class="font-medium">Fisika</span>
                                        </div>
                                        <span
                                            class="text-xs bg-orange-500/20 text-orange-300 px-2 py-1 rounded-full">Deadline
                                            Mendekat</span>
                                    </div>
                                    <div class="progress-bar">
                                        <div class="progress-fill priority-urgent" style="--progress-width: 25%">
                                        </div>
                                    </div>
                                    <div class="flex justify-between mt-1 text-xs text-blue-100">
                                        <span>25% Selesai</span>
                                        <span>1 jam tersisa</span>
                                    </div>
                                </div>
                            </div>

                            <!-- AI Optimization Visualization -->
                            <div class="mt-6 p-4 bg-white/10 backdrop-blur-sm rounded-lg">
                                <div class="flex items-center mb-2">
                                    <span class="material-icons mr-2 text-blue-300">psychology</span>
                                    <span class="text-sm font-medium">AI sedang mengoptimalkan jadwal...</span>
                                </div>
                                <div class="ai-visualization">
                                    <!-- AI Nodes -->
                                    <div class="ai-node" style="top: 10px; left: 10px; animation-delay: 0s;"></div>
                                    <div class="ai-node" style="top: 30px; left: 30px; animation-delay: 0.5s;"></div>
                                    <div class="ai-node" style="top: 20px; left: 50px; animation-delay: 1s;"></div>
                                    <div class="ai-node" style="top: 40px; left: 70px; animation-delay: 1.5s;"></div>
                                    <div class="ai-node" style="top: 15px; left: 90px; animation-delay: 2s;"></div>
                                    <div class="ai-node" style="top: 35px; left: 110px; animation-delay: 2.5s;"></div>
                                    <div class="ai-node" style="top: 25px; left: 130px; animation-delay: 0.3s;"></div>
                                    <div class="ai-node" style="top: 45px; left: 150px; animation-delay: 0.8s;"></div>
                                    <div class="ai-node" style="top: 5px; left: 170px; animation-delay: 1.3s;"></div>
                                    <div class="ai-node" style="top: 30px; left: 190px; animation-delay: 1.8s;"></div>

                                    <!-- AI Connections -->
                                    <div class="ai-connection"
                                        style="top: 16px; left: 22px; width: 15px; transform: rotate(45deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 40px; left: 42px; width: 25px; transform: rotate(-20deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 25px; left: 62px; width: 25px; transform: rotate(30deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 30px; left: 82px; width: 25px; transform: rotate(-15deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 20px; left: 102px; width: 25px; transform: rotate(20deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 40px; left: 122px; width: 20px; transform: rotate(-30deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 15px; left: 142px; width: 30px; transform: rotate(10deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 35px; left: 162px; width: 20px; transform: rotate(-25deg);"></div>
                                    <div class="ai-connection"
                                        style="top: 10px; left: 182px; width: 20px; transform: rotate(40deg);"></div>
                                </div>
                                <p class="text-xs text-blue-100 mt-2">
                                    AI menganalisis deadline, kesulitan, dan preferensi Anda untuk jadwal optimal
                                </p>
                            </div>

                            <!-- Mini Calendar -->
                            <div class="mt-4">
                                <div class="flex items-center mb-2">
                                    <span class="material-icons mr-2 text-blue-300">event</span>
                                    <span class="text-sm font-medium">Jadwal Minggu Ini</span>
                                </div>
                                <div class="mini-calendar">
                                    <div class="calendar-day">S</div>
                                    <div class="calendar-day">M</div>
                                    <div class="calendar-day">S</div>
                                    <div class="calendar-day active">R</div>
                                    <div class="calendar-day today">J</div>
                                    <div class="calendar-day active">S</div>
                                    <div class="calendar-day">M</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Fitur Unggulan AI Study Planner
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Teknologi canggih yang membantu Anda belajar lebih efektif dan efisien
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 stagger-animation">
                <!-- Feature 1 -->
                <div
                    class="feature-card bg-gradient-to-br from-sky-50 to-blue-50 p-8 rounded-xl border border-sky-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-sky-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">lightbulb</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Prioritas Cerdas</h3>
                    <p class="text-gray-600">
                        AI menganalisis deadline, tingkat kesulitan, dan nilai mata pelajaran untuk menentukan prioritas
                        yang tepat.
                    </p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="feature-card bg-gradient-to-br from-cyan-50 to-sky-50 p-8 rounded-xl border border-cyan-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">schedule</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Jadwal Optimal</h3>
                    <p class="text-gray-600">
                        Buat jadwal belajar yang sesuai dengan waktu produktif Anda dan istirahat yang cukup untuk hasil
                        maksimal.
                    </p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="feature-card bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border border-blue-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">bar_chart</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Tracking Progress</h3>
                    <p class="text-gray-600">
                        Pantau kemajuan belajar Anda dengan laporan detail dan analisis performa yang akurat.
                    </p>
                </div>

                <!-- Feature 4 -->
                <div
                    class="feature-card bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-xl border border-teal-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">person</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Personalisasi</h3>
                    <p class="text-gray-600">
                        Sesuaikan dengan gaya belajar, jadwal harian, dan preferensi waktu Anda untuk pengalaman yang
                        personal.
                    </p>
                </div>

                <!-- Feature 5 -->
                <div
                    class="feature-card bg-gradient-to-br from-sky-50 to-blue-50 p-8 rounded-xl border border-sky-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-sky-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">notifications</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Pengingat Cerdas</h3>
                    <p class="text-gray-600">
                        Notifikasi yang tepat waktu untuk mengingatkan Anda tentang jadwal belajar dan istirahat.
                    </p>
                </div>

                <!-- Feature 6 -->
                <div
                    class="feature-card bg-gradient-to-br from-cyan-50 to-sky-50 p-8 rounded-xl border border-cyan-100 card-hover">
                    <div class="feature-icon w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mb-6">
                        <span class="material-icons text-white">favorite</span>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Gratis & Mudah</h3>
                    <p class="text-gray-600">
                        Akses semua fitur tanpa biaya. Antarmuka yang intuitif membuat perencanaan belajar jadi
                        menyenangkan.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-sky-600 to-blue-600 text-white py-16 relative overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0"
            style="background-image: url('https://sfile.chatglm.cn/images-ppt/3b5c017136d9.jpg'); background-size: cover; background-position: center; opacity: 0.2;">
        </div>
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8 relative z-10">
            <h2 class="text-3xl lg:text-4xl font-bold mb-4 animate-fade-in">
                Siap Mengoptimalkan Waktu Belajar Anda?
            </h2>
            <p class="text-xl text-gray-300 mb-8 animate-slide-up">
                Bergabunglah dengan ribuan pelajar yang telah meningkatkan produktivitas mereka dengan AI Study Planner.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center stagger-animation">
                @auth
                    <a href="{{ route('planner.dashboard') }}"
                        class="btn-primary text-white px-8 py-3 rounded-lg font-semibold text-center hover-lift">
                        <span class="flex items-center justify-center">
                            <span class="material-icons mr-2">play_arrow</span>
                            Lanjutkan Belajar
                        </span>
                    </a>
                @else
                    <a href="{{ route('register.form') }}"
                        class="btn-primary text-white px-8 py-3 rounded-lg font-semibold text-center hover-lift">
                        <span class="flex items-center justify-center">
                            <span class="material-icons mr-2 animate-bounce-slow">rocket_launch</span>
                            Mulai Gratis Sekarang
                        </span>
                    </a>
                    <a href="{{ route('login.form') }}"
                        class="border-2 border-white text-white hover:bg-white hover:text-blue-600 px-8 py-3 rounded-lg font-semibold text-center transition duration-150 hover-lift">
                        Sudah Punya Akun?
                    </a>
                @endauth
            </div>
        </div>
    </section>

    < <!-- Footer -->
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
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });
    </script>
</body>

</html>
