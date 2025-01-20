<head>
    <style>
        .client-management {
            text-align: center;
            max-width: 1200px;
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
            margin: 0 auto;
            margin-top: 90px;
        }

        .client-management h1 {
            font-size: 2.5rem;
            color: #e0e0e0;
            margin-bottom: 10px;
        }

        .client-management p {
            font-size: 1rem;
            color: #b0b0b0;
            margin-bottom: 30px;
        }

        .search-filter-wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            width: 100%;
        }

        .search-filter-wrapper input {
            padding: 10px;
            font-size: 1rem;
            background-color: #1d1d1d;
            border: 1px solid #444;
            border-radius: 5px;
            color: #fff;
            outline: none;
            width: 48%;
        }

        .search-filter-wrapper select {
            padding: 10px;
            font-size: 1rem;
            background-color: #1d1d1d;
            border: 1px solid #444;
            border-radius: 5px;
            color: #fff;
            outline: none;
            width: 48%;
        }


        .client-cards-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .client-card {
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            display: flex;
            justify-content: space-between;
            align-items: left;
            flex-direction: column;
        }

        .client-card .client-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 15px;
            margin-bottom: 5px;
        }


        .client-card .client-info div {
            text-align: left;
            color: #e0e0e0;
        }

        .client-card .client-info div h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .client-card .client-info div p {
            margin: 5px 0;
            color: #b0b0b0;
        }

        .client-card .client-buttons button {
            padding: 8px;
            font-size: 0.8rem;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .client-card .client-buttons button.view-details {
            background-color: #28a745;
        }

        .client-card .client-buttons button.update-balance {
            background-color: #ffc107;
        }

        .client-card .client-buttons button.check-tasks {
            background-color: #dc3545;
        }

        .client-card .client-buttons button:hover {
            transform: scale(1.05);
        }

        .client-card .client-buttons button:active {
            transform: scale(0.95);
        }

        .client-card .client-buttons button.view-details:hover {
            background-color: #218838;
        }

        .client-card .client-buttons button.update-balance:hover {
            background-color: #e0a800;
        }

        .client-card .client-buttons button.check-tasks:hover {
            background-color: #c82333;
        }

        .client-card .client-buttons button.view-details:active {
            background-color: #1e7e34;
        }

        .client-card .client-buttons button.update-balance:active {
            background-color: #d39e00;
        }

        .client-card .client-buttons button.check-tasks:active {
            background-color: #bd2130;
        }


        @media (max-width: 768px) {
            .client-management {
                max-width: 100%;
                padding: 10px;
            }

            .client-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .client-card .client-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-filter-wrapper input,
            .search-filter-wrapper select {
                width: 48%;
            }
        }
    </style>
</head>

<body>
    <div class="client-management">
        <h1>Client Management</h1>
        <p>Manage your clients, monitor their progress, and update their details effortlessly from this page.</p>

        <div class="search-filter-wrapper">
            <input type="text" placeholder="Search clients..." />
            <select>
                <option value="all">All Clients</option>
                <option value="active">Active Clients</option>
                <option value="inactive">Inactive Clients</option>
            </select>
        </div>

        <div class="client-cards-wrapper">

            <div class="client-card">
                <div class="client-info">
                    <div>
                        <h3>Client 1</h3>
                        <p>Project: Project Alpha</p>
                        <p>Open Balance: ₹5000</p>
                        <p>Closing Balance: ₹4500</p>
                        <p>Total Tasks Pending: 5</p>
                        <p>Total Tasks Completed: 10</p>
                    </div>
                </div>
                <div class="client-buttons">
                    <button class="view-details">View Details</button>
                    <button class="update-balance">Update Balance</button>
                    <button class="check-tasks">Check Tasks</button>

                </div>
            </div>


            <div class="client-card">
                <div class="client-info">
                    <div>
                        <h3>Client 2</h3>
                        <p>Project: Project Beta</p>
                        <p>Open Balance: ₹7000</p>
                        <p>Closing Balance: ₹6500</p>
                        <p>Total Tasks Pending: 3</p>
                        <p>Total Tasks Completed: 7</p>
                    </div>
                </div>
                <div class="client-buttons">
                    <button class="view-details">View Details</button>
                    <button class="update-balance">Update Balance</button>
                    <button class="check-tasks">Check Tasks</button>

                </div>
            </div>


            <div class="client-card">
                <div class="client-info">
                    <div>
                        <h3>Client 3</h3>
                        <p>Project: Project Gamma</p>
                        <p>Open Balance: ₹8000</p>
                        <p>Closing Balance: ₹7600</p>
                        <p>Total Tasks Pending: 2</p>
                        <p>Total Tasks Completed: 12</p>
                    </div>
                </div>
                <div class="client-buttons">
                    <button class="view-details">View Details</button>
                    <button class="update-balance">Update Balance</button>
                    <button class="check-tasks">Check Tasks</button>

                </div>
            </div>


            <div class="client-card">
                <div class="client-info">
                    <div>
                        <h3>Client 4</h3>
                        <p>Project: Project Delta</p>
                        <p>Open Balance: ₹6000</p>
                        <p>Closing Balance: ₹5500</p>
                        <p>Total Tasks Pending: 8</p>
                        <p>Total Tasks Completed: 4</p>
                    </div>
                </div>
                <div class="client-buttons">
                    <button class="view-details">View Details</button>
                    <button class="update-balance">Update Balance</button>
                    <button class="check-tasks">Check Tasks</button>

                </div>
            </div>


            <div class="client-card">
                <div class="client-info">
                    <div>
                        <h3>Client 5</h3>
                        <p>Project: Project Epsilon</p>
                        <p>Open Balance: ₹2000</p>
                        <p>Closing Balance: ₹1500</p>
                        <p>Total Tasks Pending: 1</p>
                        <p>Total Tasks Completed: 15</p>
                    </div>
                </div>
                <div class="client-buttons">
                    <button class="view-details">View Details</button>
                    <button class="update-balance">Update Balance</button>
                    <button class="check-tasks">Check Tasks</button>

                </div>
            </div>
        </div>
    </div>
</body>