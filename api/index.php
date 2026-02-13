<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valentine Invitation</title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f1/Heart_coraz%C3%B3n.svg/1200px-Heart_coraz%C3%B3n.svg.png"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap");

        body {
            background: #ffe6ea;
            text-align: center;
            font-family: "Great Vibes", cursive;
            overflow-x: hidden;
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
            max-width: 85%;
            margin: 20px;
            z-index: 10;
        }

        h1 { font-size: 38px; color: #d63384; margin-bottom: 20px; }
        .success-text { font-size: 32px; color: #d63384; line-height: 1.4; font-weight: bold; }

        .btn-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            min-height: 150px;
            position: relative;
        }

        button {
            padding: 15px 30px;
            font-size: 25px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            font-family: sans-serif;
            font-weight: bold;
        }

        .yes { background-color: #ff4d6d; color: white; position: relative; z-index: 20; }
        .no { background-color: #6c757d; color: white; position: relative; z-index: 15; }

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

        img { border-radius: 15px; margin-bottom: 15px; max-width: 100%; }
    </style>
</head>
<body>

    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] != 'POST'): ?>
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExbmZpZzB3eXF6eXF6eXF6eXF6eXF6eXF6eXF6eXF6eXF6eXF6JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCBmcm9tX2dpZmh5/3o7TKoWXlo3M1nKSYw/giphy.gif" width="250">
            
            <h1>Will you be my online valentine for today Ms? 😅</h1>
            
            <div class="btn-container" id="mainContainer">
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
        
        // The phrases for the loop
        const phrases = [
            "No", 
            "yrr please", 
            "again😭", 
            "🥹pls ms", 
            "Don't do this", 
            "Ek baar soch lo", 
            "Maafi dedo 😅",
            "Jaan loge kya? 💀",
            "Last chance!"
        ];
        
        let phraseIndex = 0;

        function moveButton() {
            // 1. Update text loop
            phraseIndex = (phraseIndex + 1) % phrases.length;
            noBtn.innerText = phrases[phraseIndex];

            // 2. Move button to random spot
            // Using window dimensions minus button size to keep it on screen
            const padding = 50;
            const x = Math.random() * (window.innerWidth - noBtn.offsetWidth - padding);
            const y = Math.random() * (window.innerHeight - noBtn.offsetHeight - padding);
            
            noBtn.style.position = 'fixed';
            noBtn.style.left = x + 'px';
            noBtn.style.top = y + 'px';

            // 3. Make Yes button grow
            const currentSize = parseFloat(window.getComputedStyle(yesBtn).fontSize);
            if (currentSize < 80) { // Safety cap so it doesn't cover everything immediately
                yesBtn.style.fontSize = (currentSize + 4) + 'px';
                yesBtn.style.padding = (currentSize + 4) + 'px';
            }
        }

        // Trigger on both Desktop (hover) and Mobile (touch)
        noBtn.addEventListener('mouseover', moveButton);
        noBtn.addEventListener('touchstart', (e) => {
            e.preventDefault(); // Prevents accidental clicking/scrolling
            moveButton();
        });
    </script>
</body>
</html>
