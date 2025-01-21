
<head>
    <style>
        .STMO003 {
            width: 85%;
            max-width: 1200px;
            padding: 25px;
            margin: 20px auto;
            border-radius: 12px;
            margin-top:80px;

        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 32px;
            color: #00bcd4;
        }

        .search-STMO003 {
            text-align: center;
            position: relative;
            margin-bottom: 40px;
        }

        #clientSearch {
            width: 75%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #00bcd4;
            border-radius: 8px;
            background-color: #1d1d1d;
            color: #e0e0e0;
        }

        .suggestions-list {
            position: absolute;
            top: 50px;
            left: 12.5%;
            width: 75%;
            background-color: #292929;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-height: 150px;
            overflow-y: auto;
            z-index: 10;
        }

        .suggestions-list li {
            padding: 10px;
            color: #e0e0e0;
            cursor: pointer;
            border-bottom: 1px solid #444;
        }

        .suggestions-list li:hover {
            background-color: #00bcd4;
            color: #121212;
        }

        .tasks-STMO003 {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .task-card {
            background-color: #222;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.6);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .task-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.8);
        }

        .task-card h3 {
            font-size: 18px;
            color: #00bcd4;
        }

        .task-card p {
            font-size: 14px;
            color: #e0e0e0;
            margin: 10px 0;
        }

        .task-card .task-status {
            font-weight: bold;
            color: #00bcd4;
        }

        .task-card .task-due {
            color: #ff9800;
        }

        .task-card .task-created {
            color: #9e9e9e;
        }

        @media (max-width: 768px) {
            .STMO003 {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 28px;
            }

            #clientSearch {
                width: 90%;
            }

            .tasks-STMO003 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="STMO003">
        <header>
            <h1>Specific Client Task Listing</h1>
        </header>
        
        <div class="search-STMO003">
            <input type="text" id="clientSearch" placeholder="Enter Client Name">
            <ul id="suggestions" class="suggestions-list"></ul>
        </div>
        
        <div id="tasksSTMO003" class="tasks-STMO003">
        </div>
    </div>

    <script>
        const clients = [
            { name: "Client A", tasks: [
                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },
                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 1", description: "Description for Task 1", status: "Pending", createdOn: "2025-01-01", dueOn: "2025-01-10" },

                { title: "Task 2", description: "Description for Task 2", status: "Completed", createdOn: "2025-01-02", dueOn: "2025-01-15" }
            ] },
            { name: "Client B", tasks: [
                { title: "Task 3", description: "Description for Task 3", status: "In Progress", createdOn: "2025-01-05", dueOn: "2025-01-20" },
                { title: "Task 4", description: "Description for Task 4", status: "Pending", createdOn: "2025-01-06", dueOn: "2025-01-18" }
            ] }
        ];

        const clientSearchInput = document.getElementById("clientSearch");
        const suggestionsList = document.getElementById("suggestions");
        const tasksSTMO003 = document.getElementById("tasksSTMO003");

        clientSearchInput.addEventListener("input", function() {
            const query = clientSearchInput.value.toLowerCase();
            const matchedClients = clients.filter(client => client.name.toLowerCase().includes(query));

            suggestionsList.innerHTML = "";
            if (matchedClients.length > 0 && query.length > 0) {
                matchedClients.forEach(client => {
                    const suggestionItem = document.createElement("li");
                    suggestionItem.textContent = client.name;
                    suggestionItem.addEventListener("click", () => showClientTasks(client));
                    suggestionsList.appendChild(suggestionItem);
                });
                suggestionsList.style.display = "block";
            } else {
                suggestionsList.style.display = "none";
            }
        });

        function showClientTasks(client) {
            clientSearchInput.value = client.name;
            suggestionsList.style.display = "none";

            tasksSTMO003.innerHTML = "";

            client.tasks.forEach(task => {
                const taskCard = document.createElement("div");
                taskCard.classList.add("task-card");

                taskCard.innerHTML = `
                    <h3>${task.title}</h3>
                    <p>${task.description}</p>
                    <p><span class="task-status">Status: ${task.status}</span></p>
                    <p><span class="task-created">Created On: ${task.createdOn}</span></p>
                    <p><span class="task-due">Due On: ${task.dueOn}</span></p>
                `;

                tasksSTMO003.appendChild(taskCard);
            });
        }
    </script>
</body>
</html>
