@extends('layouts.base')

@section('title', 'Panduan Lengkap AI Study Planner')

@section('content')
    <!-- Hero Section -->
    <section class="tech-bg text-white relative overflow-hidden">
        <!-- Animated Bubbles -->
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold leading-tight text-shadow">
                    Panduan Lengkap
                    <span class="block text-gradient animate-wave">AI Study Planner</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                    Pelajari cara menggunakan semua fitur AI Study Planner untuk merencanakan dan mengelola studi Anda
                    secara optimal.
                </p>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Daftar Akun -->
                    <div
                        class="feature-card bg-gradient-to-br from-sky-50 to-blue-50 p-8 rounded-xl border border-sky-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-sky-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">person_add</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Daftar Akun & Login</h3>
                        <p class="text-gray-600 mb-4">Langkah pertama untuk mulai menggunakan planner</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Klik menu "Register" di halaman utama</li>
                            <li>• Isi informasi: Nama, Email, Password</li>
                            <li>• Sistem akan otomatis login ke dashboard</li>
                        </ul>
                    </div>

                    <!-- Pengaturan Preferensi -->
                    <div
                        class="feature-card bg-gradient-to-br from-cyan-50 to-sky-50 p-8 rounded-xl border border-cyan-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">settings</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Atur Preferensi Belajar</h3>
                        <p class="text-gray-600 mb-4">Sesuaikan pengaturan belajar sesuai kebutuhan Anda</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Pilih hari dan waktu belajar</li>
                            <li>• Atur durasi fokus dan istirahat</li>
                            <li>• Maksimal blok belajar per hari</li>
                        </ul>
                    </div>

                    <!-- Manajemen Tugas -->
                    <div
                        class="feature-card bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border border-blue-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">assignment</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Kelola Tugas Belajar</h3>
                        <p class="text-gray-600 mb-4">Tambahkan dan atur semua tugas akademik Anda</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Tambah tugas dengan detail lengkap</li>
                            <li>• AI hitung prioritas otomatis</li>
                            <li>• Edit dan hapus tugas kapan saja</li>
                        </ul>
                    </div>

                    <!-- Penjadwalan Otomatis -->
                    <div
                        class="feature-card bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-xl border border-teal-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">schedule</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Jadwal Otomatis</h3>
                        <p class="text-gray-600 mb-4">Biarkan AI membuat jadwal optimal untuk Anda</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Analisis prioritas dan waktu tersedia</li>
                            <li>• Teknik Pomodoro terintegrasi</li>
                            <li>• Validasi jadwal tanpa tabrakan</li>
                        </ul>
                    </div>

                    <!-- Mengelola Blok Belajar -->
                    <div
                        class="feature-card bg-gradient-to-br from-sky-50 to-blue-50 p-8 rounded-xl border border-sky-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-sky-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">check_circle</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Pantau Progress</h3>
                        <p class="text-gray-600 mb-4">Kelola dan update progress belajar harian</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Tandai blok belajar selesai</li>
                            <li>• Lihat jadwal harian lengkap</li>
                            <li>• Track waktu fokus dan produktivitas</li>
                        </ul>
                    </div>

                    <!-- Reminder Email -->
                    <div
                        class="feature-card bg-gradient-to-br from-cyan-50 to-sky-50 p-8 rounded-xl border border-cyan-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">notifications</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Reminder Otomatis</h3>
                        <p class="text-gray-600 mb-4">Dapatkan pengingat sebelum waktu belajar</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Email 15 menit sebelum jadwal</li>
                            <li>• Detail tugas dan tips belajar</li>
                            <li>• Pengiriman tepat waktu otomatis</li>
                        </ul>
                    </div>

                    <!-- Konsultasi AI -->
                    <div
                        class="feature-card bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border border-blue-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">psychology</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">AI Coach</h3>
                        <p class="text-gray-600 mb-4">Dapatkan tips dan saran dari AI</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Penjelasan prioritas tugas</li>
                            <li>• Tips berdasarkan kesulitan</li>
                            <li>• Saran disesuaikan gaya belajar</li>
                        </ul>
                    </div>

                    <!-- Dashboard & Analytics -->
                    <div
                        class="feature-card bg-gradient-to-br from-teal-50 to-cyan-50 p-8 rounded-xl border border-teal-100 card-hover">
                        <div class="feature-icon w-12 h-12 bg-teal-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">analytics</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3">Dashboard Analytics</h3>
                        <p class="text-gray-600 mb-4">Pantau progress dan performa belajar</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            <li>• Statistik harian dan mingguan</li>
                            <li>• Tren produktivitas</li>
                            <li>• Rekomendasi perbaikan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tips Section -->
    <section class="py-24 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4 animate-fade-in">
                    Tips Sukses Menggunakan AI Study Planner
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto animate-slide-up">
                    Maksimalkan produktivitas belajar Anda dengan tips dan strategi yang telah terbukti efektif
                </p>
            </div>

            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Teknik Belajar Efektif -->
                    <div class="feature-card bg-gradient-to-br from-green-50 to-emerald-50 p-8 rounded-xl border border-green-100 card-hover animate-scale-in">
                        <div class="feature-icon w-12 h-12 bg-green-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">school</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Teknik Belajar Efektif</h3>
                        <ul class="text-gray-600 space-y-3">
                            <li class="flex items-start">
                                <span class="material-icons text-green-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Gunakan teknik Pomodoro (25 menit fokus, 5 menit istirahat)</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-green-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Tetapkan prioritas berdasarkan deadline dan kesulitan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-green-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Jaga konsistensi belajar setiap hari</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-green-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Istirahat cukup untuk menjaga produktivitas</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-green-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Review progress mingguan secara rutin</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Optimasi Penggunaan -->
                    <div class="feature-card bg-gradient-to-br from-blue-50 to-indigo-50 p-8 rounded-xl border border-blue-100 card-hover animate-scale-in">
                        <div class="feature-icon w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-6">
                            <span class="material-icons text-white">settings_suggest</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Optimasi Penggunaan</h3>
                        <ul class="text-gray-600 space-y-3">
                            <li class="flex items-start">
                                <span class="material-icons text-blue-500 mr-3 mt-0.5 text-sm">update</span>
                                <span>Update preferensi saat rutinitas berubah</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-blue-500 mr-3 mt-0.5 text-sm">psychology</span>
                                <span>Manfaatkan penjelasan AI untuk memahami prioritas</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-blue-500 mr-3 mt-0.5 text-sm">check_circle</span>
                                <span>Tandai blok selesai segera setelah fokus berakhir</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-blue-500 mr-3 mt-0.5 text-sm">notifications</span>
                                <span>Gunakan reminder email untuk mengingatkan jadwal</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-icons text-blue-500 mr-3 mt-0.5 text-sm">analytics</span>
                                <span>Monitor dashboard untuk melihat pola produktivitas</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
