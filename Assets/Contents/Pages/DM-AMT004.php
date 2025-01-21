<head>
    <style>
        /* Container Styling */
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

        /* Search and Filter Wrapper */
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

        /* Task Card Styling */
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
            border-radius: 5px;
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

        /* Task Buttons */
        .task-card .task-buttons button {
            padding: 8px;
            font-size: 0.8rem;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.1s ease;
        }

        .task-card .task-buttons button.view-details {
            background-color: #28a745;
        }

        .task-card .task-buttons button.update-task {
            background-color: #ffc107;
        }

        .task-card .task-buttons button.check-tasks {
            background-color: #dc3545;
        }

        .task-card .task-buttons button:hover {
            transform: scale(1.05);
        }

        .task-card .task-buttons button:active {
            transform: scale(0.95);
        }

        .task-card .task-buttons button.view-details:hover {
            background-color: #218838;
        }

        .task-card .task-buttons button.update-task:hover {
            background-color: #e0a800;
        }

        .task-card .task-buttons button.check-tasks:hover {
            background-color: #c82333;
        }

        .task-card .task-buttons button.view-details:active {
            background-color: #1e7e34;
        }

        .task-card .task-buttons button.update-task:active {
            background-color: #d39e00;
        }

        .task-card .task-buttons button.check-tasks:active {
            background-color: #bd2130;
        }

        /* Add Task Button */
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

        .add-task-btn:focus {
            outline: none;
            box-shadow: 0 0 12px rgba(255, 255, 255, 0.4);
        }

        /* Add Task Popup */
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

        .popup-content .floating-label input:focus + label,
        .popup-content .floating-label input:not(:placeholder-shown) + label,
        .popup-content .floating-label select:focus + label,
        .popup-content .floating-label textarea:focus + label {
            top: -10px;
            left: 10px;
            font-size: 0.85rem;
            color: #28a745;
        }

        .popup-content .floating-label textarea {
            height: 120px;
            resize: vertical;
        }

        /* Responsive Media Queries */
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
                    <h3>Task Name</h3>
                    <p>For Client: Client Name</p>
                    <p>Status: Pending</p>
                    <p>Due Date: 01/01/2025</p>
                </div>
            </div>
            <div class="task-buttons">
                <button class="view-details">View Task Details</button>
                <button class="update-task">Update Status</button>
                <button class="check-tasks">Remove Task</button>
            </div>
        </div>
        <div class="task-card">
            <div class="priority-label medium-priority">medium</div>
            <div class="task-info">
                <div>
                    <h3>Task Name</h3>
                    <p>For Client: Client Name</p>
                    <p>Status: Pending</p>
                    <p>Due Date: 01/01/2025</p>
                </div>
            </div>
            <div class="task-buttons">
                <button class="view-details">View Task Details</button>
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
                        <option value="Assign To">Assign To </option>

                        <option value="client1">Client 1</option>
                        <option value="client2">Client 2</option>
                        <option value="client3">Client 3</option>
                    </select>
                </div>

                <button class="add-task-button" onclick="submitTask()">Add Task</button>
            </div>
        </div>
    </div>

    <script>
        function openPopup() {
            document.getElementById("addTaskPopup").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("addTaskPopup").style.display = "none";
        }

        function submitTask() {
            const taskName = document.getElementById("taskName").value;
            const taskDescription = document.getElementById("taskDescription").value;
            const priority = document.getElementById("priority").value;
            const dueDate = document.getElementById("dueDate").value;
            const reminderTime = document.getElementById("reminderTime").value;
            const assignTo = document.getElementById("assignTo").value;

            console.log("Task Added:", taskName, taskDescription, priority, dueDate, reminderTime, assignTo);

            closePopup();
        }
    </script>
</body>