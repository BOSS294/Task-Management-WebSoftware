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

        .client-card .task-buttons {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .client-card .task-buttons button {
            flex: 1;
            padding: 9px 9px;
            font-size: 0.6rem;
            font-weight: bolder;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .client-card .task-buttons button.view-details {
            background-color: #2d6a4f;
        }

        .client-card .task-buttons button.update-task {
            background-color: #b35c00;
        }

        .client-card .task-buttons button.check-tasks {
            background-color: #8b0000;
        }

        .client-card .task-buttons button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .client-card .task-buttons button:active {
            transform: scale(0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            filter: brightness(0.9);
        }

        .client-card .task-buttons button.view-details:hover {
            background-color: #1b4332;
        }

        .client-card .task-buttons button.update-task:hover {
            background-color: #924800;
        }

        .client-card .task-buttons button.check-tasks:hover {
            background-color: #610000;
        }

        .client-card .task-buttons button.view-details:active {
            background-color: #144025;
        }

        .client-card .task-buttons button.update-task:active {
            background-color: #723600;
        }

        .client-card .task-buttons button.check-tasks:active {
            background-color: #4b0000;
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
                        <h3>Loading...</h3>
                        <p>Project: Loading...</p>
                        <p>Open Balance: Loading...</p>
                        <p>Closing Balance: Loading...</p>
                        <p>Total Tasks Pending: Loading...</p>
                        <p>Total Tasks Completed: Loading...</p>
                    </div>
                </div>
                <div class="task-buttons">
                    <button class="view-details">View/Update</button>
                    <button class="update-task">Update Status</button>
                    <button class="check-tasks">Remove Client</button>
                </div>
            </div>

        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const clientCardsWrapper = document.querySelector('.client-cards-wrapper');

        // Fetch clients from the backend
        fetch('https://vanshthakur.online/Assets/Processors/add-get-client.php?status=all')
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    clientCardsWrapper.innerHTML = ''; // Clear previous cards
                    data.data.forEach(client => {
                        const clientCard = document.createElement('div');
                        clientCard.classList.add('client-card');

                        clientCard.innerHTML = `
                            <div class="client-info">
                             <div>
                                <h3>${client.Name}</h3>
                                <p>Project: ${client.ProjectName}</p>
                                <p>Open Balance: ₹${client.OpeningBalance}</p>
                                <p>Closing Balance: ₹${client.ClosingBalance}</p>
                                <p>Phone: ${client.PhoneNumber}</p>
                                <p>Status: ${client.ClientStatus}</p>
                             </div>

                            </div>
                          <div class="task-buttons">
                            <button class="view-details">View/Update</button>
                            <button class="update-task">Update Status</button>
                            <button class="check-tasks">Remove</button>
                          </div>
                        `;
                        clientCardsWrapper.appendChild(clientCard);
                    });
                } else {
                    console.error(data.message);
                }
            })
            .catch(error => console.error('Error fetching clients:', error));
    });
</script>

</body>