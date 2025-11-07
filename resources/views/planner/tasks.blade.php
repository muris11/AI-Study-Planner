@extends('layouts.base')
@section('title', 'Kelola Tugas - AI Study Planner')

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
                    Kelola Tugas Belajar
                    <span class="block text-gradient animate-wave">Anda</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                    Tambah, edit, dan kelola semua tugas Anda. AI akan membantu menentukan prioritas yang tepat untuk hasil
                    belajar maksimal.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Add/Edit Task Form -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <span
                                class="material-icons mr-3 text-purple-600">{{ isset($task) ? 'edit' : 'add_circle' }}</span>
                            {{ isset($task) ? 'Edit Tugas' : 'Tambah Tugas Baru' }}
                        </h2>
                    </div>

                    <form method="post"
                        action="{{ isset($task) ? route('planner.tasks.update', $task->id) : route('planner.tasks.store') }}"
                        class="space-y-6">
                        @csrf
                        @if (isset($task))
                            @method('PUT')
                        @endif

                        <!-- Task Title -->
                        <div>
                            <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                <span class="material-icons mr-2 text-sm">title</span>
                                Judul Tugas
                            </label>
                            <input name="title" type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                placeholder="Masukkan judul tugas..." required value="{{ $task->title ?? '' }}">
                        </div>

                        <!-- Task Type & Due Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">category</span>
                                    Tipe Tugas
                                </label>
                                <select name="type"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                                    <option value="assignment"
                                        {{ isset($task) && $task->type === 'assignment' ? 'selected' : '' }}>
                                        Tugas
                                    </option>
                                    <option value="quiz" {{ isset($task) && $task->type === 'quiz' ? 'selected' : '' }}>
                                        Kuis
                                    </option>
                                    <option value="exam" {{ isset($task) && $task->type === 'exam' ? 'selected' : '' }}>
                                        Ujian
                                    </option>
                                    <option value="study" {{ isset($task) && $task->type === 'study' ? 'selected' : '' }}>
                                        Belajar
                                    </option>
                                    <option value="project"
                                        {{ isset($task) && $task->type === 'project' ? 'selected' : '' }}>
                                        Proyek
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">schedule</span>
                                    Deadline (Opsional)
                                </label>
                                <input name="due_at" type="datetime-local"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                    value="{{ isset($task) && $task->due_at ? $task->due_at->format('Y-m-d\TH:i') : '' }}">
                            </div>
                        </div>

                        <!-- Weight & Difficulty -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">grade</span>
                                    Bobot Nilai (%)
                                </label>
                                <select name="weight_pct"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                                    <option value="0" {{ !isset($task) || $task->weight_pct == 0 ? 'selected' : '' }}>
                                        Tidak ada bobot
                                    </option>
                                    <option value="5" {{ isset($task) && $task->weight_pct == 5 ? 'selected' : '' }}>
                                        Rendah (5%)
                                    </option>
                                    <option value="10" {{ isset($task) && $task->weight_pct == 10 ? 'selected' : '' }}>
                                        Sedang (10%)
                                    </option>
                                    <option value="20" {{ isset($task) && $task->weight_pct == 20 ? 'selected' : '' }}>
                                        Tinggi (20%)
                                    </option>
                                    <option value="30" {{ isset($task) && $task->weight_pct == 30 ? 'selected' : '' }}>
                                        Sangat Tinggi (30%)
                                    </option>
                                    <option value="40" {{ isset($task) && $task->weight_pct == 40 ? 'selected' : '' }}>
                                        Maksimal (40%)
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">trending_up</span>
                                    Tingkat Kesulitan
                                </label>
                                <select name="difficulty"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                                    <option value="1" {{ !isset($task) || $task->difficulty == 1 ? 'selected' : '' }}>
                                        Sangat Mudah
                                    </option>
                                    <option value="2" {{ isset($task) && $task->difficulty == 2 ? 'selected' : '' }}>
                                        Mudah
                                    </option>
                                    <option value="3" {{ !isset($task) || $task->difficulty == 3 ? 'selected' : '' }}>
                                        Sedang
                                    </option>
                                    <option value="4" {{ isset($task) && $task->difficulty == 4 ? 'selected' : '' }}>
                                        Sulit
                                    </option>
                                    <option value="5" {{ isset($task) && $task->difficulty == 5 ? 'selected' : '' }}>
                                        Sangat Sulit
                                    </option>
                                </select>
                            </div>
                        </div>

                        <!-- Competency & Hours -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">school</span>
                                    Kompetensi Anda
                                </label>
                                <select name="competency_self"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors">
                                    <option value="1"
                                        {{ !isset($task) || $task->competency_self == 1 ? 'selected' : '' }}>
                                        Pemula
                                    </option>
                                    <option value="2"
                                        {{ isset($task) && $task->competency_self == 2 ? 'selected' : '' }}>
                                        Kurang Mahir
                                    </option>
                                    <option value="3"
                                        {{ !isset($task) || $task->competency_self == 3 ? 'selected' : '' }}>
                                        Mahir
                                    </option>
                                    <option value="4"
                                        {{ isset($task) && $task->competency_self == 4 ? 'selected' : '' }}>
                                        Sangat Mahir
                                    </option>
                                    <option value="5"
                                        {{ isset($task) && $task->competency_self == 5 ? 'selected' : '' }}>
                                        Ahli
                                    </option>
                                </select>
                            </div>
                            <div>
                                <label class="text-sm font-medium text-gray-700 mb-2 flex items-center">
                                    <span class="material-icons mr-2 text-sm">timer</span>
                                    Estimasi Jam
                                </label>
                                <input name="estimated_effort_hours" type="number" step="0.5" min="0.5"
                                    max="40"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors"
                                    placeholder="Contoh: 2.5" required
                                    value="{{ isset($task) ? $task->estimated_effort_hours : '' }}">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit"
                                class="w-full btn-primary text-white px-6 py-3 rounded-lg font-semibold hover-lift flex items-center justify-center">
                                <span class="material-icons mr-2">{{ isset($task) ? 'save' : 'add' }}</span>
                                {{ isset($task) ? 'Simpan Perubahan' : 'Tambah Tugas' }}
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Tasks List -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                            <span class="material-icons mr-3 text-blue-600">list_alt</span>
                            Daftar Tugas
                        </h2>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                            {{ $tasks->count() }} tugas
                        </span>
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

                                    $difficultyText =
                                        ['Sangat Mudah', 'Mudah', 'Sedang', 'Sulit', 'Sangat Sulit'][
                                            $t->difficulty - 1
                                        ] ?? 'Sedang';
                                    $competencyText =
                                        ['Pemula', 'Kurang Mahir', 'Mahir', 'Sangat Mahir', 'Ahli'][
                                            $t->competency_self - 1
                                        ] ?? 'Mahir';
                                @endphp
                                <div
                                    class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow card-hover">
                                    <div class="flex justify-between items-start mb-3">
                                        <div class="flex-1">
                                            <h3 class="font-semibold text-gray-900 mb-1">{{ $t->title }}</h3>
                                            <div class="flex flex-wrap items-center gap-2 text-sm text-gray-600 mb-2">
                                                <span
                                                    class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full">{{ $typeText }}</span>
                                                @if ($t->due_at)
                                                    <span class="flex items-center">
                                                        <span class="material-icons text-xs mr-1">schedule</span>
                                                        {{ $t->due_at->format('d M Y H:i') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="flex items-center space-x-4 text-sm text-gray-600">
                                                <span class="flex items-center">
                                                    Kesulitan: {{ $difficultyText }}
                                                </span>
                                                <span class="flex items-center">
                                                    Kompetensi: {{ $competencyText }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ route('planner.tasks.edit', $t->id) }}"
                                                class="text-blue-600 hover:text-blue-800 p-2 rounded-lg hover:bg-blue-50 transition-colors">
                                                <span class="material-icons text-sm">edit</span>
                                            </a>
                                            <form method="post" action="{{ route('planner.tasks.delete', $t->id) }}"
                                                class="inline"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-800 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                                    <span class="material-icons text-sm">delete</span>
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    @if ($t->priority_components)
                                        <div
                                            class="bg-gradient-to-r from-yellow-50 to-orange-50 border border-yellow-200 rounded-lg p-3">
                                            <div class="flex items-center justify-between">
                                                <div class="text-sm">
                                                    <span class="font-medium text-gray-800">Prioritas AI:</span>
                                                    <span
                                                        class="text-yellow-700 ml-2 font-bold">{{ number_format($t->priority_components['p_final'] ?? 0, 1) }}</span>
                                                </div>
                                                <a href="{{ route('planner.explain', $t->id) }}"
                                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                                    Lihat Penjelasan ->
                                                </a>
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
                            <p class="text-gray-600 mb-6">Mulai dengan menambahkan tugas pertama Anda di sebelah kiri.</p>
                            <div class="text-sm text-gray-500">
                                Tip: Semakin detail informasi yang Anda berikan, semakin akurat AI menentukan prioritasnya!
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
