<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Invitation</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png"/>
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

        h1 { font-size: 32px; color: #d63384; margin-top: 10px; margin-bottom: 20px; position: relative; z-index: 1; line-height: 1.2; }
        
        .pookie-text {
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            color: #888;
            margin-top: 10px;
            margin-bottom: 0px;
            font-weight: 600;
            text-transform: lowercase;
        }

        .success-text { font-size: 28px; color: #d63384; line-height: 1.4; font-weight: bold; padding: 10px; }

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
            transition: all 0.2s ease;
            font-family: sans-serif;
            font-weight: bold;
        }

        .yes { background-color: #ff4d6d; color: white; position: relative; z-index: 5; }
        .no { background-color: #6c757d; color: white; position: fixed; z-index: 9999; white-space: nowrap; }

        .heart {
            position: fixed;
            top: -10px;
            font-size: 20px;
            animation: fall linear forwards;
            z-index: 100;
        }

        @keyframes fall {
            to { transform: translateY(100vh) rotate(360deg); }
        }

        img { border-radius: 15px; max-width: 100%; height: auto; position: relative; z-index: 1; display: block; margin: 0 auto; }
    </style>
</head>
<body>

    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] != 'POST'): ?>
            <img src="https://i.postimg.cc/8z0K06mG/pookie-cat.jpg" width="250" alt="Valentine Cat">
            
            <p class="pookie-text">take the flower pookie bhabhi</p>
            
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
        let phraseIndex = 0;

        function moveButton() {
            phraseIndex = (phraseIndex + 1) % phrases.length;
            noBtn.innerText = phrases[phraseIndex];
            const padding = 50;
            const maxX = window.innerWidth - noBtn.offsetWidth - padding;
            const maxY = window.innerHeight - noBtn.offsetHeight - padding;
            const randomX = Math.max(padding, Math.floor(Math.random() * maxX));
            const randomY = Math.max(padding, Math.floor(Math.random() * maxY));
            noBtn.style.left = randomX + 'px';
            noBtn.style.top = randomY + 'px';
            const currentSize = parseFloat(window.getComputedStyle(yesBtn).fontSize);
            if (currentSize < 45) { 
                yesBtn.style.fontSize = (currentSize + 3) + 'px';
                yesBtn.style.padding = (currentSize + 3) + 'px';
            }
        }

        noBtn.addEventListener('mouseover', moveButton);
        noBtn.addEventListener('touchstart', (e) => {
            e.preventDefault();
            moveButton();
        });
    </script>
</body>
</html>
