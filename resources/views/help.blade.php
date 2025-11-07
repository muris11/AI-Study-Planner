<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bantuan AI Study Planner - Panduan Lengkap</title>
    <meta name="description"
        content="Panduan lengkap penggunaan AI Study Planner. Pelajari cara mengoptimalkan produktivitas belajar dengan fitur-fitur canggih kami.">
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
                        'gradient': 'gradient 8s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'bounce-slow': 'bounce 3s ease-in-out infinite',
                        'spin-slow': 'spin 8s ease-in-out infinite',
                        'fade-in': 'fadeIn 1s ease-in-out',
                        'slide-up': 'slideUp 0.8s ease-in-out',
                        'scale-in': 'scaleIn 0.5s ease-in-out',
                        'wave': 'wave 2s ease-in-out infinite',
                        'shimmer': 'shimmer 2s ease-in-out infinite',
                        'progress': 'progress 2s ease-in-out forwards',
                        'ai-thinking': 'aiThinking 3s ease-in-out infinite',
                        'float-slow': 'float 10s ease-in-out infinite',
                        'drift': 'drift 12s ease-in-out infinite',
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
                                opacity: '0',
                                transform: 'translateY(10px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
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
                        },
                        drift: {
                            '0%, 100%': {
                                transform: 'translateX(0px) translateY(0px)'
                            },
                            '25%': {
                                transform: 'translateX(5px) translateY(-5px)'
                            },
                            '50%': {
                                transform: 'translateX(-5px) translateY(5px)'
                            },
                            '75%': {
                                transform: 'translateX(3px) translateY(-3px)'
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
            animation: gradient 8s ease-in-out infinite;
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
            animation: shimmer 2s ease-in-out infinite;
        }

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float-slow 10s ease-in-out infinite, drift 12s ease-in-out infinite;
            transform: translateZ(0); /* Hardware acceleration */
        }

        .bubble:nth-child(1) {
            width: 80px;
            height: 80px;
            left: 10%;
            animation-delay: 0s, 0s;
        }

        .bubble:nth-child(2) {
            width: 60px;
            height: 60px;
            left: 30%;
            animation-delay: 2s, 1s;
        }

        .bubble:nth-child(3) {
            width: 100px;
            height: 100px;
            left: 60%;
            animation-delay: 4s, 2s;
        }

        .bubble:nth-child(4) {
            width: 40px;
            height: 40px;
            left: 80%;
            animation-delay: 6s, 3s;
        }

        .stagger-animation>* {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeIn 0.8s ease-in-out forwards;
            transform: translateZ(0);
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
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .btn-primary {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            background-size: 200% 200%;
            animation: gradient 3s ease-in-out infinite;
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.3);
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
            box-shadow: 0 10px 15px rgba(59, 130, 246, 0.4);
            transform: translateY(-2px);
        }

        .hover-lift:hover {
            transform: translateY(-2px) scale(1.05);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
            animation: fadeIn 1s ease-in-out;
        }

        .animate-slide-up {
            animation: slideUp 0.8s ease-in-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-in-out;
        }

        .animate-bounce-slow {
            animation: bounce 3s ease-in-out infinite;
        }

        .faq-item {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.3s ease-in-out;
        }

        .faq-item:hover {
            background-color: rgba(56, 189, 248, 0.05);
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-question {
            cursor: pointer;
            padding: 1.5rem 0;
            font-size: 1.125rem;
            font-weight: 600;
            color: #111827;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .faq-question:hover {
            color: #38bdf8;
        }

        .faq-answer {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding-bottom: 1rem;
        }

        .faq-answer.open {
            max-height: 500px;
        }

        .nav-link {
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 50%;
            background: linear-gradient(90deg, #38bdf8, #0ea5e9);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Additional fluid animations */
        .feature-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .feature-card:hover {
            transform: translateY(-8px) rotate(1deg);
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
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md">
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
                        class="inline-flex items-center justify-center w-10 h-10 rounded-md text-gray-700 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-300">
                        <span class="material-icons">menu</span>
                    </button>
                </div>
            </div>
            <!-- Mobile Navigation Menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-md rounded-lg mt-2 shadow-lg border">
                    <a href="{{ route('welcome') }}"
                            class="nav-link text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">
                            Dashboard
                        </a>
                    <a href="{{ route('about') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md transition-all duration-300">
                        Tentang
                    </a>
                    <a href="{{ route('help') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md transition-all duration-300">
                        Bantuan
                    </a>
                    <a href="{{ route('contact') }}"
                        class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md transition-all duration-300">
                        Kontak
                    </a>
                        <a href="{{ route('login.form') }}"
                            class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 rounded-md transition-all duration-300">
                            Masuk
                        </a>
                            <a href="{{ route('register.form') }}"
                                class="block px-3 py-2 text-base font-medium btn-primary text-white rounded-md text-center mt-2 transition-all duration-300">
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
            <div class="text-center animate-fade-in">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-shadow">
                    Pusat
                    <span class="block text-gradient animate-wave">Bantuan</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mt-6 leading-relaxed drop-shadow-md max-w-4xl mx-auto animate-slide-up">
                    Temukan jawaban atas pertanyaan Anda dan pelajari cara menggunakan AI Study Planner secara maksimal.
                </p>
            </div>
        </div>
    </section>


    <!-- FAQ Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Pertanyaan yang Sering Diajukan
                </h2>
                <p class="text-xl text-gray-600 animate-slide-up">
                    Jawaban untuk pertanyaan umum tentang AI Study Planner
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl overflow-hidden relative">
                <!-- Decorative Animated Circles -->
                <div class="absolute top-0 left-0 w-16 h-16 bg-blue-100 rounded-full animate-float opacity-40 z-0"></div>
                <div class="absolute bottom-0 right-0 w-24 h-24 bg-cyan-100 rounded-full animate-float-slow opacity-30 z-0"></div>
                <div class="absolute top-1/2 left-0 w-10 h-10 bg-blue-200 rounded-full animate-drift opacity-20 z-0"></div>
                <div class="absolute bottom-1/3 right-0 w-8 h-8 bg-blue-300 rounded-full animate-drift opacity-20 z-0"></div>

                <div class="relative z-10 stagger-animation">
                    <!-- FAQ Item 1 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(1)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-sky-400 animate-bounce-slow">person_add</span>
                                Bagaimana cara mendaftar akun baru?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-1">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-1">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">Untuk mendaftar akun baru:</p>
                                <ol class="list-decimal list-inside text-gray-600 space-y-2">
                                    <li>Klik tombol <span class="btn-primary px-2 py-1 rounded text-white text-xs">Daftar</span> di halaman utama</li>
                                    <li>Isi informasi: nama lengkap, email valid, dan password yang kuat</li>
                                    <li>Klik "Daftar" untuk membuat akun</li>
                                    <li>Sistem akan otomatis login dan mengarahkan ke dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(2)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-green-400 animate-spin-slow">psychology</span>
                                Bagaimana AI menentukan prioritas tugas?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-2">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-2">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">AI menganalisis beberapa faktor:</p>
                                <ul class="list-disc list-inside text-gray-600 space-y-2">
                                    <li><strong>Deadline:</strong> Tugas dengan deadline lebih dekat mendapat prioritas lebih tinggi</li>
                                    <li><strong>Kesulitan:</strong> Tingkat kesulitan yang Anda tetapkan</li>
                                    <li><strong>Bobot nilai:</strong> Persentase terhadap nilai akhir</li>
                                    <li><strong>Kompetensi diri:</strong> Tingkat keyakinan Anda dalam mengerjakan tugas</li>
                                    <li><strong>Estimasi waktu:</strong> Lama waktu yang dibutuhkan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(3)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-pink-400 animate-wave">timer</span>
                                Apa itu Teknik Pomodoro dan bagaimana cara kerjanya?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-3">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-3">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">Teknik Pomodoro adalah metode fokus yang terstruktur:</p>
                                <ul class="list-disc list-inside text-gray-600 space-y-2">
                                    <li><strong>Fokus 25 menit:</strong> Kerjakan tugas tanpa distraksi</li>
                                    <li><strong>Istirahat 5 menit:</strong> Beristirahat sejenak untuk recovery</li>
                                    <li><strong>Setelah 4 siklus:</strong> Istirahat lebih lama (15-30 menit)</li>
                                    <li><strong>Manfaat:</strong> Meningkatkan konsentrasi dan mengurangi kelelahan</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(4)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-purple-400 animate-float">settings</span>
                                Bagaimana cara mengubah preferensi belajar?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-4">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-4">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">Untuk mengubah preferensi belajar:</p>
                                <ol class="list-decimal list-inside text-gray-600 space-y-2">
                                    <li>Login ke akun Anda</li>
                                    <li>Klik menu <span class="bg-blue-100 px-2 py-1 rounded text-blue-700 text-xs">Preferences</span> di sidebar</li>
                                    <li>Atur jadwal belajar harian Anda</li>
                                    <li>Tentukan durasi fokus dan istirahat Pomodoro</li>
                                    <li>Maksimal blok belajar per hari</li>
                                    <li>Klik <span class="btn-primary px-2 py-1 rounded text-white text-xs">Save</span> untuk menyimpan perubahan</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(5)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-orange-400 animate-bounce-slow">security</span>
                                Apakah data saya aman dan terlindungi?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-5">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-5">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">Keamanan data adalah prioritas utama kami:</p>
                                <ul class="list-disc list-inside text-gray-600 space-y-2">
                                    <li><strong>Enkripsi:</strong> Semua data dienkripsi saat transit dan penyimpanan</li>
                                    <li><strong>Privasi:</strong> Data hanya digunakan untuk keperluan aplikasi</li>
                                    <li><strong>Akses terbatas:</strong> Hanya Anda yang dapat mengakses data pribadi</li>
                                    <li><strong>Backup rutin:</strong> Data dicadangkan secara berkala</li>
                                    <li><strong>Compliance:</strong> Mengikuti standar keamanan industri</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="faq-item feature-card">
                        <div class="faq-question flex items-center" onclick="toggleFAQ(6)">
                            <span class="flex items-center gap-2">
                                <span class="material-icons text-cyan-400 animate-spin-slow">psychology</span>
                                Bagaimana cara menggunakan fitur AI Coach?
                            </span>
                            <span class="material-icons transform transition-transform duration-300 ease-in-out"
                                id="icon-6">expand_more</span>
                        </div>
                        <div class="faq-answer" id="answer-6">
                            <div class="px-6 pb-6">
                                <p class="text-gray-600 mb-4">Fitur AI Coach memberikan saran personal:</p>
                                <ol class="list-decimal list-inside text-gray-600 space-y-2">
                                    <li>Klik ikon <span class="material-icons text-cyan-400 align-middle">psychology</span> pada tugas tertentu</li>
                                    <li>AI akan menganalisis tingkat kesulitan tugas</li>
                                    <li>Mendapatkan tips belajar yang disesuaikan</li>
                                    <li>Saran berdasarkan gaya belajar Anda</li>
                                    <li>Rekomendasi sumber daya tambahan</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detailed Guides Section -->
    <section class="py-24 bg-white" id="getting-started">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 animate-fade-in">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    Panduan Lengkap
                </h2>
                <p class="text-xl text-gray-600 animate-slide-up">
                    Panduan detail untuk memaksimalkan penggunaan AI Study Planner
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Getting Started Guide -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-8 rounded-xl border border-blue-100 animate-scale-in">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mr-4 animate-spin-slow">
                                <span class="material-icons text-white">flag</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Langkah 1: Persiapan Awal</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.2s;">
                                <span class="material-icons text-blue-500 mr-3 mt-1">person_add</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Buat Akun</h4>
                                    <p class="text-gray-600 text-sm">Daftar akun baru atau login jika sudah memiliki
                                        akun</p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.4s;">
                                <span class="material-icons text-blue-500 mr-3 mt-1">settings</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Atur Preferensi</h4>
                                    <p class="text-gray-600 text-sm">Sesuaikan jadwal belajar dan pengaturan Pomodoro
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.6s;">
                                <span class="material-icons text-blue-500 mr-3 mt-1">assignment</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Tambah Tugas</h4>
                                    <p class="text-gray-600 text-sm">Input semua tugas yang perlu dikerjakan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-xl border border-green-100 animate-scale-in" style="animation-delay: 0.3s;">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mr-4 animate-spin-slow">
                                <span class="material-icons text-white">psychology</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Langkah 2: AI Processing</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.5s;">
                                <span class="material-icons text-green-500 mr-3 mt-1">analytics</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Score Tasks with AI</h4>
                                    <p class="text-gray-600 text-sm">Biarkan AI menghitung prioritas tugas secara
                                        otomatis</p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.7s;">
                                <span class="material-icons text-green-500 mr-3 mt-1">schedule</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Generate Schedule</h4>
                                    <p class="text-gray-600 text-sm">Buat jadwal belajar optimal untuk 7 hari ke depan
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.9s;">
                                <span class="material-icons text-green-500 mr-3 mt-1">visibility</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Review & Adjust</h4>
                                    <p class="text-gray-600 text-sm">Periksa jadwal dan lakukan penyesuaian jika
                                        diperlukan</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Daily Usage Guide -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-purple-50 to-pink-50 p-8 rounded-xl border border-purple-100 animate-scale-in" style="animation-delay: 0.4s;">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mr-4 animate-spin-slow">
                                <span class="material-icons text-white">today</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Penggunaan Harian</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.6s;">
                                <span class="material-icons text-purple-500 mr-3 mt-1">notifications</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Reminder Email</h4>
                                    <p class="text-gray-600 text-sm">Terima pengingat 15 menit sebelum waktu belajar
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.8s;">
                                <span class="material-icons text-purple-500 mr-3 mt-1">timer</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Teknik Pomodoro</h4>
                                    <p class="text-gray-600 text-sm">Ikuti siklus fokus 25 menit dan istirahat 5 menit
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 1s;">
                                <span class="material-icons text-purple-500 mr-3 mt-1">check_circle</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Mark Complete</h4>
                                    <p class="text-gray-600 text-sm">Tandai blok belajar yang telah selesai</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-50 to-red-50 p-8 rounded-xl border border-orange-100 animate-scale-in" style="animation-delay: 0.5s;">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-orange-500 rounded-lg flex items-center justify-center mr-4 animate-spin-slow">
                                <span class="material-icons text-white">insights</span>
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900">Monitoring Progress</h3>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.7s;">
                                <span class="material-icons text-orange-500 mr-3 mt-1">dashboard</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Dashboard Analytics</h4>
                                    <p class="text-gray-600 text-sm">Pantau statistik harian dan mingguan</p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 0.9s;">
                                <span class="material-icons text-orange-500 mr-3 mt-1">psychology</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">AI Coach</h4>
                                    <p class="text-gray-600 text-sm">Dapatkan tips personal dari AI untuk tugas
                                        spesifik</p>
                                </div>
                            </div>
                            <div class="flex items-start animate-fade-in" style="animation-delay: 1.1s;">
                                <span class="material-icons text-orange-500 mr-3 mt-1">update</span>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Update Regularly</h4>
                                    <p class="text-gray-600 text-sm">Perbarui preferensi dan tugas sesuai kebutuhan</p>
                                </div>
                            </div>
                        </div>
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
                        class="w-6 h-6 sm:w-8 sm:h-8 bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg flex items-center justify-center mr-2 sm:mr-3 hover-lift">
                        <span class="text-white font-bold text-xs sm:text-sm">ASP</span>
                    </div>
                    <span class="text-gray-600 text-sm sm:text-base text-center">© 2025 AI Study Planner. Dibuat secara profesional untuk pelajar.</span>
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

        function toggleFAQ(id) {
            const answer = document.getElementById(`answer-${id}`);
            const icon = document.getElementById(`icon-${id}`);

            if (answer.classList.contains('open')) {
                answer.classList.remove('open');
                icon.style.transform = 'rotate(0deg)';
            } else {
                answer.classList.add('open');
                icon.style.transform = 'rotate(180deg)';
            }
        }
    </script>
</body>

</html>
