@extends('layouts.base')
@section('title', 'Pengaturan Belajar - AI Study Planner')

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
                    Pengaturan Belajar
                    <span class="block text-gradient animate-wave">Anda</span>
                </h1>
                <p class="text-lg md:text-xl text-white/90 mt-6 leading-relaxed drop-shadow-md">
                    Sesuaikan preferensi belajar Anda agar AI dapat membuat jadwal yang sempurna untuk Anda.
                </p>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="post" action="{{ route('planner.prefs.save') }}" class="space-y-8">
                @csrf

                <!-- Preferred Days Section -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <span class="material-icons mr-3 text-green-600 text-2xl">calendar_view_week</span>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Hari & Waktu Belajar</h2>
                            <p class="text-gray-600 mt-1">Pilih hari dan waktu yang Anda sukai untuk belajar</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            $days = [
                                'Mon' => 'Senin',
                                'Tue' => 'Selasa',
                                'Wed' => 'Rabu',
                                'Thu' => 'Kamis',
                                'Fri' => 'Jumat',
                                'Sat' => 'Sabtu',
                                'Sun' => 'Minggu',
                            ];
                            $currentPrefs = $prefs->preferred_days ?? [];
                        @endphp
                        @foreach ($days as $key => $name)
                            @php
                                $range = $currentPrefs[$key][0] ?? '19:00-22:00';
                                $parts = explode('-', $range);
                                $start = $parts[0] ?? '19:00';
                                $end = $parts[1] ?? '22:00';
                            @endphp
                            <div
                                class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 card-hover">
                                <label class="flex items-center mb-4 cursor-pointer">
                                    <input type="checkbox" name="days[]" value="{{ $key }}"
                                        {{ in_array($key, array_keys($currentPrefs)) ? 'checked' : '' }}
                                        class="w-5 h-5 text-green-600 bg-gray-100 border-gray-300 rounded focus:ring-green-500 focus:ring-2">
                                    <span class="ml-3 font-semibold text-gray-900">{{ $name }}</span>
                                </label>

                                <div class="space-y-3">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700 mb-1 block">Mulai</label>
                                        <input type="time" name="start_time_{{ $key }}"
                                            value="{{ $start }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                                    </div>
                                    <div class="text-center">
                                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full">sampai</span>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700 mb-1 block">Selesai</label>
                                        <input type="time" name="end_time_{{ $key }}"
                                            value="{{ $end }}"
                                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Study Settings Section -->
                <div class="bg-gray-50 rounded-2xl p-8">
                    <div class="flex items-center mb-6">
                        <span class="material-icons mr-3 text-blue-600 text-2xl">settings</span>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">Pengaturan Teknik Pomodoro</h2>
                            <p class="text-gray-600 mt-1">Sesuaikan durasi fokus dan istirahat untuk efisiensi belajar
                                maksimal</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Pomodoro Minutes -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center mb-4">
                                <span class="material-icons mr-2 text-orange-600">timer</span>
                                <label class="text-lg font-semibold text-gray-900">Durasi Fokus</label>
                            </div>
                            <select name="pomodoro_minutes"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-center text-lg font-medium">
                                <option value="15" {{ ($prefs->pomodoro_minutes ?? 25) == 15 ? 'selected' : '' }}>
                                    15 menit
                                </option>
                                <option value="25" {{ ($prefs->pomodoro_minutes ?? 25) == 25 ? 'selected' : '' }}>
                                    25 menit
                                </option>
                                <option value="30" {{ ($prefs->pomodoro_minutes ?? 25) == 30 ? 'selected' : '' }}>
                                    30 menit
                                </option>
                                <option value="45" {{ ($prefs->pomodoro_minutes ?? 25) == 45 ? 'selected' : '' }}>
                                    45 menit
                                </option>
                                <option value="60" {{ ($prefs->pomodoro_minutes ?? 25) == 60 ? 'selected' : '' }}>
                                    60 menit
                                </option>
                            </select>
                            <p class="text-sm text-gray-600 mt-2">Waktu fokus tanpa gangguan</p>
                        </div>

                        <!-- Break Minutes -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center mb-4">
                                <span class="material-icons mr-2 text-green-600">coffee</span>
                                <label class="text-lg font-semibold text-gray-900">Durasi Istirahat</label>
                            </div>
                            <select name="break_minutes"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-center text-lg font-medium">
                                <option value="5" {{ ($prefs->break_minutes ?? 5) == 5 ? 'selected' : '' }}>
                                    5 menit
                                </option>
                                <option value="10" {{ ($prefs->break_minutes ?? 5) == 10 ? 'selected' : '' }}>
                                    10 menit
                                </option>
                                <option value="15" {{ ($prefs->break_minutes ?? 5) == 15 ? 'selected' : '' }}>
                                    15 menit
                                </option>
                            </select>
                            <p class="text-sm text-gray-600 mt-2">Waktu rehat untuk recovery</p>
                        </div>

                        <!-- Max Daily Blocks -->
                        <div
                            class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all duration-200 card-hover">
                            <div class="flex items-center mb-4">
                                <span class="material-icons mr-2 text-purple-600">grid_view</span>
                                <label class="text-lg font-semibold text-gray-900">Blok Harian Maksimal</label>
                            </div>
                            <select name="max_daily_focus_blocks"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors text-center text-lg font-medium">
                                <option value="2" {{ ($prefs->max_daily_focus_blocks ?? 8) == 2 ? 'selected' : '' }}>
                                    2 blok
                                </option>
                                <option value="4" {{ ($prefs->max_daily_focus_blocks ?? 8) == 4 ? 'selected' : '' }}>
                                    4 blok
                                </option>
                                <option value="6" {{ ($prefs->max_daily_focus_blocks ?? 8) == 6 ? 'selected' : '' }}>
                                    6 blok
                                </option>
                                <option value="8" {{ ($prefs->max_daily_focus_blocks ?? 8) == 8 ? 'selected' : '' }}>
                                    8 blok
                                </option>
                                <option value="10" {{ ($prefs->max_daily_focus_blocks ?? 8) == 10 ? 'selected' : '' }}>
                                    10 blok
                                </option>
                            </select>
                            <p class="text-sm text-gray-600 mt-2">Jumlah sesi fokus per hari</p>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div class="text-center pt-8">
                    <button type="submit"
                        class="btn-primary text-white px-8 py-4 rounded-xl font-semibold text-lg hover-lift flex items-center justify-center mx-auto">
                        <span class="material-icons mr-3">save</span>
                        Simpan Pengaturan
                    </button>
                    <p class="text-sm text-gray-600 mt-3">
                        Pengaturan ini akan mempengaruhi bagaimana AI membuat jadwal belajar Anda
                    </p>
                </div>
            </form>
        </div>
    </section>
@endsection
