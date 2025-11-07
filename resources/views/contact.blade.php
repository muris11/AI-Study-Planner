<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak AI Study Planner - Hubungi Kami</title>
    <meta name="description"
        content="Hubungi tim AI Study Planner untuk dukungan, pertanyaan, atau saran. Kami siap membantu Anda mengoptimalkan pengalaman belajar.">
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

        .contact-form input,
        .contact-form textarea,
        .contact-form select {
            transition: all 0.3s ease;
            border: 2px solid #e5e7eb;
        }

        .contact-form input:focus,
        .contact-form textarea:focus,
        .contact-form select:focus {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
            border-color: #3b82f6;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .contact-form input:hover,
        .contact-form textarea:hover,
        .contact-form select:hover {
            border-color: #93c5fd;
            transform: translateY(-1px);
        }

        .feature-card {
            transition: all 0.3s ease;
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
            transition: left 0.5s;
        }

        .feature-card:hover::before {
            left: 100%;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .feature-icon {
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            transform: scale(1.1) rotate(5deg);
            animation: bounce-slow 1s ease-in-out;
        }

        .info-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        .map-overlay {
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(14, 165, 233, 0.1));
            animation: shimmer 3s ease-in-out infinite;
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

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight text-shadow">
                    Hubungi
                    <span class="block text-gradient animate-wave">Kami</span>
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mt-6 leading-relaxed drop-shadow-md max-w-4xl mx-auto">
                    Punya pertanyaan, saran, atau butuh bantuan? Tim kami siap membantu Anda mengoptimalkan
                    pengalaman belajar dengan AI Study Planner.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 animate-fade-in">
                    Berbagai Cara Menghubungi Kami
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto animate-slide-up">
                    Pilih cara yang paling nyaman untuk Anda. Kami berkomitmen memberikan respons cepat dan solusi
                    terbaik.
                </p>
            </div>
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                        <!-- Contact Form -->
                        <div
                            class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100 card-hover animate-scale-in">
                            <div class="text-center mb-8">
                                <div
                                    class="w-16 h-16 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce-slow">
                                    <span class="material-icons text-white text-2xl">send</span>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-2 animate-fade-in">Kirim Pesan</h3>
                                <p class="text-gray-600 animate-slide-up">Kami akan merespons dalam 24 jam</p>
                            </div>

                            <form class="contact-form space-y-6" id="wa-contact-form">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="animate-slide-up">
                                        <label for="first_name"
                                            class="block text-sm font-medium text-gray-700 mb-2">Nama
                                            Depan</label>
                                        <input type="text" id="first_name" name="first_name"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-400"
                                            required>
                                    </div>
                                    <div class="animate-slide-up" style="animation-delay: 0.1s">
                                        <label for="last_name"
                                            class="block text-sm font-medium text-gray-700 mb-2">Nama
                                            Belakang</label>
                                        <input type="text" id="last_name" name="last_name"
                                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-400"
                                            required>
                                    </div>
                                </div>

                                <div class="animate-slide-up" style="animation-delay: 0.2s">
                                    <label for="email"
                                        class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" name="email"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-400"
                                        required>
                                </div>

                                <div class="animate-slide-up" style="animation-delay: 0.3s">
                                    <label for="subject"
                                        class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                                    <select id="subject" name="subject"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:border-blue-400"
                                        required>
                                        <option value="">Pilih subjek</option>
                                        <option value="support">Dukungan Teknis</option>
                                        <option value="feature">Permintaan Fitur</option>
                                        <option value="bug">Laporan Bug</option>
                                        <option value="billing">Pertanyaan Billing</option>
                                        <option value="partnership">Partnership</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>

                                <div class="animate-slide-up" style="animation-delay: 0.4s">
                                    <label for="message"
                                        class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                                    <textarea id="message" name="message" rows="6"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-vertical transition-all duration-200 hover:border-blue-400"
                                        placeholder="Jelaskan pertanyaan atau masalah Anda secara detail..." required></textarea>
                                </div>

                                <div class="animate-slide-up" style="animation-delay: 0.5s">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="newsletter"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500 transition-all duration-200">
                                        <span class="ml-2 text-sm text-gray-600">Saya ingin menerima update dan tips
                                            belajar
                                            dari AI Study Planner</span>
                                    </label>
                                </div>

                                <div class="animate-slide-up" style="animation-delay: 0.6s">
                                    <button type="submit"
                                        class="w-full btn-primary text-white py-3 px-6 rounded-lg font-semibold text-center hover-lift transition-all duration-200 transform hover:scale-105">
                                        <span class="flex items-center justify-center">
                                            <span class="material-icons mr-2">send</span>
                                            Kirim Pesan
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Contact Info & FAQ -->
                        <div class="space-y-8">
                            <!-- Response Time -->
                            <div
                                class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 card-hover animate-scale-in">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-4 animate-pulse-slow">
                                        <span class="material-icons text-white">schedule</span>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Waktu Response</h4>
                                        <p class="text-gray-600 text-sm">Kami berkomitmen memberikan respons cepat</p>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div
                                        class="flex justify-between items-center p-3 bg-green-50 rounded-lg animate-fade-in">
                                        <span class="text-gray-600 font-medium">Email Support</span>
                                        <span
                                            class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">1-2
                                            jam</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-blue-50 rounded-lg animate-fade-in"
                                        style="animation-delay: 0.1s">
                                        <span class="text-gray-600 font-medium">Live Chat</span>
                                        <span
                                            class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">5
                                            menit</span>
                                    </div>
                                    <div class="flex justify-between items-center p-3 bg-orange-50 rounded-lg animate-fade-in"
                                        style="animation-delay: 0.2s">
                                        <span class="text-gray-600 font-medium">Bug Reports</span>
                                        <span
                                            class="bg-orange-100 text-orange-800 px-2 py-1 rounded-full text-xs font-medium">4-6
                                            jam</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Office Hours -->
                            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 card-hover animate-scale-in"
                                style="animation-delay: 0.1s">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-lg flex items-center justify-center mr-4 animate-pulse-slow">
                                        <span class="material-icons text-white">business</span>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Jam Operasional</h4>
                                        <p class="text-gray-600 text-sm">Tim dukungan kami tersedia</p>
                                    </div>
                                </div>
                                <div class="space-y-2 text-sm">
                                    <div
                                        class="flex justify-between p-2 hover:bg-gray-50 rounded-lg transition-colors duration-200 animate-slide-up">
                                        <span class="text-gray-600 font-medium">Senin - Jumat</span>
                                        <span class="font-semibold text-gray-900">08:00 - 18:00 WIB</span>
                                    </div>
                                    <div class="flex justify-between p-2 hover:bg-gray-50 rounded-lg transition-colors duration-200 animate-slide-up"
                                        style="animation-delay: 0.1s">
                                        <span class="text-gray-600 font-medium">Sabtu</span>
                                        <span class="font-semibold text-gray-900">09:00 - 15:00 WIB</span>
                                    </div>
                                    <div class="flex justify-between p-2 hover:bg-gray-50 rounded-lg transition-colors duration-200 animate-slide-up"
                                        style="animation-delay: 0.2s">
                                        <span class="text-gray-600 font-medium">Minggu</span>
                                        <span class="font-semibold text-gray-900">Libur</span>
                                    </div>
                                    <div class="flex justify-between p-2 hover:bg-green-50 rounded-lg transition-colors duration-200 animate-slide-up"
                                        style="animation-delay: 0.3s">
                                        <span class="text-gray-600 font-medium">Live Chat</span>
                                        <span class="font-semibold text-green-700">24/7</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick FAQ -->
                            <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 card-hover animate-scale-in"
                                style="animation-delay: 0.2s">
                                <div class="flex items-center mb-4">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-4 animate-pulse-slow">
                                        <span class="material-icons text-white">help</span>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">FAQ Cepat</h4>
                                        <p class="text-gray-600 text-sm">Pertanyaan yang sering ditanyakan</p>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div
                                        class="border-b border-gray-100 pb-3 hover:bg-gray-50 p-2 rounded-lg transition-colors duration-200 animate-fade-in">
                                        <h5 class="font-medium text-gray-900 text-sm mb-1">Bagaimana cara reset
                                            password?</h5>
                                        <p class="text-gray-600 text-xs">Klik "Lupa Password" di halaman login dan
                                            ikuti
                                            instruksi yang dikirim ke email Anda.</p>
                                    </div>
                                    <div class="border-b border-gray-100 pb-3 hover:bg-gray-50 p-2 rounded-lg transition-colors duration-200 animate-fade-in"
                                        style="animation-delay: 0.1s">
                                        <h5 class="font-medium text-gray-900 text-sm mb-1">Apakah data saya aman?</h5>
                                        <p class="text-gray-600 text-xs">Ya, kami menggunakan enkripsi tingkat
                                            enterprise dan
                                            tidak pernah membagikan data pribadi Anda.</p>
                                    </div>
                                    <div class="hover:bg-gray-50 p-2 rounded-lg transition-colors duration-200 animate-fade-in"
                                        style="animation-delay: 0.2s">
                                        <h5 class="font-medium text-gray-900 text-sm mb-1">Bagaimana cara upgrade akun?
                                        </h5>
                                        <p class="text-gray-600 text-xs">Kunjungi halaman Billing di dashboard Anda
                                            untuk
                                            melihat opsi upgrade yang tersedia.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Map Section -->
            <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
                <!-- Background Pattern -->
                <div class="absolute inset-0 opacity-5">
                    <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="60"
                        height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none"
                        fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.1"%3E%3Cpath
                        d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"
                        /%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
                </div>

                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                    <div class="text-center mb-16">
                        <div
                            class="w-20 h-20 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-slow">
                            <span class="material-icons text-white text-3xl">location_on</span>
                        </div>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 animate-fade-in">
                            Temukan Kami
                        </h2>
                        <p class="text-xl text-gray-600 animate-slide-up max-w-2xl mx-auto">
                            Kantor pusat AI Study Planner di Jakarta, Indonesia. Kunjungi kami untuk diskusi lebih
                            lanjut.
                        </p>
                    </div>

                    <div
                        class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200 card-hover animate-scale-in">
                        <div class="relative h-96 overflow-hidden">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3966.5!2d108.2826476!3d-6.4039557!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6eb9207d187cef%3A0x7c65710cfaff56f4!2sKost+Cipelang!5e0!3m2!1sen!2sid!4v1630000000000!5m2!1sen!2sid"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <div
                                class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg p-3 shadow-lg animate-slide-up">
                                <div class="flex items-center">
                                    <div
                                        class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center mr-3">
                                        <span class="material-icons text-white text-sm">location_on</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900">Lokasi Kantor</p>
                                        <p class="text-xs text-gray-600">Bekasi, Indonesia</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 animate-fade-in"
                        style="animation-delay: 0.3s">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center card-hover">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-white">location_on</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Alamat</h3>
                            <p class="text-gray-600 text-sm">Kost Cipelang, Bekasi<br>Indonesia</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center card-hover">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-white">business</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Kantor</h3>
                            <p class="text-gray-600 text-sm">Kost Rifqy<br>Development Center</p>
                        </div>
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 text-center card-hover">
                            <div
                                class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-white">phone</span>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Kontak</h3>
                            <p class="text-gray-600 text-sm">+62 857 7381 8846<br>WhatsApp Business</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="bg-gray-50 border-t w-full mt-auto">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
                    <div class="flex flex-col sm:flex-row justify-center items-center">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <div
                                class="w-6 h-6 sm:w-8 sm:h-8 bg-gradient-to-r from-sky-400 to-blue-500 rounded-lg flex items-center justify-center mr-2 sm:mr-3">
                                <span class="text-white font-bold text-xs sm:text-sm">ASP</span>
                            </div>
                            <span class="text-gray-600 text-sm sm:text-base text-center">© 2025 AI Study Planner.
                                Dibuat secara
                                profesional untuk pelajar.</span>
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

                function startChat() {
                    // Implementasi live chat akan ditambahkan nanti
                    alert('Fitur Live Chat akan segera hadir! Untuk saat ini, silakan gunakan email support.');
                }

                // Form validation and submission
                document.getElementById('wa-contact-form').addEventListener('submit', function(e) {
                    e.preventDefault();

                    // Basic form validation
                    const formData = new FormData(this);
                    const data = Object.fromEntries(formData);

                    // Construct WhatsApp message
                    const message =
                        `*Pesan dari Kontak Form:*\n\nNama: ${data.first_name} ${data.last_name}\nEmail: ${data.email}\nSubjek: ${data.subject}\nPesan: ${data.message}\nNewsletter: ${data.newsletter ? 'Ya' : 'Tidak'}`;

                    // WhatsApp URL
                    const whatsappUrl = `https://wa.me/6285773818846?text=${encodeURIComponent(message)}`;

                    // Open WhatsApp
                    window.open(whatsappUrl, '_blank');

                    // Show success message
                    alert('Terima kasih! Pesan Anda telah dikirim via WhatsApp. Tim kami akan segera menghubungi Anda.');

                    // Reset form
                    this.reset();
                });
            </script>
</body>

</html>
