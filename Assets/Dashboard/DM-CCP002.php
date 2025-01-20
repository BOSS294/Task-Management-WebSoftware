<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1d1d1d;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        .client-control-panel {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            text-align: center;
            background-color: #1d1d1d;
        }

        .client-control-panel .heading002 {
            margin-left: 27px;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff;
            text-align: center;
        }

        .client-control-panel .description002 {
            margin-left: 27px;
            font-size: 1rem;
            color: #bbb;
            margin-bottom: 40px;
            text-align: center;
        }


        .control-cards {
            display: flex;
            gap: 20px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 40px;
        }


        .control-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            background-color: #1d1d1d;
            border-radius: 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            text-align: left;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 250px;
            height: auto;
        }

        .control-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 32px rgba(0, 0, 0, 0.5);
        }


        .control-card .card-icon {
            font-size: 2.5rem;
            color: #03A9F4;
            margin-bottom: 10px;
        }


        .control-card h3 {
            font-size: 1.2rem;
            color: #ccc;
            margin: 0;
            font-weight: 600;
        }


        .control-card p {
            font-size: 1rem;
            color: #bbb;
            margin-top: 10px;
            display: block;
            text-align: center;
        }


        @media (max-width: 768px) {
            .control-cards {
                flex-direction: row;
                justify-content: space-between;
                gap: 20px;
            }

            .control-card {
                width: 45%;
                flex-direction: row;
                height: 60px;
                padding: 10px 15px;
                border-radius: 30px;
            }

            .control-card .card-icon {
                font-size: 2rem;
                margin-right: 15px;
            }

            .control-card h3 {
                font-size: 1rem;
            }


            .control-card p {
                display: none;
            }
        }
    </style>
</head>

<div class="client-control-panel">
    <h1 class="heading002">Client Control Panel</h1>
    <p class="description002">Manage your clients and specific tasks with ease. You can add new clients, manage existing
        ones, and send emails directly from here.</p>

    <div class="control-cards">
        <div class="control-card">
            <div class="card-icon material-icons">person_add</div>
            <h3>Add Client</h3>
            <p>Effortlessly add new clients to your system with just a few clicks, ensuring a smooth onboarding process.
            </p>
        </div>

        <div class="control-card">
            <div class="card-icon material-icons">manage_accounts</div>
            <h3>Manage Client</h3>
            <p>Streamline client management by easily updating client details and tracking their progress in your
                system.</p>
        </div>

        <div class="control-card">
            <div class="card-icon material-icons">task</div>
            <h3>Manage Specific Tasks</h3>
            <p>Assign, monitor, and complete tasks efficiently with an intuitive interface to ensure productivity and
                task completion.</p>
        </div>

        <div class="control-card">
            <div class="card-icon material-icons">email</div>
            <h3>Send Email</h3>
            <p>Quickly communicate with your clients by sending professional emails directly from the panel, saving you
                time and effort.</p>
        </div>
    </div>

</div>