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


        .task-cards-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .task-card {
            position: relative;
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .priority-label {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.9rem;
            font-weight: bold;
            color: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            text-transform: uppercase;
        }

        .low-priority {
            background-color: #28a745;
        }

        .medium-priority {
            background-color: #ffc107;
        }

        .high-priority {
            background-color: #dc3545;
        }

        .task-card .task-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 15px;
            margin-bottom: 5px;
        }

        .task-card .task-info div {
            text-align: left;
            color: #e0e0e0;
        }

        .task-card .task-info div h3 {
            font-size: 1.5rem;
            margin: 0;
        }

        .task-card .task-info div p {
            margin: 5px 0;
            color: #b0b0b0;
        }


        .task-card .task-buttons {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .task-card .task-buttons button {
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

        .task-card .task-buttons button.view-details {
            background-color: #2d6a4f;
        }

        .task-card .task-buttons button.update-task {
            background-color: #b35c00;
        }

        .task-card .task-buttons button.check-tasks {
            background-color: #8b0000;
        }

        .task-card .task-buttons button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .task-card .task-buttons button:active {
            transform: scale(0.95);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            filter: brightness(0.9);
        }

        .task-card .task-buttons button.view-details:hover {
            background-color: #1b4332;
        }

        .task-card .task-buttons button.update-task:hover {
            background-color: #924800;
        }

        .task-card .task-buttons button.check-tasks:hover {
            background-color: #610000;
        }

        .task-card .task-buttons button.view-details:active {
            background-color: #144025;
        }

        .task-card .task-buttons button.update-task:active {
            background-color: #723600;
        }

        .task-card .task-buttons button.check-tasks:active {
            background-color: #4b0000;
        }


        .add-task-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #1d1d1d;
            color: #ffffff;
            font-size: 2rem;
            align-content: center;
            width: 70px;
            height: 70px;
            padding: 15px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .add-task-btn:hover {
            background-color: #333333;
            transform: scale(1.1);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.5);
        }

        .add-task-btn:active {
            background-color: #444444;
            transform: scale(0.9);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }


        .status-label.pending {
            color: orange;
        }

        .status-label.working {
            color: red;
        }

        .status-label.completed {
            color: green;
        }

        .add-task-btn:focus {
            outline: none;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.4);
        }


        .add-task-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .add-task-popup .popup-content {
            background-color: #292929;
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            max-width: 600px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        }

        .AMTclose-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 1.2rem;
            color: #e0e0e0;
            background: none;
            border: none;
            cursor: pointer;
        }

        .AMTclose-btn:hover {
            color: red;
        }

        .popup-content .floating-label {
            margin-bottom: 20px;
            position: relative;
            margin-top: 20px;
        }

        .popup-content .floating-label label {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #b0b0b0;
            transition: 0.3s;
        }

        .popup-content .floating-label input,
        .popup-content .floating-label select,
        .popup-content .floating-label textarea {
            padding: 10px;
            font-size: 1rem;
            background-color: #1d1d1d;
            border: 1px solid #444;
            border-radius: 5px;
            color: #fff;
            width: 100%;
            outline: none;
        }

        .popup-content .floating-label input:focus+label,
        .popup-content .floating-label input:not(:placeholder-shown)+label,
        .popup-content .floating-label select:focus+label,
        .popup-content .floating-label textarea:focus+label {
            top: -10px;
            left: 10px;
            font-size: 0.85rem;
            color: #28a745;
        }

        .popup-content .floating-label textarea {
            height: 120px;
            resize: vertical;
        }

        .doc-id {
            font-size: 1.5rem;
            font-weight: bolder;
            background: linear-gradient(45deg, #00c6ff, #0072ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .task-card .task-info p span.task-name {
            color: #9b5de5;
            font-size: 1rem;
            letter-spacing: 0.5px;
        }


        .task-card .task-info p span.task-name::before {
            content: " ";
            color: #ddd;
        }


        @media (max-width: 768px) {
            .task-card {
                flex-direction: column;
                align-items: flex-start;
            }

            .add-task-popup .popup-content {
                width: 80%;
            }

            .add-task-btn {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
                padding: 12px;
            }

            .add-task-button {
                font-size: 1rem;
                padding: 10px 20px;
            }
        }
    </style>

</head>

<body>
    <div class="client-management">
        <h1>Task Management</h1>
        <p>Manage your tasks efficiently with an easy-to-use interface. Add, update, and track your tasks.</p>

        <div class="search-filter-wrapper">
            <input type="text" placeholder="Search tasks..." />
            <select>
                <option value="all">All Tasks</option>
                <option value="completed">Completed Tasks</option>
                <option value="pending">Pending Tasks</option>
            </select>
        </div>

        <div class="task-cards-wrapper">


            <div class="task-card">
                <div class="priority-label high-priority">High</div>
                <div class="task-info">
                    <div>
                        <h3 class="doc-id">DOC#122</h3>
                        <p>
                            Task: <span class="task-name">Task 1</span>
                        </p>
                        <p>For Client: Client Name</p>
                        <p>
                            Status:
                            <span class="status-label pending">Pending</span>
                        </p>
                        <p>Due Date: 01/01/2025</p>
                    </div>
                </div>
                <div class="task-buttons">
                    <button class="view-details">Task Details</button>
                    <button class="update-task">Update Status</button>
                    <button class="check-tasks">Remove Task</button>
                </div>
            </div>


        </div>


        <div class="add-task-btn" onclick="openPopup()">+</div>


        <div class="add-task-popup" id="addTaskPopup">
            <div class="popup-content">
                <button class="AMTclose-btn" onclick="closePopup()">X</button>
                <h3>Add New Task</h3>

                <div class="floating-label">
                    <input type="text" id="taskName" required />
                    <label for="taskName">Task Name</label>
                </div>

                <div class="floating-label">
                    <textarea id="taskDescription" required></textarea>
                    <label for="taskDescription">Task Description</label>
                </div>

                <div class="floating-label">
                    <select id="priority" required>
                        <option value="Priority">Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="floating-label">
                    <input type="date" id="dueDate" required />
                    <label for="dueDate">Due Date</label>
                </div>

                <div class="floating-label">
                    <input type="time" id="reminderTime" />
                    <label for="reminderTime">Set Reminder</label>
                </div>

                <div class="floating-label">
                        <select id="assignTo" required>
                        <option value="Assign To">Select Project </option>

                        
                    </select>
                </div>

                <button class="add-task-button" onclick="submitTask()">Add Task</button>
            </div>
        </div>
    </div>
    <div id="error-message"></div>

    <script>
        function openPopup() {
            document.getElementById("addTaskPopup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("addTaskPopup").style.display = "none";
        }
        function fetchClients() {
            const status = 'all';  

            fetch(`https://vanshthakur.online/Assets/Processors/add-get-client.php?method=GET&status=${status}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        const selectElement = document.getElementById("assignTo");

                        selectElement.innerHTML = '<option value="Assign To">Select Project</option>';

                        data.data.forEach(client => {
                            const option = document.createElement("option");
                            option.value = client.CID;  
                            option.textContent = client.ProjectName;  
                            selectElement.appendChild(option);
                        });
                    } else {
                        console.error('Error fetching clients:', data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }



        function submitTask() {
            const taskName = document.getElementById("taskName").value.trim();
            const taskDescription = document.getElementById("taskDescription").value.trim();
            const priority = document.getElementById("priority").value.trim();
            const dueDate = document.getElementById("dueDate").value.trim();
            const reminderTime = document.getElementById("reminderTime").value.trim();
            const assignTo = document.getElementById("assignTo").value.trim();

            if (!taskName) {
                displayError("Task Name is required.");
                return;
            }
            if (!assignTo) {
                displayError("Assign To field is required.");
                return;
            }

            const taskData = {
                taskName,
                taskDescription,
                priority,
                dueDate,
                reminderTime,
                assignTo,
            };

            fetch('https://vanshthakur.online/Assets/Processors/add-get-tasks.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(taskData),
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Task added successfully! TID: " + data.TID);
                        closePopup();
                    } else {
                        displayError(data.message);
                    }
                })
                .catch(error => {
                    displayError("An error occurred: " + error.message);
                });
        }

        function displayError(message) {
            const errorElement = document.getElementById('error-message'); 
            if (errorElement) {
                errorElement.textContent = message;
            } else {
                console.error('Error element not found');
            }
        }

        fetchClients();
            // Function to fetch tasks from the backend
        async function fetchTasks() {
            try {
                const response = await fetch('https://vanshthakur.online/Assets/Processors/add-get-tasks.php?action=fetch');
                const data = await response.json();

                if (data.success) {
                    renderTasks(data.data);
                } else {
                    console.error(data.message);
                }
            } catch (error) {
                console.error('Error fetching tasks:', error);
            }
        }


        function renderTasks(tasks) {
            const wrapper = document.querySelector('.task-cards-wrapper');
            wrapper.innerHTML = ''; 

                tasks.forEach(task => {
                    const card = document.createElement('div');
                    card.className = 'task-card';

                    card.innerHTML = `
                        <div class="priority-label ${task.Priority.toLowerCase()}-priority">${task.Priority}</div>
                        <div class="task-info">
                            <div>
                                <h3 class="doc-id">${task.TID}</h3>
                                <p>
                                    Task: <span class="task-name">${task.TaskName}</span>
                                </p>
                                <p>For Client: ${task.AssignTo}</p>
                                <p>
                                    Status:
                                    <span class="status-label ${task.TaskStatus.toLowerCase().replace(' ', '-')}"">${task.TaskStatus}</span>
                                </p>
                                <p>Due Date: ${task.DueDate || 'N/A'}</p>
                            </div>
                        </div>
                        <div class="task-buttons">
                            <button class="view-details" data-tid="${task.TID}">Task Details</button>
                            <button class="update-task" data-tid="${task.TID}">Update Status</button>
                            <button class="check-tasks" data-tid="${task.TID}">Remove Task</button>
                        </div>
                    `;

                    wrapper.appendChild(card);
                });

                attachButtonEvents(); // Attach event listeners to the buttons
            }

                // Function to handle button actions
        function attachButtonEvents() {
            document.querySelectorAll('.view-details').forEach(button => {
                button.addEventListener('click', () => {
                    const tid = button.getAttribute('data-tid');
                    console.log('View details for:', tid);
                    // Fetch and display the task details using the TID
                    fetch(`https://vanshthakur.online/Assets/Processors/add-get-tasks.php?tid=${tid}&action=view`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Task Details:', data.data);
                                // Add functionality to display task details in a popup/modal
                            } else {
                                console.error('Error fetching task details:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.querySelectorAll('.update-task').forEach(button => {
                button.addEventListener('click', () => {
                    const tid = button.getAttribute('data-tid');
                    console.log('Update task for:', tid);
                    fetch('https://vanshthakur.online/Assets/Processors/add-get-tasks.php', {
                        method: 'PATCH', 
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ tid, action: 'updateStatus' }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Task status updated:', data.message);
                                attachButtonEvents(); 
                            } else {
                                console.error('Error updating task:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

            document.querySelectorAll('.check-tasks').forEach(button => {
                button.addEventListener('click', () => {
                    const tid = button.getAttribute('data-tid');
                    console.log('Remove task for:', tid);
                    fetch('https://vanshthakur.online/Assets/Processors/add-get-tasks.php', {
                        method: 'DELETE',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ tid }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                console.log('Task removed successfully:', data.message);
                                // Refresh the page after successful deletion
                                location.reload();
                            } else {
                                console.error('Error removing task:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                });
            });

        }


        document.addEventListener('DOMContentLoaded', fetchTasks);

    </script>
</body>