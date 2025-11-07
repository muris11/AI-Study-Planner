@extends('layouts.base')
@section('title', 'Dashboard - AI Study Planner')

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
                    Selamat Datang di Dashboard
                    <span class="block text-gradient animate-wave">AI Study Planner</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                    Kelola tugas, jadwal belajar, dan preferensi Anda dengan bantuan kecerdasan buatan untuk hasil maksimal.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Dashboard Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Tasks Section -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <span class="material-icons mr-3 text-blue-600">assignment</span>
                            Tugas Anda
                        </h2>
                        <a href="{{ route('planner.tasks') }}"
                            class="btn-primary text-white px-4 py-2 rounded-lg text-sm font-medium hover-lift">
                            Kelola Tugas
                        </a>
                    </div>

                    @if ($tasks->count() > 0)
                        <div class="space-y-4">
                            @foreach ($tasks as $t)
                                @php
                                    $typeText =
                                        [
                                            'assignment' => 'Tugas',
                                            'quiz' => 'Kuis',
                                            'exam' => 'Ujian',
                                            'study' => 'Belajar',
                                            'project' => 'Proyek',
                                        ][$t->type] ?? ucfirst($t->type);
                                @endphp
                                <div
                                    class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow card-hover">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 mb-1">{{ $t->title }}</h3>
                                            <div class="flex items-center space-x-2 text-sm text-gray-600">
                                                <span
                                                    class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $typeText }}</span>
                                                @if ($t->due_at)
                                                    <span class="flex items-center">
                                                        <span class="material-icons text-xs mr-1">schedule</span>
                                                        {{ $t->due_at->format('d M Y H:i') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <a href="{{ route('planner.explain', $t->id) }}"
                                            class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                            <span class="material-icons text-sm">psychology</span>
                                        </a>
                                    </div>

                                    @if ($t->priority_components)
                                        <div
                                            class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg p-3">
                                            <div class="flex items-center justify-between">
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-800">Prioritas AI:</span>
                                                    <span
                                                        class="text-yellow-700 ml-2">{{ number_format($t->priority_components['p_final'] ?? 0, 1) }}</span>
                                                </div>
                                                <div class="text-xs text-gray-600">
                                                    Tingkat {{ $t->difficulty }}/5 • Kompetensi {{ $t->competency_self }}/5
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-gray-400 text-2xl">assignment</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada tugas</h3>
                            <p class="text-gray-600 mb-6">Mulai dengan menambahkan tugas pertama Anda untuk mendapatkan
                                jadwal belajar yang optimal.</p>
                            <a href="{{ route('planner.tasks') }}"
                                class="btn-primary text-white px-6 py-3 rounded-lg font-medium hover-lift">
                                Tambah Tugas Pertama
                            </a>
                        </div>
                    @endif

                    @if ($tasks->count() > 0)
                        <div class="mt-6 space-y-3">
                            <form method="post" action="{{ route('planner.tasks.score') }}" class="block"
                                data-loading="Menghitung prioritas...">
                                @csrf
                                <button
                                    class="w-full bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover-lift flex items-center justify-center">
                                    <span class="material-icons mr-2">psychology</span>
                                    Hitung Prioritas dengan AI
                                </button>
                            </form>
                            <form method="post" action="{{ route('planner.schedule') }}" class="block"
                                data-loading="Membuat jadwal...">
                                @csrf
                                <button
                                    class="w-full bg-gradient-to-r from-green-600 to-teal-600 text-white px-6 py-3 rounded-lg font-semibold hover-lift flex items-center justify-center">
                                    <span class="material-icons mr-2">calendar_today</span>
                                    Buat Jadwal Belajar
                                </button>
                            </form>
                        </div>
                    @endif
                </div>

                <!-- Completed Tasks Section -->
                @if ($completedTasks->count() > 0)
                    <div class="bg-green-50 rounded-2xl p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                                <span class="material-icons mr-3 text-green-600">check_circle</span>
                                Tugas Selesai
                            </h2>
                            <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                                {{ $completedTasks->count() }} selesai
                            </span>
                        </div>

                        <div class="space-y-4">
                            @foreach ($completedTasks as $t)
                                @php
                                    $typeText =
                                        [
                                            'assignment' => 'Assignment',
                                            'quiz' => 'Quiz',
                                            'exam' => 'Exam',
                                            'study' => 'Study',
                                            'project' => 'Project',
                                        ][$t->type] ?? ucfirst($t->type);
                                @endphp
                                <div
                                    class="bg-white rounded-xl p-4 shadow-sm border border-green-200 hover:shadow-md transition-shadow card-hover">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 mb-1">{{ $t->title }}</h3>
                                            <div class="flex items-center space-x-2 text-sm text-gray-600">
                                                <span
                                                    class="px-2 py-1 bg-green-100 text-green-800 rounded-full">{{ $typeText }}</span>
                                                <span class="flex items-center">
                                                    <span class="material-icons text-xs mr-1">check_circle</span>
                                                    Selesai {{ $t->updated_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <span
                                            class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">
                                            ✅ Selesai
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Next Steps Recommendation -->
                        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <h3 class="text-lg font-semibold text-blue-900 mb-2 flex items-center">
                                <span class="material-icons mr-2 text-blue-600">lightbulb</span>
                                Apa Selanjutnya?
                            </h3>
                            <p class="text-blue-800 mb-3">Kemajuan yang bagus! Berikut beberapa saran untuk melanjutkan
                                perjalanan belajar Anda:</p>
                            <ul class="text-blue-800 space-y-1 text-sm">
                                <li>• Tambahkan tugas latihan terkait untuk memperkuat apa yang telah Anda pelajari</li>
                                <li>• Jadwalkan sesi review untuk retensi yang lebih baik</li>
                                <li>• Tangani tugas yang lebih menantang di area subjek ini</li>
                                <li>• Pertimbangkan membantu orang lain atau mengajarkan konsep-konsep tersebut</li>
                            </ul>
                            <div class="mt-3">
                                <a href="{{ route('planner.tasks') }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium">
                                    Tambah Tugas Berikutnya →
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Study Blocks Section -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <span class="material-icons mr-3 text-green-600">schedule</span>
                            Blok Belajar Minggu Ini
                        </h2>
                    </div>

                    <!-- Summary Card -->
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-6">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div>
                                <div class="text-2xl font-bold text-blue-600">{{ $totalBlocksWeek }}</div>
                                <div class="text-sm text-gray-600">Total Blok</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-green-600">{{ $focusMinutes }}</div>
                                <div class="text-sm text-gray-600">Menit Fokus</div>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-orange-600">{{ $todoCount }}</div>
                                <div class="text-sm text-gray-600">Tugas Pending</div>
                            </div>
                        </div>
                    </div>

                    @if ($blocks->count() > 0)
                        <div class="space-y-4">
                            @foreach ($blocks as $b)
                                @php
                                    $task = $b->task ? $b->task->title : 'Tugas #' . $b->task_id;
                                    $statusText = $b->status === 'completed' ? 'Selesai' : 'Direncanakan';
                                    $statusColor =
                                        $b->status === 'completed'
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-yellow-100 text-yellow-800';
                                    $cardBg =
                                        $b->status === 'completed'
                                            ? 'bg-green-50 border-green-200'
                                            : 'bg-white border-gray-100';
                                @endphp
                                <div
                                    class="rounded-xl p-4 shadow-sm border {{ $cardBg }} hover:shadow-md transition-shadow card-hover">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex-1">
                                            <h4 class="font-semibold text-gray-900 mb-1">{{ $task }}</h4>
                                            <div class="text-sm text-gray-600">
                                                <div class="flex items-center mb-1">
                                                    <span class="material-icons text-xs mr-1">schedule</span>
                                                    {{ \Carbon\Carbon::parse($b->start_at)->format('d M Y') }}
                                                </div>
                                                <div class="flex items-center">
                                                    <span class="material-icons text-xs mr-1">access_time</span>
                                                    {{ \Carbon\Carbon::parse($b->start_at)->format('H:i') }} -
                                                    {{ \Carbon\Carbon::parse($b->end_at)->format('H:i') }}
                                                </div>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 {{ $statusColor }} rounded-full text-xs font-medium">
                                            {{ $statusText }}
                                        </span>
                                    </div>

                                    @if ($b->status === 'completed')
                                        <div class="flex items-center justify-between pt-3 border-t border-green-200">
                                            <span class="text-sm text-green-700 font-medium">Blok belajar selesai!</span>
                                            <div class="flex items-center text-green-600">
                                                <span class="material-icons text-sm mr-1">check_circle</span>
                                                <span class="text-xs">Selesai</span>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex justify-end pt-3">
                                            <form method="post" action="{{ route('planner.block.complete', $b->id) }}"
                                                class="inline">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition-colors hover-lift">
                                                    <span class="material-icons mr-1 text-sm">check</span>
                                                    Tandai Selesai
                                                </button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-4">
                                <span class="material-icons text-gray-400 text-2xl">schedule</span>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Belum ada jadwal belajar</h3>
                            <p class="text-gray-600 mb-6">Klik "Buat Jadwal Belajar" untuk membuat jadwal belajar yang
                                dipersonalisasi.</p>
                            <form method="post" action="{{ route('planner.schedule') }}" class="inline">
                                @csrf
                                <button class="btn-primary text-white px-6 py-3 rounded-lg font-medium hover-lift">
                                    <span class="material-icons mr-2">calendar_today</span>
                                    Buat Jadwal Sekarang
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
