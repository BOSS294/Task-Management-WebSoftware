<head>

    <style>
        .add-client-container {
            text-align: center;
            max-width: 900px;
            width: 100%;
            display: flex;
            flex-direction: column;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        .add-client-container h1 {
            font-size: 2rem;
            color: #e0e0e0;
            margin-bottom: 10px;
        }

        .add-client-container p {
            font-size: 1rem;
            color: #b0b0b0;
            margin-bottom: 30px;
        }

        .form {
            display: flex;
            flex-direction: column;
            gap: 30px;
            background-color: #292929;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;

        }

        .form-group {
            position: relative;
            width: 100%;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 15px;
            font-size: 1rem;
            background-color: #1d1d1d;
            border: 1px solid #444;
            border-radius: 5px;
            color: #fff;
            outline: none;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #04c4d9;
            background-color: #222;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .form-group label {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            padding: 0 5px;
            color: #888;
            font-size: 0.9rem;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .form-group input:focus+label,
        .form-group input:not(:placeholder-shown)+label,
        .form-group textarea:focus+label,
        .form-group textarea:not(:placeholder-shown)+label {
            top: -10px;
            left: 10px;
            font-size: 0.8rem;
            color: #04c4d9;
        }

        .phone-wrapper {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .phone-wrapper input {
            flex: 1;
        }

        .phone-wrapper span {
            background-color: #1d1d1d;
            padding: 10px 15px;
            border: 1px solid #444;
            border-radius: 5px;
            color: #fff;
            font-size: 1rem;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            background: linear-gradient(90deg, #04c4d9, #0284c7);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: linear-gradient(90deg, #0284c7, #04c4d9);
        }

        label[for="phone-number"] {
            margin-left: 64px;
            font-size: 14px;

        }

        @media (max-width: 768px) {
            .add-client-container {

                max-width: 100%;
                padding: 10px;
                margin-top: -110px;
            }

            .form {
                padding: 20px;
                gap: 20px;
                margin-bottom: 50px;
            }

            .submit-btn {
                font-size: 0.9rem;
                padding: 10px;
            }

            .phone-wrapper span {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            label[for="phone-number"] {
                margin-left: 50px;
            }
        }
    </style>
</head>

<body>
    <div class="add-client-container">
        <h1>Add a New Client</h1>
        <p>Fill in the details below to add a new client to your system effortlessly.</p>
        <form class="form">
            <div class="form-group">
                <input type="text" id="client-name" placeholder=" " required>
                <label for="client-name">Client Name</label>
            </div>
            <div class="form-group phone-wrapper">
                <span>+91</span>
                <input type="text" id="phone-number" placeholder=" " required>
                <label for="phone-number">Phone Number</label>
            </div>
            <div class="form-group">
                <input type="email" id="email" placeholder=" " required>
                <label for="email">Email</label>
            </div>
            <div class="form-group">
                <input type="text" id="project-name" placeholder=" " required>
                <label for="project-name">Project Name</label>
            </div>
            <div class="form-group">
                <textarea id="project-description" placeholder=" " required></textarea>
                <label for="project-description">Project Description</label>
            </div>
            <div class="form-group">
                <input type="number" id="budget" placeholder=" " required>
                <label for="budget">Budget</label>
            </div>
            <div class="form-group">
                <input type="text" id="payment" placeholder=" " required>
                <label for="payment">Payment ( Open Balance )</label>
            </div>
            <button type="submit" class="submit-btn">Add Client</button>
        </form>
    </div>
    <script>
        document.querySelector('.form').addEventListener('submit', async (e) => {
            e.preventDefault();

            const data = {
                name: document.getElementById('client-name').value.trim(),
                phoneNumber: document.getElementById('phone-number').value.trim(),
                email: document.getElementById('email').value.trim(),
                projectName: document.getElementById('project-name').value.trim(),
                projectDescription: document.getElementById('project-description').value.trim(),
                budget: parseFloat(document.getElementById('budget').value.trim()),
                openingBalance: parseFloat(document.getElementById('payment').value.trim())
            };

            try {
                const response = await fetch('https://vanshthakur.online/Assets/Processors/add-get-client.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data),
                });

                const result = await response.json();

                if (result.success) {
                    alert('Client added successfully!');
                } else {
                    alert('Error adding client: ' + result.message);
                }
            } catch (error) {
                alert('An unexpected error occurred: ' + error.message);
            }
        });

    </script>
</body>

</html>