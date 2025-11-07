<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang AI Study Planner - Perencana Belajar Pintar</title>
    <meta name="description"
        content="Pelajari lebih lanjut tentang AI Study Planner, aplikasi perencanaan belajar cerdas yang menggunakan kecerdasan buatan untuk mengoptimalkan waktu studi Anda.">
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

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .bubble {
                display: none;
                /* Hide bubbles on mobile for better performance */
            }

            .animate-wave {
                animation-duration: 3s;
                /* Slower animation on mobile */
            }

            .animate-fade-in,
            .animate-slide-up,
            .animate-scale-in {
                animation-duration: 0.8s;
                /* Faster completion on mobile */
            }

            .stagger-animation>* {
                animation-delay: 0.1s !important;
                /* Reduce stagger delay on mobile */
            }
        }

        /* Respect user's motion preferences */
        @media (prefers-reduced-motion: reduce) {

            .bubble,
            .animate-wave,
            .animate-fade-in,
            .animate-slide-up,
            .animate-scale-in,
            .animate-bounce-slow,
            .animate-pulse-slow,
            .animate-glow {
                animation: none !important;
            }

            .hover-lift:hover {
                transform: none !important;
            }
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

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            background-size: 200% 200%;
            animation: gradient 3s ease infinite;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
        }

        .btn-primary:hover {
            box-shadow: 0 10px 15px rgba(59, 130, 246, 0.4);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            transition: all 0.2s ease;
        }

        .text-gradient {
            background: linear-gradient(135deg, #ffffff 0%, #e0f2fe 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .text-shadow {
            text-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .animate-wave {
            animation: wave 2s ease-in-out infinite;
        }

        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        .animate-bounce-slow {
            animation: bounce 3s infinite;
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
    </style>
</head>

<body class="bg-gray-50">
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
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-md rounded-lg mt-2 shadow-lg border">
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
    <section class="tech-bg text-white relative overflow-hidden min-h-screen flex items-center">
        <!-- Animated Bubbles -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-24">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-shadow">
                    Tentang
                    <span class="block text-gradient animate-wave">AI Study Planner</span>
                </h1>
                <p
                    class="text-lg sm:text-xl md:text-2xl text-white/90 mt-4 sm:mt-6 leading-relaxed drop-shadow-md max-w-4xl mx-auto px-4">
                    Pelajari lebih dalam tentang aplikasi perencanaan belajar cerdas yang menggunakan kecerdasan buatan
                    untuk mengoptimalkan produktivitas studi Anda.
                </p>
            </div>
        </div>
    </section>

    <!-- About Content Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Description -->
            <div class="mb-16">
                <div class="text-center mb-12">
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 animate-fade-in">
                        Apa Itu AI Study Planner?
                    </h2>
                </div>
                <div class="max-w-4xl mx-auto">
                    <p class="text-lg text-gray-600 leading-relaxed mb-6 animate-slide-up">
                        AI Study Planner adalah sebuah platform pintar berbasis Kecerdasan Buatan (Artificial
                        Intelligence) yang dirancang untuk membantu mahasiswa dan pelajar dalam mengatur waktu belajar
                        secara otomatis, efisien, dan personal.
                        Sistem ini bukan sekadar kalender digital atau daftar tugas, melainkan asisten belajar cerdas
                        yang memahami setiap pengguna — mulai dari kebiasaan belajar, tingkat kesulitan materi, hingga
                        waktu produktif harian.
                    </p>
                    <div
                        class="bg-gradient-to-r from-blue-50 to-cyan-50 p-6 rounded-xl border-l-4 border-blue-500 animate-scale-in">
                        <p class="text-xl font-semibold text-gray-800 text-center italic">
                            "Membantu mahasiswa belajar lebih cerdas, bukan lebih lama."
                        </p>
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed mt-6 animate-fade-in">
                        AI Study Planner hadir untuk menjawab tantangan dunia pendidikan modern: bagaimana cara
                        mahasiswa tetap produktif, terorganisir, dan fokus di tengah banyaknya tugas, kegiatan, dan
                        distraksi digital.
                    </p>
                </div>
            </div>

            <!-- Vision & Concept -->
            <div class="mb-16">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-8 text-center animate-fade-in">
                    Ide dan Konsep
                </h3>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <div
                        class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-100 animate-slide-up">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Inspirasi Utama</h4>
                        <p class="text-gray-600 leading-relaxed">
                            Inspirasi AI Study Planner berawal dari kenyataan bahwa banyak mahasiswa memiliki semangat
                            belajar tinggi, tetapi sering kali kesulitan mengatur waktu dan menentukan prioritas.
                            Sebagian besar menghabiskan waktu untuk hal yang tidak mendesak, lupa deadline, atau terlalu
                            lama mengerjakan tugas dengan prioritas rendah.
                        </p>
                    </div>
                    <div
                        class="bg-gradient-to-br from-green-50 to-teal-50 p-6 rounded-xl border border-green-100 animate-slide-up">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Solusi Cerdas</h4>
                        <p class="text-gray-600 leading-relaxed">
                            Melihat hal itu, proyek ini dirancang agar AI bisa menjadi teman belajar digital — yang
                            membantu merencanakan kegiatan belajar secara cerdas, menilai mana tugas yang harus
                            dikerjakan duluan, dan menyesuaikan jadwal belajar sesuai kebiasaan pengguna.
                        </p>
                    </div>
                </div>
                <div class="mt-8 bg-gradient-to-r from-indigo-50 to-purple-50 p-6 rounded-xl animate-scale-in">
                    <p class="text-gray-700 leading-relaxed text-center">
                        AI Study Planner tidak hanya memberi jadwal, tetapi juga memberikan rekomendasi berbasis data
                        dan logika buatan agar proses belajar menjadi lebih efektif dan menyenangkan.
                    </p>
                </div>
            </div>

            <!-- How It Works -->
            <div class="mb-16">
                <h3 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-12 text-center animate-fade-in">
                    Cara Kerja Sistem
                </h3>
                <p class="text-lg text-gray-600 leading-relaxed max-w-3xl mx-auto mb-12 text-center animate-slide-up">
                    Sistem AI Study Planner berjalan melalui tiga tahapan utama yang terintegrasi secara cerdas:
                </p>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 stagger-animation">
                    <!-- Step 1 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl border border-blue-100 card-hover animate-scale-in h-full">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-white">1</span>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-4">Input Data Belajar</h4>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Pengguna memasukkan data sederhana seperti:
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Daftar tugas atau topik pelajaran
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Batas waktu (deadline)
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Tingkat kesulitan materi
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Waktu yang tersedia untuk belajar
                                </li>
                            </ul>
                            <p class="text-gray-600 mt-4 text-sm italic">
                                Data ini menjadi dasar analisis AI.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100 card-hover animate-scale-in h-full">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-green-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-white">2</span>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-4">Analisis Prioritas Berbasis AI
                                </h4>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Mesin AI yang dibangun dengan FastAPI (Python) melakukan analisis dengan pendekatan
                                rule-based reasoning dan weighted scoring system, menilai setiap tugas berdasarkan:
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 flex-shrink-0"></span>
                                    <strong>Urgency:</strong> Kedesakan waktu
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 flex-shrink-0"></span>
                                    <strong>Importance:</strong> Tingkat kepentingan
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 flex-shrink-0"></span>
                                    <strong>Difficulty:</strong> Kesulitan materi
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 flex-shrink-0"></span>
                                    <strong>Competency Gap:</strong> Perbedaan kemampuan pengguna
                                </li>
                            </ul>
                            <p class="text-gray-600 mt-4 text-sm italic">
                                Dari sini sistem akan mengetahui tugas mana yang harus didahulukan dan berapa lama waktu
                                ideal untuk mempelajarinya.
                            </p>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="relative">
                        <div
                            class="bg-gradient-to-br from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-100 card-hover animate-scale-in h-full">
                            <div class="text-center mb-6">
                                <div
                                    class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl font-bold text-white">3</span>
                                </div>
                                <h4 class="text-xl font-semibold text-gray-900 mb-4">Penjadwalan Otomatis</h4>
                            </div>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed">
                                Setelah AI menentukan prioritas, bagian web yang dikembangkan dengan Laravel 12 (PHP)
                                akan menghasilkan jadwal belajar otomatis yang realistis dan mudah diikuti.
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Mengatur waktu belajar harian
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Jeda istirahat yang teratur
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Pengingat via email atau WhatsApp
                                </li>
                                <li class="flex items-center">
                                    <span class="w-2 h-2 bg-purple-500 rounded-full mr-3 flex-shrink-0"></span>
                                    Menyesuaikan dengan hari kosong dan waktu produktif
                                </li>
                            </ul>
                            <p class="text-gray-600 mt-4 text-sm italic">
                                Hasilnya: mahasiswa memiliki rencana belajar yang efisien, fleksibel, dan benar-benar
                                sesuai dengan pola hidupnya.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Result Summary -->
                <div
                    class="mt-12 bg-gradient-to-r from-sky-50 to-blue-50 p-8 rounded-2xl border border-sky-200 animate-fade-in">
                    <div class="text-center">
                        <h4 class="text-xl font-semibold text-gray-900 mb-4">Hasil Akhir</h4>
                        <p class="text-gray-700 leading-relaxed">
                            Dengan desain yang bagus dan animasi yang menarik, AI Study Planner memberikan pengalaman
                            belajar yang tidak hanya efektif secara akademis,
                            tetapi juga menyenangkan dan mudah diakses. Sistem ini membuktikan bahwa teknologi AI dapat
                            menjadi mitra sejati dalam dunia pendidikan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-24 bg-gradient-to-br from-white to-gray-50 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 tech-pattern opacity-30"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 animate-fade-in">
                    Pengembang
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto animate-slide-up">
                    Pengembang ahli di bidang teknologi web dan kecerdasan buatan yang berkomitmen
                    untuk menciptakan solusi belajar terbaik bagi mahasiswa dan pelajar.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-8 stagger-animation">
                <!-- Muhammad Rifqy Saputra -->
                <div class="text-center max-w-4xl mx-auto">
                    <div class="relative mb-4 sm:mb-6 animate-scale-in">
                        <div
                            class="w-32 h-32 sm:w-40 sm:h-40 bg-gradient-to-br from-blue-500 via-cyan-500 to-teal-500 rounded-full flex items-center justify-center mx-auto shadow-2xl hover:shadow-3xl transition-all duration-500 hover:scale-105 animate-glow">
                            <span class="material-icons text-white text-4xl sm:text-5xl">person</span>
                        </div>
                        <!-- Floating Elements -->
                        <div
                            class="absolute -top-2 -right-2 sm:-top-4 sm:-right-4 w-6 h-6 sm:w-8 sm:h-8 bg-yellow-400 rounded-full animate-bounce-slow opacity-80">
                        </div>
                        <div
                            class="absolute -bottom-2 -left-2 sm:-bottom-4 sm:-left-4 w-4 h-4 sm:w-6 sm:h-6 bg-pink-400 rounded-full animate-pulse-slow opacity-80">
                        </div>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2 sm:mb-3 animate-fade-in">Muhammad
                        Rifqy Saputra</h3>
                    <p
                        class="text-base sm:text-lg text-gray-600 mb-4 sm:mb-6 leading-relaxed animate-slide-up max-w-2xl mx-auto px-4">
                        Full stack developer dan mobile developer - Pengembang utama AI Study Planner - Spesialis dalam
                        pengembangan
                        aplikasi web modern dengan fokus pada integrasi kecerdasan buatan untuk pendidikan. Mahasiswa
                        Politeknik Negeri Indramayu yang berkomitmen menciptakan solusi teknologi untuk meningkatkan
                        produktivitas belajar.
                    </p>
                    <div
                        class="flex flex-wrap justify-center space-x-2 sm:space-x-3 mb-4 sm:mb-6 animate-fade-in px-4">
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-blue-100 to-blue-200 text-blue-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">Laravel</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-green-100 to-green-200 text-green-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">PHP</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-cyan-100 to-cyan-200 text-cyan-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">Tailwind
                            CSS</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-pink-100 to-pink-200 text-pink-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">Flutter</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-yellow-100 to-yellow-200 text-yellow-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">MySQL</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-indigo-100 to-indigo-200 text-indigo-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">FastAPI</span>
                        <span
                            class="px-3 py-1 sm:px-4 sm:py-2 bg-gradient-to-r from-purple-100 to-purple-200 text-purple-800 rounded-full text-xs sm:text-sm font-medium shadow-sm hover:shadow-md transition-all duration-300 hover-lift">ML/AI</span>
                    </div>
                    <div class="text-xs sm:text-sm text-gray-500 mb-4 sm:mb-6 animate-slide-up">
                        <p class="font-medium">Politeknik Negeri Indramayu</p>
                        <a href="https://rifqysaputra.my.id" target="_blank"
                            class="text-blue-600 hover:text-blue-800 underline transition-colors duration-300">rifqysaputra.my.id</a>
                    </div>
                    <div class="flex justify-center space-x-4 sm:space-x-6 animate-fade-in">
                        <a href="https://rifqysaputra.my.id" target="_blank"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-slow">
                            <img src="https://img.icons8.com/color/48/domain.png" alt="Website"
                                class="w-6 h-6 sm:w-8 sm:h-8">
                        </a>
                        <a href="mailto:rifqysaputra1102@gmail.com"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-gray-500 to-gray-600 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-slow">
                            <img src="https://img.icons8.com/color/48/gmail-new.png" alt="Gmail"
                                class="w-6 h-6 sm:w-8 sm:h-8">
                        </a>
                        <a href="https://www.instagram.com/rfqy_sptr/" target="_blank"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-pink-500 to-purple-500 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-slow">
                            <img src="https://img.icons8.com/color/48/instagram-new.png" alt="Instagram"
                                class="w-6 h-6 sm:w-8 sm:h-8">
                        </a>
                        <a href="https://github.com/muris11" target="_blank"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-gray-700 to-black rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-slow">
                            <img src="https://img.icons8.com/material-rounded/48/github.png" alt="GitHub"
                                class="w-6 h-6 sm:w-8 sm:h-8">
                        </a>
                        <a href="https://www.linkedin.com/in/rifqy-saputra-022236261/" target="_blank"
                            class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-r from-blue-600 to-blue-800 rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 animate-pulse-slow">
                            <img src="https://img.icons8.com/color/48/linkedin.png" alt="LinkedIn"
                                class="w-6 h-6 sm:w-8 sm:h-8">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="bg-gray-50 border-t mt-12 sm:mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <div class="flex flex-col sm:flex-row justify-center items-center">
                <div class="flex items-center mb-4 sm:mb-0">
                    <div
                        class="w-6 h-6 sm:w-8 sm:h-8 bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg flex items-center justify-center mr-2 sm:mr-3">
                        <span class="text-white font-bold text-xs sm:text-sm">ASP</span>
                    </div>
                    <span class="text-gray-600 text-sm sm:text-base text-center">© 2025 AI Study Planner. Dibuat secara
                        profesional untuk pelajar.</span>
                </div>
            </div>
        </div>
    </footer> <!-- Mobile Menu Script -->
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
