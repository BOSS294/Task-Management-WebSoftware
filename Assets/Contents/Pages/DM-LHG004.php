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

        .search-filter-wrapper input,
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
            flex-direction: column;
        }

        .client-card .client-info {
            text-align: left;
            color: #e0e0e0;
        }

        .client-card .client-info h3 {
            font-size: 1.5rem;
            margin: 0 0 5px;
        }

        .client-card .client-info p {
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
            padding: 9px;
            font-size: 0.75rem;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .client-card .task-buttons button.view-contact { background-color: #2d6a4f; }
        .client-card .task-buttons button.complete-research { background-color: #b35c00; }
        .client-card .task-buttons button.update-status { background-color: #8b0000; }

        .client-card .task-buttons button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
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
        <p>Track and manage leads efficiently.</p>

        <div class="search-filter-wrapper">
            <input type="text" placeholder="Search clients..." />
            <select>
                <option value="all">All Leads</option>
                <option value="still-lead">Still a Lead</option>
                <option value="called">Called</option>
                <option value="client-dumped">Client Dumped</option>
                <option value="success">Success</option>
            </select>
        </div>

        <div class="client-cards-wrapper">
            <div class="client-card">
                <div class="client-info">
                    <h3>Loading...</h3>
                    <p>Business: Loading...</p>
                    <p>Nature: Loading...</p>
                    <p>Research: Loading...</p>
                    <p>Contacts: Loading...</p>
                    <p>Status: Loading...</p>
                </div>
                <div class="task-buttons">
                    <button class="view-contact">View Contact</button>
                    <button class="complete-research">Complete Research</button>
                    <button class="update-status">Update Status</button>
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
                                <h3>${client.Name}</h3>
                                <p>Business: ${client.Business}</p>
                                <p>Nature: ${client.BusinessNature}</p>
                                <p>Research: ${client.ResearchStatus === "1" ? "Done" : "Not Done"}</p>
                                <p>Contacts: ${client.Phone1}${client.Phone2 ? ", " + client.Phone2 : ""}${client.Phone3 ? ", " + client.Phone3 : ""}</p>
                                <p>Status: ${client.ClientStatus}</p>
                            </div>
                            <div class="task-buttons">
                                <button class="view-contact">View Contact</button>
                                <button class="complete-research">Complete Research</button>
                                <button class="update-status">Update Status</button>
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
