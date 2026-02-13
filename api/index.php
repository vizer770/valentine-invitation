<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Invitation</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;600&display=swap");

        body {
            background: #ffe6ea;
            text-align: center;
            font-family: "Great Vibes", cursive;
            overflow: hidden; 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            width: 320px;
            max-width: 85%;
            margin: 20px;
            z-index: 10;
            position: relative;
        }

        /* --- ADVANCED ANIMATED ROSE --- */
        .rose-wrapper {
            height: 180px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 10px;
        }

        .rose {
            position: relative;
            width: 50px;
            height: 50px;
            animation: bloom 3s infinite ease-in-out, sway 4s infinite ease-in-out;
        }

        .rose-petal {
            position: absolute;
            width: 50px;
            height: 50px;
            background: #d63384;
            border-radius: 50% 50% 10% 50%;
            transform-origin: bottom right;
            box-shadow: inset 5px 5px 15px rgba(0,0,0,0.2);
        }

        /* Petal Layers */
        .rose-petal:nth-child(1) { transform: rotate(0deg); }
        .rose-petal:nth-child(2) { transform: rotate(72deg); opacity: 0.9; }
        .rose-petal:nth-child(3) { transform: rotate(144deg); opacity: 0.8; }
        .rose-petal:nth-child(4) { transform: rotate(216deg); opacity: 0.9; }
        .rose-petal:nth-child(5) { transform: rotate(288deg); opacity: 0.8; }

        .rose-center {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #ff4d6d;
            border-radius: 50%;
            top: 15px;
            left: 15px;
            z-index: 2;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.3);
        }

        .rose-stem {
            position: absolute;
            width: 5px;
            height: 100px;
            background: #2d6a4f;
            top: 45px;
            left: 22px;
            border-radius: 5px;
            z-index: -1;
        }

        @keyframes bloom {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        @keyframes sway {
            0%, 100% { transform: rotate(-5deg); }
            50% { transform: rotate(5deg); }
        }

        /* --- TEXT & BUTTONS --- */
        h1 { font-size: 32px; color: #d63384; margin: 15px 0; line-height: 1.2; }
        
        .pookie-text {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #888;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .btn-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            min-height: 120px;
            position: relative;
        }

        button {
            padding: 12px 25px;
            font-size: 20px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }

        .yes { background-color: #ff4d6d; color: white; position: relative; z-index: 5; }
        .no { background-color: #6c757d; color: white; position: fixed; z-index: 9999; white-space: nowrap; }

        .success-text { font-size: 28px; color: #d63384; font-weight: bold; line-height: 1.4; }
        .heart { position: fixed; top: -10px; font-size: 20px; animation: fall linear forwards; z-index: 100; }
        @keyframes fall { to { transform: translateY(100vh) rotate(360deg); } }
    </style>
</head>
<body>

    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] != 'POST'): ?>
            <div class="rose-wrapper">
                <div class="rose">
                    <div class="rose-petal"></div>
                    <div class="rose-petal"></div>
                    <div class="rose-petal"></div>
                    <div class="rose-petal"></div>
                    <div class="rose-petal"></div>
                    <div class="rose-center"></div>
                    <div class="rose-stem"></div>
                </div>
            </div>
            
            <p class="pookie-text">take this flower pookie bhabhi</p>
            <h1>Will you be my online valentine for today Ms? 😅</h1>
            
            <div class="btn-container">
                <form method="POST">
                    <button type="submit" class="yes" id="yesBtn">Yes</button>
                </form>
                <button type="button" class="no" id="noBtn">No</button>
            </div>
        <?php else: ?>
            <div class="success-text">
                Thank You Ms, <br><br>
                and please don't mind, <br>
                hope next life aapko date pe leke jau ☺️ <br>
                this life enjoy with bhaiyaa ♥️
            </div>
            <script>
                function createHeart() {
                    const heart = document.createElement('div');
                    heart.classList.add('heart');
                    heart.innerHTML = '❤️';
                    heart.style.left = Math.random() * 100 + 'vw';
                    heart.style.animationDuration = Math.random() * 2 + 3 + 's';
                    document.body.appendChild(heart);
                    setTimeout(() => heart.remove(), 5000);
                }
                setInterval(createHeart, 300);
            </script>
        <?php endif; ?>
    </div>

    <script>
        const noBtn = document.getElementById('noBtn');
        const yesBtn = document.getElementById('yesBtn');
        const phrases = ["No", "yrr please", "again😭", "🥹pls ms", "Don't do this", "Ek baar soch lo", "Maafi dedo 😅"];
        let i = 0;

        function move() {
            noBtn.innerText = phrases[++i % phrases.length];
            const x = Math.random() * (window.innerWidth - noBtn.offsetWidth - 50);
            const y = Math.random() * (window.innerHeight - noBtn.offsetHeight - 50);
            noBtn.style.left = x + 'px';
            noBtn.style.top = y + 'px';
            let size = parseFloat(window.getComputedStyle(yesBtn).fontSize);
            if (size < 45) {
                yesBtn.style.fontSize = (size + 2) + 'px';
                yesBtn.style.padding = (size + 2) + 'px';
            }
        }

        noBtn.addEventListener('mouseover', move);
        noBtn.addEventListener('touchstart', (e) => { e.preventDefault(); move(); });
    </script>
</body>
</html>
