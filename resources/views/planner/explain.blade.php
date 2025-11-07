@extends('layouts.base')
@section('title', 'Penjelasan Prioritas AI - AI Study Planner')

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
                    Analisis Prioritas
                    <span class="block text-gradient animate-wave">AI</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                    Lihat bagaimana AI menghitung prioritas tugas Anda berdasarkan berbagai faktor.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if (!$task->priority_components)
                <!-- No Priority Calculated -->
                <div class="text-center py-16">
                    <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <span class="material-icons text-yellow-600 text-3xl">calculate</span>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Prioritas Belum Dihitung</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">
                        AI belum menghitung prioritas untuk tugas ini. Kembali ke dashboard dan klik tombol "Hitung
                        Prioritas AI".
                    </p>
                    <a href="{{ route('planner.dashboard') }}"
                        class="btn-primary text-white px-6 py-3 rounded-lg font-semibold hover-lift inline-flex items-center">
                        <span class="material-icons mr-2">dashboard</span>
                        Kembali ke Dashboard
                    </a>
                </div>
            @else
                <!-- Task Title Card -->
                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 rounded-2xl p-8 text-white mb-8">
                    <div class="flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold mb-2">{{ $task->title }}</h2>
                            <div class="flex items-center space-x-4 text-indigo-100">
                                <span class="flex items-center">
                                    <span class="material-icons mr-1 text-sm">category</span>
                                    {{ ucfirst($task->type) }}
                                </span>
                                @if ($task->due_at)
                                    <span class="flex items-center">
                                        <span class="material-icons mr-1 text-sm">schedule</span>
                                        {{ $task->due_at->format('d M Y') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="text-3xl font-bold mb-1">
                                {{ number_format($task->priority_components['p_final'] ?? 0, 1) }}</div>
                            <div class="text-sm text-indigo-100">Skor Prioritas</div>
                        </div>
                    </div>
                </div>

                @php
                    $c = $task->priority_components;
                    function getUrgencyLabel($score)
                    {
                        if ($score < 0.1) {
                            return [
                                'label' => 'Sangat Rendah',
                                'color' => 'bg-gray-100 border-gray-200',
                                'text' => 'Tidak mendesak',
                                'icon' => 'schedule',
                                'colorClass' => 'text-gray-600',
                            ];
                        }
                        if ($score < 0.3) {
                            return [
                                'label' => 'Rendah',
                                'color' => 'bg-blue-100 border-blue-200',
                                'text' => 'Kurang mendesak',
                                'icon' => 'schedule',
                                'colorClass' => 'text-blue-600',
                            ];
                        }
                        if ($score < 0.7) {
                            return [
                                'label' => 'Sedang',
                                'color' => 'bg-yellow-100 border-yellow-200',
                                'text' => 'Cukup mendesak',
                                'icon' => 'warning',
                                'colorClass' => 'text-yellow-600',
                            ];
                        }
                        if ($score < 0.9) {
                            return [
                                'label' => 'Tinggi',
                                'color' => 'bg-orange-100 border-orange-200',
                                'text' => 'Mendesak',
                                'icon' => 'error',
                                'colorClass' => 'text-orange-600',
                            ];
                        }
                        return [
                            'label' => 'Sangat Tinggi',
                            'color' => 'bg-red-100 border-red-200',
                            'text' => 'Sangat mendesak',
                            'icon' => 'error',
                            'colorClass' => 'text-red-600',
                        ];
                    }
                    function getImportanceLabel($score)
                    {
                        if ($score < 0.2) {
                            return [
                                'label' => 'Sangat Rendah',
                                'color' => 'bg-gray-100 border-gray-200',
                                'text' => 'Nilai rendah',
                                'icon' => 'grade',
                                'colorClass' => 'text-gray-600',
                            ];
                        }
                        if ($score < 0.4) {
                            return [
                                'label' => 'Rendah',
                                'color' => 'bg-blue-100 border-blue-200',
                                'text' => 'Nilai sedang rendah',
                                'icon' => 'grade',
                                'colorClass' => 'text-blue-600',
                            ];
                        }
                        if ($score < 0.6) {
                            return [
                                'label' => 'Sedang',
                                'color' => 'bg-yellow-100 border-yellow-200',
                                'text' => 'Nilai sedang',
                                'icon' => 'grade',
                                'colorClass' => 'text-yellow-600',
                            ];
                        }
                        if ($score < 0.8) {
                            return [
                                'label' => 'Tinggi',
                                'color' => 'bg-orange-100 border-orange-200',
                                'text' => 'Nilai tinggi',
                                'icon' => 'grade',
                                'colorClass' => 'text-orange-600',
                            ];
                        }
                        return [
                            'label' => 'Sangat Tinggi',
                            'color' => 'bg-red-100 border-red-200',
                            'text' => 'Nilai sangat tinggi',
                            'icon' => 'grade',
                            'colorClass' => 'text-red-600',
                        ];
                    }
                    function getDifficultyLabel($score)
                    {
                        if ($score < 0.2) {
                            return [
                                'label' => 'Sangat Mudah',
                                'color' => 'bg-green-100 border-green-200',
                                'text' => 'Mudah sekali',
                                'icon' => 'lightbulb',
                                'colorClass' => 'text-green-600',
                            ];
                        }
                        if ($score < 0.4) {
                            return [
                                'label' => 'Mudah',
                                'color' => 'bg-green-100 border-green-200',
                                'text' => 'Cukup mudah',
                                'icon' => 'lightbulb',
                                'colorClass' => 'text-green-600',
                            ];
                        }
                        if ($score < 0.6) {
                            return [
                                'label' => 'Sedang',
                                'color' => 'bg-yellow-100 border-yellow-200',
                                'text' => 'Tantangan sedang',
                                'icon' => 'psychology',
                                'colorClass' => 'text-yellow-600',
                            ];
                        }
                        if ($score < 0.8) {
                            return [
                                'label' => 'Sulit',
                                'color' => 'bg-orange-100 border-orange-200',
                                'text' => 'Cukup sulit',
                                'icon' => 'psychology',
                                'colorClass' => 'text-orange-600',
                            ];
                        }
                        return [
                            'label' => 'Sangat Sulit',
                            'color' => 'bg-red-100 border-red-200',
                            'text' => 'Sangat menantang',
                            'icon' => 'psychology',
                            'colorClass' => 'text-red-600',
                        ];
                    }
                    function getCompetencyLabel($score)
                    {
                        if ($score < 0.2) {
                            return [
                                'label' => 'Gap Kecil',
                                'color' => 'bg-green-100 border-green-200',
                                'text' => 'Kompetensi Anda sudah cukup',
                                'icon' => 'school',
                                'colorClass' => 'text-green-600',
                            ];
                        }
                        if ($score < 0.4) {
                            return [
                                'label' => 'Gap Sedang',
                                'color' => 'bg-yellow-100 border-yellow-200',
                                'text' => 'Perlu sedikit persiapan',
                                'icon' => 'school',
                                'colorClass' => 'text-yellow-600',
                            ];
                        }
                        if ($score < 0.6) {
                            return [
                                'label' => 'Gap Besar',
                                'color' => 'bg-orange-100 border-orange-200',
                                'text' => 'Perlu banyak persiapan',
                                'icon' => 'school',
                                'colorClass' => 'text-orange-600',
                            ];
                        }
                        if ($score < 0.8) {
                            return [
                                'label' => 'Gap Sangat Besar',
                                'color' => 'bg-red-100 border-red-200',
                                'text' => 'Perlu belajar banyak',
                                'icon' => 'school',
                                'colorClass' => 'text-red-600',
                            ];
                        }
                        return [
                            'label' => 'Gap Ekstrem',
                            'color' => 'bg-red-100 border-red-200',
                            'text' => 'Perlu pengembangan kompetensi',
                            'icon' => 'school',
                            'colorClass' => 'text-red-600',
                        ];
                    }
                    // Helpers to keep percentages tidy (0%..100%)
                    function pct_clamp($val)
                    {
                        $p = ($val ?? 0) * 100;
                        if ($p < 0) $p = 0;
                        if ($p > 100) $p = 100;
                        return number_format($p, 1);
                    }
                    function pct_width($val)
                    {
                        $p = ($val ?? 0) * 100;
                        if ($p < 0) $p = 0;
                        if ($p > 100) $p = 100;
                        return $p;
                    }
                    $urgency = getUrgencyLabel($c['urgency'] ?? 0);
                    $importance = getImportanceLabel($c['importance'] ?? 0);
                    $difficulty = getDifficultyLabel($c['difficulty'] ?? 0);
                    $competency = getCompetencyLabel($c['competency_gap'] ?? 0);
                @endphp

                <!-- Factors Analysis -->
                <div class="bg-gray-50 rounded-2xl p-8 mb-8">
                    <div class="flex items-center mb-6">
                        <span class="material-icons mr-3 text-indigo-600 text-2xl">analytics</span>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Faktor yang Mempengaruhi Prioritas</h2>
                            <p class="text-gray-600 mt-1">AI menganalisis 4 faktor utama untuk menentukan prioritas tugas
                            </p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Urgency -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border-2 {{ $urgency['color'] }} hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <span
                                        class="material-icons mr-3 {{ $urgency['colorClass'] }} text-2xl">{{ $urgency['icon'] }}</span>
                                    <div>
                                        <h3 class="font-bold text-gray-900">Urgensi</h3>
                                        <p class="text-sm text-gray-900">{{ $urgency['text'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold {{ $urgency['colorClass'] }}">
                                        {{ pct_clamp($c['urgency'] ?? 0) }}%</div>
                                    <div class="text-sm font-medium text-gray-700">{{ $urgency['label'] }}</div>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-400 to-blue-600 h-2 rounded-full transition-all duration-500"
                                    style="width: {{ pct_width($c['urgency'] ?? 0) }}%"></div>
                            </div>
                        </div>

                        <!-- Importance -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border-2 {{ $importance['color'] }} hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <span
                                        class="material-icons mr-3 {{ $importance['colorClass'] }} text-2xl">{{ $importance['icon'] }}</span>
                                    <div>
                                        <h3 class="font-bold text-gray-900">Kepentingan</h3>
                                        <p class="text-sm text-gray-600">{{ $importance['text'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold {{ $importance['colorClass'] }}">
                                        {{ pct_clamp($c['importance'] ?? 0) }}%</div>
                                    <div class="text-sm font-medium text-gray-700">{{ $importance['label'] }}</div>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-purple-400 to-purple-600 h-2 rounded-full transition-all duration-500"
                                    style="width: {{ pct_width($c['importance'] ?? 0) }}%"></div>
                            </div>
                        </div>

                        <!-- Difficulty -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border-2 {{ $difficulty['color'] }} hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <span
                                        class="material-icons mr-3 {{ $difficulty['colorClass'] }} text-2xl">{{ $difficulty['icon'] }}</span>
                                    <div>
                                        <h3 class="font-bold text-gray-900">Kesulitan</h3>
                                        <p class="text-sm text-gray-600">{{ $difficulty['text'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold {{ $difficulty['colorClass'] }}">
                                        {{ pct_clamp($c['difficulty'] ?? 0) }}%</div>
                                    <div class="text-sm font-medium text-gray-700">{{ $difficulty['label'] }}</div>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-400 to-orange-600 h-2 rounded-full transition-all duration-500"
                                    style="width: {{ pct_width($c['difficulty'] ?? 0) }}%"></div>
                            </div>
                        </div>

                        <!-- Competency Gap -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border-2 {{ $competency['color'] }} hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center">
                                    <span
                                        class="material-icons mr-3 {{ $competency['colorClass'] }} text-2xl">{{ $competency['icon'] }}</span>
                                    <div>
                                        <h3 class="font-bold text-gray-900">Gap Kompetensi</h3>
                                        <p class="text-sm text-gray-600">{{ $competency['text'] }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-2xl font-bold {{ $competency['colorClass'] }}">
                                        {{ pct_clamp($c['competency_gap'] ?? 0) }}%</div>
                                    <div class="text-sm font-medium text-gray-700">{{ $competency['label'] }}</div>
                                </div>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-gradient-to-r from-red-400 to-red-600 h-2 rounded-full transition-all duration-500"
                                    style="width: {{ pct_width($c['competency_gap'] ?? 0) }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- AI Explanation -->
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-2xl p-8 border border-gray-200">
                    <div class="flex items-center mb-6">
                        <span class="material-icons mr-3 text-blue-600 text-2xl">smart_toy</span>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Penjelasan AI</h2>
                            <p class="text-gray-600 mt-1">Analisis mendalam dari algoritma prioritas</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl p-6 shadow-sm">
                        <div class="text-gray-900 leading-relaxed">
                            @if (strpos($c['explain'] ?? '', 'deadline tanpa deadline') !== false)
                                <p class="mb-3"><strong>Tugas ini tidak memiliki deadline yang ketat</strong>, sehingga
                                    tingkat urgensinya rendah dan tidak perlu dikerjakan segera.</p>
                            @elseif(strpos($c['explain'] ?? '', 'deadline') !== false)
                                <p class="mb-3"><strong>Tugas ini memiliki deadline yang perlu diperhatikan</strong>,
                                    sehingga mendapat prioritas urgensi yang sesuai.</p>
                            @endif
                            @if (strpos($c['explain'] ?? '', 'bobot') !== false)
                                <p class="mb-3"><strong>Tugas ini memiliki nilai penting yang
                                        {{ $importance['text'] }}</strong>, sehingga berkontribusi signifikan terhadap
                                    prioritas keseluruhan.</p>
                            @endif
                            @if (strpos($c['explain'] ?? '', 'kesulitan') !== false)
                                <p class="mb-3"><strong>Tingkat kesulitannya {{ $difficulty['text'] }}</strong>, yang
                                    mempengaruhi estimasi waktu dan persiapan yang dibutuhkan.</p>
                            @endif
                            @if (strpos($c['explain'] ?? '', 'kompetensi') !== false)
                                <p class="mb-3"><strong>Ada {{ $competency['text'] }} untuk menyelesaikan tugas
                                        ini</strong>, sehingga mempengaruhi prioritas berdasarkan kesiapan Anda.</p>
                            @endif
                            <p class="text-lg font-semibold text-gray-900 mt-4">
                                <strong>Secara keseluruhan, prioritas tugas ini adalah
                                    {{ number_format($c['p_final'] ?? 0, 1) }}</strong> dari skala maksimal.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="text-center mt-8">
                    <a href="{{ route('planner.tasks.edit', $task->id) }}"
                        class="btn-primary text-white px-6 py-3 rounded-lg font-semibold hover-lift inline-flex items-center mr-4">
                        <span class="material-icons mr-2">edit</span>
                        Edit Tugas
                    </a>
                    <a href="{{ route('planner.dashboard') }}"
                        class="bg-gray-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors inline-flex items-center">
                        <span class="material-icons mr-2">dashboard</span>
                        Kembali ke Dashboard
                    </a>
                </div>
            @endif
        </div>
    </section>
@endsection
