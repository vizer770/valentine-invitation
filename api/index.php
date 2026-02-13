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
            height: 100vh;
            margin: 0;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            max-width: 90%;
        }

        h1 { font-size: 45px; color: #d63384; margin-bottom: 20px; }

        .btn-container {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            height: 100px;
        }

        button {
            padding: 15px 30px;
            font-size: 25px;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: sans-serif;
            font-weight: bold;
        }

        .yes { background-color: #ff4d6d; color: white; box-shadow: 0 5px 15px rgba(255, 77, 109, 0.4); }
        .yes:hover { transform: scale(1.2); }

        .no { background-color: #6c757d; color: white; position: relative; }

        .success-msg { color: #d63384; font-size: 50px; animation: pop 0.5s ease-out; }
        
        @keyframes pop {
            0% { transform: scale(0); }
            100% { transform: scale(1); }
        }

        .heart {
            position: fixed;
            top: -10px;
            font-size: 20px;
            animation: fall linear forwards;
        }

        @keyframes fall {
            to { transform: translateY(100vh) rotate(360deg); }
        }
    </style>
</head>
<body>

    <div class="container">
        <?php if ($_SERVER["REQUEST_METHOD"] != 'POST'): ?>
            <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHpueGZ3bmZqZ3R5bmZqZ3R5bmZqZ3R5bmZqZ3R5bmZqZ3R5JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCBmcm9tX2dpZmh5/c76IJLufpNwSULPk2m/giphy.gif" width="200" alt="Cute bear">
            <h1>Will you be my online valentine for today Ms? 😅</h1>
            <div class="btn-container">
                <form method="POST">
                    <button type="submit" class="yes">Yes</button>
                </form>
                <button type="button" class="no" id="noBtn">No</button>
            </div>
        <?php else: ?>
            <div class="success-msg">
                <img src="https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOHpueGZ3bmZqZ3R5bmZqZ3R5bmZqZ3R5bmZqZ3R5bmZqZ3R5JmVwPXYxX2ludGVybmFsX2dpZl9ieV9pZCBmcm9tX2dpZmh5/KztT2c4u8mYYUiMKdJ/giphy.gif" width="250"><br>
                Thank you! I knew you'd say yes! ❤️
            </div>
            <script>
                // Celebration Hearts
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
        const phrases = ["No", "yrr please", "again😭", "🥹pls ms", "Don't do this", "Think again!", "Last chance!"];
        let count = 0;

        noBtn.addEventListener('mouseover', () => {
            // Move button to random position
            const x = Math.random() * (window.innerWidth - noBtn.offsetWidth);
            const y = Math.random() * (window.innerHeight - noBtn.offsetHeight);
            
            noBtn.style.position = 'absolute';
            noBtn.style.left = x + 'px';
            noBtn.style.top = y + 'px';

            // Change text in a loop
            count++;
            noBtn.innerText = phrases[count % phrases.length];
            
            // Make the Yes button bigger every time
            const yesBtn = document.querySelector('.yes');
            const currentSize = parseFloat(window.getComputedStyle(yesBtn).fontSize);
            yesBtn.style.fontSize = (currentSize + 5) + 'px';
            yesBtn.style.padding = (currentSize + 5) + 'px';
        });
    </script>
</body>
</html>
