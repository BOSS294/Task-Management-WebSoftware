<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            text-align: center;
            padding: 40px 20px;
            margin-top: 60px;

        }

        .main-container h1 {
            font-size: 2.5rem;
            color: #fff;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .main-container p {
            font-size: 1.2rem;
            color: #bbb;
            margin-bottom: 40px;
        }

        .Analytics-section {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .analytics-card {
            width: 280px;
            height: 220px;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            text-align: center;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            transition: transform 0.3s, box-shadow 0.3s ease-in-out;
            position: relative;
            background-color: #1d1d1d; 
        }

        .analytics-card:hover {
            transform: translateY(-8px); 
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5); 
        }

        .analytics-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: #ccc;
            margin-bottom: 10px;
        }

        .count {
            font-size: 3.5rem;
            font-weight: bold;
            color: #fff;
            border-radius: 10px;
            padding: 20px 30px;
            transform: perspective(1000px) rotateX(0deg);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .analytics-card:hover .count {
            transform: perspective(1000px) rotateX(10deg); 
            border-radius: 60%;
        }

        .total-tasks .count {
            color: #4CAF50;
        }

        .pending-tasks .count {
            color: #FF5722; 
        }

        .completed-tasks .count {
            color: #03A9F4;
        }

    @media (max-width: 768px) {

            .main-container {
                padding: 20px 10px;
                margin-top: -30px;
            }

            .main-container h1 {
                font-size: 1.8rem;
                margin-bottom: 8px;
            }

            .main-container p {
                font-size: 1rem;
                margin-bottom: 20px;
            }

            .Analytics-section {
                flex-direction: column;
                gap: 15px;
            }

            .analytics-card {
                width: 90%;  
                max-width: 320px;
                height: 125px;
                padding: 15px;
            }

            .analytics-card h3 {
                font-size: 1rem;
                margin-bottom: 5px;
            }

            .count {
                font-size: 2.5rem;
                padding: 15px 25px;
            }

            .analytics-card:hover {
                transform: translateY(-4px);
            }
    }
    </style>
</head>


    <div class="main-container">
        <h1>Quick Analysis</h1>
        <p>Here is a quick snapshot of the tasks status</p>
        <div class="Analytics-section">
            <div class="analytics-card total-tasks">
                <h3>Total Tasks</h3>
                <div class="count">120</div>
            </div>

            <div class="analytics-card pending-tasks">
                <h3>Pending Tasks</h3>
                <div class="count">40</div>
            </div>

            <div class="analytics-card completed-tasks">
                <h3>Completed Tasks</h3>
                <div class="count">80</div>
            </div>
        </div>
    </div>

