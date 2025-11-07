<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Selesai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }

        .content {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 0 0 8px 8px;
        }

        .stats {
            background: white;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
            border-left: 4px solid #667eea;
        }

        .celebration {
            text-align: center;
            font-size: 2em;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>🎉 Tugas Selesai!</h1>
            <p>Selamat atas penyelesaian tugas belajar Anda!</p>
        </div>

        <div class="content">
            <h2>{{ $task->title }}</h2>
            <p><strong>Jenis:</strong> {{ ucfirst($task->type) }}</p>
            <p><strong>Selesai pada:</strong> {{ $task->updated_at->format('d F Y \p\a\d\a H:i') }}</p>

            @if ($stats)
                <div class="stats">
                    <h3>📊 Statistik Penyelesaian</h3>
                    <ul>
                        <li><strong>Total Blok Belajar:</strong> {{ $stats['total_blocks'] }}</li>
                        <li><strong>Waktu Direncanakan:</strong> {{ $stats['planned_hours'] }} jam</li>
                        <li><strong>Waktu Aktual yang Dihabiskan:</strong> {{ $stats['actual_hours'] }} jam</li>
                        <li><strong>Efisiensi:</strong> {{ $stats['efficiency'] }}%</li>
                    </ul>
                </div>
            @endif

            <div class="celebration">
                🎊 Kerja bagus! Teruskan kerja yang luar biasa! 🎊
            </div>

            <p>Siap untuk tantangan berikutnya? Masuk ke AI Study Planner Anda untuk menambah tugas dan melanjutkan
                perjalanan belajar.</p>

            <p style="margin-top: 30px;">
                <a href="{{ url('/login') }}"
                    style="background: #667eea; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Lanjutkan
                    Belajar</a>
            </p>
        </div>
    </div>
</body>

</html>
