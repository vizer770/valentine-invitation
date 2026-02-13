<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For You Ms. 🌹</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;600&display=swap");

        * { margin: 0; padding: 0; box-sizing: border-box; }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden; 
            position: fixed; 
        }

        body {
            background: linear-gradient(135deg, #ffafbd 0%, #ffc3a0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .bg-heart, .falling-heart {
            position: absolute;
            color: rgba(255, 255, 255, 0.5);
            pointer-events: none;
        }

        .bg-heart { animation: floatUp 6s infinite linear; z-index: 0; }
        .falling-heart { position: fixed; top: -50px; font-size: 24px; z-index: 100; animation: drop linear forwards; }

        @keyframes floatUp {
            0% { transform: translateY(105vh) scale(0); opacity: 1; }
            100% { transform: translateY(-10vh) scale(1.5); opacity: 0; }
        }

        @keyframes drop { to { transform: translateY(105vh) rotate(360deg); } }

        .container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            padding: 40px 20px;
            border-radius: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            width: 350px;
            max-width: 90%;
            text-align: center;
            z-index: 10;
            border: 2px solid #fff;
        }

        .rose-box { height: 160px; display: flex; align-items: center; justify-content: center; margin-bottom: 10px; }
        .rose { position: relative; animation: sway 3s infinite ease-in-out; }
        .petal { width: 50px; height: 50px; background: #d63384; border-radius: 50% 50% 0 50%; transform: rotate(-45deg); box-shadow: inset 10px 10px #b02a6b; }
        .stem { width: 5px; height: 80px; background: #2d6a4f; margin: -10px auto 0; border-radius: 5px; }
        .leaf { width: 30px; height: 15px; background: #2d6a4f; border-radius: 15px 0; position: absolute; top: 70px; left: 15px; transform: rotate(-20deg); }

        @keyframes sway { 0%, 100% { transform: rotate(-8deg); } 50% { transform: rotate(8deg); } }

        .pookie-text { font-size: 16px; color: #d63384; font-weight: 600; margin: 15px 0; letter-spacing: 1px; }
        h1 { font-family: 'Dancing Script', cursive; font-size: 36px; color: #333; margin-bottom: 30px; line-height: 1.2; }

        .btn-container { position: relative; height: 120px; display: flex; justify-content: center; align-items: center; gap: 20px; }
        
        button {
            padding: 12px 30px;
            font-size: 18px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .yes, .shayari-btn { background: #ff4d6d; color: white; box-shadow: 0 8px 15px rgba(255, 77, 109, 0.4); }
        .no { background: #6c757d; color: white; position: fixed; z-index: 9999; }

        .success-text, .shayari-text { font-family: 'Dancing Script', cursive; font-size: 28px; color: #d63384; line-height: 1.4; }
        .shayari-content { font-family: 'Poppins', sans-serif; font-size: 16px; color: #444; font-style: italic; margin-top: 20px; line-height: 1.6; }
    </style>
</head>
<body>

    <div class="container" id="mainContainer">
        <?php if ($_SERVER["REQUEST_METHOD"] != 'POST'): ?>
            <div id="page1">
                <div class="rose-box">
                    <div class="rose"><div class="petal"></div><div class="stem"></div><div class="leaf"></div></div>
                </div>
                <p class="pookie-text">take this flower pookie bhabhi</p>
                <h1>Will you be my valentine for today Ms? 😅</h1>
                <div class="btn-container">
                    <form method="POST">
                        <button type="submit" class="yes" id="yesBtn">Yes</button>
                    </form>
                    <button type="button" class="no" id="noBtn">No</button>
                </div>
            </div>
        <?php else: ?>
            <div id="page2">
                <div class="success-text">
                    Thank You Ms, <br><br>
                    and please don't mind, <br>
                    hope next life aapko date pe leke jau ☺️ <br>
                    this life enjoy with bhaiyaa ♥️
                </div>
                <button class="shayari-btn" style="margin-top: 30px;" onclick="showShayari()">Click for Shayari</button>
            </div>

            <div id="page3" style="display: none;">
                <h1 style="font-size: 30px;">For You...</h1>
                <div class="shayari-content">
                    "Phoolon ki mehak bhi pheeki lagti hai,<br>
                    Jab aapki muskurahat saath hoti hai...<br>
                    Khushnaseeb hain bhaiya jo aap mili,<br>
                    Aap jaisi bhabhi kismat se milti hai." 🌹
                </div>
                <p style="margin-top: 20px; font-size: 14px; color: #888;">Happy Valentine's Day!</p>
            </div>

            <script>
                function showShayari() {
                    document.getElementById('page2').style.display = 'none';
                    document.getElementById('page3').style.display = 'block';
                }

                function createDroppingHeart() {
                    const heart = document.createElement('div');
                    heart.classList.add('falling-heart');
                    heart.innerHTML = '❤️';
                    heart.style.left = Math.random() * 100 + 'vw';
                    heart.style.animationDuration = Math.random() * 2 + 3 + 's';
                    document.body.appendChild(heart);
                    setTimeout(() => heart.remove(), 5000);
                }
                setInterval(createDroppingHeart, 200);
            </script>
        <?php endif; ?>
    </div>

    <script>
        function createBgHeart() {
            const heart = document.createElement('div');
            heart.classList.add('bg-heart');
            heart.innerHTML = '❤️';
            heart.style.left = Math.random() * 100 + 'vw';
            heart.style.fontSize = Math.random() * 20 + 10 + 'px';
            heart.style.animationDuration = Math.random() * 3 + 4 + 's';
            document.body.appendChild(heart);
            setTimeout(() => heart.remove(), 6000);
        }
        setInterval(createBgHeart, 400);

        const noBtn = document.getElementById('noBtn');
        const yesBtn = document.getElementById('yesBtn');
        const phrases = ["No", "yrr please", "again😭", "🥹pls ms", "Ek baar soch lo", "Maafi dedo 😅"];
        let i = 0;

        if(noBtn) {
            function moveButton() {
                noBtn.innerText = phrases[++i % phrases.length];
                const padding = 50;
                const yesRect = yesBtn.getBoundingClientRect();
                let newX, newY, overlap;
                do {
                    newX = Math.random() * (window.innerWidth - noBtn.offsetWidth - padding);
                    newY = Math.random() * (window.innerHeight - noBtn.offsetHeight - padding);
                    overlap = (newX < yesRect.right + 60 && newX + noBtn.offsetWidth > yesRect.left - 60 && newY < yesRect.bottom + 60 && newY + noBtn.offsetHeight > yesRect.top - 60);
                } while (overlap);
                noBtn.style.left = newX + 'px';
                noBtn.style.top = newY + 'px';
                let currentSize = parseFloat(window.getComputedStyle(yesBtn).fontSize);
                if (currentSize < 50) {
                    yesBtn.style.fontSize = (currentSize + 2) + 'px';
                    yesBtn.style.padding = (currentSize + 3) + 'px';
                }
            }
            noBtn.addEventListener('mouseover', moveButton);
            noBtn.addEventListener('touchstart', (e) => { e.preventDefault(); moveButton(); });
        }
    </script>
</body>
</html>
