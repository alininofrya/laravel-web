<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }
        
        body::before {
            content: '';
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: float 20s ease-in-out infinite;
            pointer-events: none;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 50px 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .container::before {
            content: '🎓';
            position: absolute;
            top: -20px;
            right: 40px;
            font-size: 50px;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        h1 {
            text-align: center;
            font-size: 2.5em;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 40px;
            font-weight: 700;
            position: relative;
        }
        
        h1::after {
            content: '';
            display: block;
            width: 100px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            margin: 15px auto 0;
            border-radius: 2px;
        }
        
        .card-grid {
            display: grid;
            gap: 20px;
            list-style: none;
        }
        
        .info-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 25px;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .info-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 5px;
            height: 100%;
            background: linear-gradient(180deg, #667eea, #764ba2);
        }
        
        .info-card:hover {
            transform: translateX(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }
        
        .info-label {
            display: inline-block;
            color: #667eea;
            font-weight: 700;
            font-size: 0.95em;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }
        
        .info-value {
            color: #2d3748;
            font-size: 1.15em;
            line-height: 1.6;
        }
        
        .hobi-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 12px;
            margin-top: 15px;
            padding: 0;
            list-style: none;
        }
        
        .hobi-list li {
            background: white;
            padding: 12px 18px;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.2);
            transition: all 0.3s ease;
            color: #667eea;
            font-weight: 600;
        }
        
        .hobi-list li:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        
        .motivasi-card {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        
        .motivasi-card .info-label {
            color: white;
            opacity: 0.9;
        }
        
        .motivasi-card .info-value {
            color: white;
            font-style: italic;
            font-size: 1.2em;
            font-weight: 500;
        }
        
        .goal-card {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        
        .goal-card .info-label {
            color: white;
            opacity: 0.9;
        }
        
        .goal-card .info-value {
            color: white;
            font-size: 1.3em;
            font-weight: 600;
        }
        
        .countdown-card {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
            color: white;
            position: relative;
        }
        
        .countdown-card .info-label {
            color: white;
            opacity: 0.95;
        }
        
        .countdown-card .info-value {
            color: white;
            font-size: 2em;
            font-weight: 800;
        }
        
        .countdown-card::after {
            content: '⏰';
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-size: 40px;
            opacity: 0.3;
        }
        
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 2px solid #e2e8f0;
            color: #718096;
            font-size: 0.9em;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 30px 25px;
                margin: 20px auto;
            }
            
            h1 {
                font-size: 2em;
            }
            
            .hobi-list {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Mahasiswa</h1>
        
        <ul class="card-grid">
            <li class="info-card">
                <div class="info-label">👤 Nama</div>
                <div class="info-value">{{ $name }}</div>
            </li>
            
            <li class="info-card">
                <div class="info-label">🎂 Umur</div>
                <div class="info-value">{{ $my_age }} tahun</div>
            </li>
            
            <li class="info-card">
                <div class="info-label">📚 Semester Saat Ini</div>
                <div class="info-value">Semester {{ $current_semester }}</div>
            </li>
            
            <li class="info-card">
                <div class="info-label">🎯 Hobi</div>
                <ul class="hobi-list">
                    @foreach ($hobbies as $hobi)
                        <li>{{ $hobi }}</li>
                    @endforeach
                </ul>
            </li>
            
            <li class="info-card">
                <div class="info-label">🎓 Tanggal Target Wisuda</div>
                <div class="info-value">{{ $tgl_harus_wisuda }}</div>
            </li>
            
            <li class="info-card countdown-card">
                <div class="info-label">⏳ Waktu Tersisa</div>
                <div class="info-value">{{ $time_to_study_left }} Hari</div>
            </li>
            
            <li class="info-card motivasi-card">
                <div class="info-label">💪 Pesan Motivasi</div>
                <div class="info-value">{{ $motivasi }}</div>
            </li>
            
            <li class="info-card goal-card">
                <div class="info-label">🌟 Cita-cita</div>
                <div class="info-value">{{ $future_goal }}</div>
            </li>
        </ul>
        
        <div class="footer">
            <p>Tetap semangat dalam mengejar impian! 🚀</p>
        </div>
    </div>
</body>
</html>