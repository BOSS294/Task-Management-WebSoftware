<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;

        }

        body {
            background-color: #1d1d1d;
            color: #fff;
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding-top: 20px;
        }

        nav {
            position: fixed;
            top: 20px;
            width: 90%;
            max-width: 1000px;
            background-color: #1d1d1d;
            box-shadow: 10px 12px 8px rgba(0, 0, 0, 0.2);
            border-radius: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            z-index: 1000;
        }

        .nav-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(145deg, #FFD700, rgb(255, 183, 0)); 
            padding: 10px 15px; 
            border-radius: 40px;
            box-shadow: 0 4px 8px rgba(255, 215, 0, 0.2), 0 -2px 4px rgba(0, 0, 0, 0.4); 
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.6);
            transition: background 0.3s ease, transform 0.3s ease; 
        }

        .nav-icons {
            display: flex;
            gap: 15px;
            user-select: none;

        }

        .nav-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(145deg, #333, #111);
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            position: relative;
        }

        .nav-icon:hover {
            transform: translateY(-3px) scale(1.08); 
            filter: brightness(1.15); 
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .nav-icon:active {
            transform: translateY(1px) scale(0.95); 
            background: linear-gradient(145deg, #222, #000); 
        }

        .nav-icon i {
            font-size: 1.5rem;
            color: #fff;
        }

        .nav-icon.notifications::after {
            content: '';
            position: absolute;
            top: 5px;
            right: 5px;
            width: 12px;
            height: 12px;
            background-color: red;
            border-radius: 50%;
            border: 2px solid #000;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.7);
        }

        @media (max-width: 768px) {
            nav {
                display: none;
            }

            .bottom-nav {
                user-select: none;

                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: #1d1d1d;
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 10px 0;
                border-top: 1px solid #333;
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.3);
                z-index: 999;
                border-radius: 15px 15px 0 0; 
            }

            .bottom-nav .nav-icon {
                width: 45px;
                height: 45px;
                border-radius: 50%;
                background: linear-gradient(145deg, #333, #111);
                display: flex;
                justify-content: center;
                align-items: center;
                cursor: pointer;
                transition: all 0.3s ease;
                box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            }

            .bottom-nav .nav-icon:hover {
                transform: translateY(-5px) scale(1.1);
                filter: brightness(1.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.4);
            }

            .bottom-nav .nav-icon:active {
                transform: translateY(1px) scale(0.98);
                background: linear-gradient(145deg, #222, #000);
            }

            .bottom-nav .nav-icon i {
                font-size: 1.3rem;
                color: #fff;
            }
        }

        @media (min-width: 769px) {
            .bottom-nav {
                display: none;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="nav-title">ADM V1.1™</div>
        <div class="nav-icons">
            <div class="nav-icon logout">
                <i class="material-icons">logout</i>
            </div>
            <div class="nav-icon settings">
                <i class="material-icons">settings</i>
            </div>
            <div class="nav-icon notifications">
                <i class="material-icons">notifications</i>
            </div>
        </div>
    </nav>

    <div class="bottom-nav">
        <div class="nav-icon logout">
            <i class="material-icons">logout</i>
        </div>
        <div class="nav-icon settings">
            <i class="material-icons">settings</i>
        </div>
        <div class="nav-icon notifications">
            <i class="material-icons">notifications</i>
        </div>
    </div>
</body>
