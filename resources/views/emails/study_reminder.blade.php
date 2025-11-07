<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>AI Study Planner - Study Reminder</title>
    <style>
        body {
            font-family: 'Instrument Sans', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            position: relative;
        }

        .tech-bg {
            background-image: url('https://sfile.chatglm.cn/images-ppt/d2d799095873.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
            min-height: 200px;
            border-radius: 12px 12px 0 0;
            overflow: hidden;
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

        .bubble {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 8s infinite ease-in-out;
            z-index: 2;
        }

        .bubble:nth-child(1) {
            width: 60px;
            height: 60px;
            left: 10%;
            top: 20%;
            animation-delay: 0s;
        }

        .bubble:nth-child(2) {
            width: 40px;
            height: 40px;
            left: 30%;
            top: 60%;
            animation-delay: 2s;
        }

        .bubble:nth-child(3) {
            width: 80px;
            height: 80px;
            left: 60%;
            top: 30%;
            animation-delay: 4s;
        }

        .bubble:nth-child(4) {
            width: 30px;
            height: 30px;
            left: 80%;
            top: 70%;
            animation-delay: 6s;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .header-content {
            position: relative;
            z-index: 3;
            padding: 30px 20px;
            text-align: center;
            color: white;
        }

        .header-content h1 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 10px 0;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .header-content p {
            font-size: 16px;
            margin: 0;
            opacity: 0.9;
        }

        .content {
            background: #ffffff;
            padding: 30px 20px;
            border-radius: 0 0 12px 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .content h2 {
            color: #1f2937;
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 20px 0;
            text-align: center;
        }

        .highlight {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #f59e0b;
            margin: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .highlight h3 {
            color: #92400e;
            font-size: 18px;
            font-weight: 600;
            margin: 0 0 10px 0;
            display: flex;
            align-items: center;
        }

        .highlight h3::before {
            content: '⏰';
            margin-right: 8px;
        }

        .highlight p {
            color: #78350f;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .section-title {
            color: #1f2937;
            font-size: 18px;
            font-weight: 600;
            margin: 25px 0 15px 0;
        }

        .feature-list {
            background: #f8fafc;
            border-radius: 8px;
            padding: 20px;
            margin: 15px 0;
        }

        .feature-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .feature-list li {
            color: #374151;
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }

        .feature-list li::before {
            content: '✅';
            margin-right: 10px;
            flex-shrink: 0;
        }

        .motivation {
            background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
            border: 1px solid #a7f3d0;
            border-radius: 8px;
            padding: 20px;
            margin: 25px 0;
            text-align: center;
            color: #065f46;
            font-style: italic;
            font-weight: 500;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
            line-height: 1.5;
        }

        .footer p {
            margin: 5px 0;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .header-content {
                padding: 20px 15px;
            }

            .header-content h1 {
                font-size: 24px;
            }

            .content {
                padding: 20px 15px;
            }

            .content h2 {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tech-bg">
            <!-- Animated Bubbles -->
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>

            <div class="header-content">
                <h1>🔔 AI Study Planner</h1>
                <p>Pengingat Blok Belajar Anda</p>
            </div>
        </div>

        <div class="content">
            <h2>Mulai blok belajar: <strong>{{ $title }}</strong></h2>

            <div class="highlight">
                <h3>Waktu Belajar</h3>
                <p><strong>{{ $start }} – {{ $end }} WIB</strong></p>
            </div>

            <div class="section-title">Teknik Pomodoro:</div>
            <div class="feature-list">
                <ul>
                    <li>🔥 Fokus penuh selama 45-60 menit</li>
                    <li>☕ Istirahat 10-15 menit</li>
                    <li>🎯 Tetap konsentrasi dan hindari distraksi</li>
                </ul>
            </div>

            <div class="section-title">Tips untuk belajar efektif:</div>
            <div class="feature-list">
                <ul>
                    <li>📚 Siapkan materi dan alat tulis</li>
                    <li>📱 Matikan notifikasi ponsel</li>
                    <li>🎵 Gunakan musik fokus jika membantu</li>
                    <li>✅ Catat progress setelah selesai</li>
                </ul>
            </div>

            <div class="motivation">
                <p>Semangat belajar! Anda pasti bisa! 💪🚀</p>
            </div>
        </div>

        <div class="footer">
            <p>Email ini dikirim otomatis oleh AI Study Planner</p>
            <p>Jika Anda tidak ingin menerima reminder, silakan ubah pengaturan di aplikasi.</p>
        </div>
    </div>
</body>

</html>
