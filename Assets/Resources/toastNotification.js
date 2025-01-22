(function () {

    const styles = `
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Toast container at the top-right */
        .toast-container {
            position: fixed;
            top: 100px;
            right: 20px;
            z-index: 9999;
            max-width: 500px;
            width: auto;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        /* Toast notification styling */
        .toast {
            padding: 12px 14px;
            margin-bottom: 20px;
            border-radius: 12px;
            color: white;
            font-size: 18px;
            font-weight: bold;
            line-height: 1.6;
            max-width: 100%;
            word-wrap: break-word;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(-50px);
            transition: opacity 0.5s ease, transform 0.5s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Color schemes for success, error, and info */
        .toast.success {
            background-color: #28a745; /* Green */
        }

        .toast.error {
            background-color: #dc3545; /* Red */
        }

        .toast.info {
            background-color: #007bff; /* Blue */
        }

        /* Enhanced hover effect */
        .toast:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
            transform: translateY(-5px);
        }

        /* Responsive styles for smaller screens */
        @media (max-width: 600px) {
            .toast {
                font-size: 16px;
                padding: 14px 22px;
            }
        }

        /* Toast container at the bottom-right */
        .toast-container.bottom-right {
            bottom: 20px;
            top: auto;
            right: 20px;
        }

        /* Toast container at the top-left */
        .toast-container.top-left {
            top: 20px;
            right: auto;
            left: 20px;
        }

        /* Toast container at the bottom-left */
        .toast-container.bottom-left {
            bottom: 20px;
            top: auto;
            left: 20px;
        }
    `;


    const styleSheet = document.createElement("style");
    styleSheet.type = "text/css";
    styleSheet.innerText = styles;
    document.head.appendChild(styleSheet);


    let isAudioAllowed = false;


    window.addEventListener('click', () => {
        isAudioAllowed = true;
    });

    function playSound(type) {
        if (!isAudioAllowed) {
            return;
        }

        const sounds = {
            success: 'https://www.soundjay.com/button/beep-07.wav',
            error: 'https://www.soundjay.com/button/beep-09.wav',
            info: 'https://www.soundjay.com/button/beep-10.wav'
        };

        const audio = new Audio(sounds[type]);
        audio.play();
    }

    function showToast(message, type = 'info', position = 'top-right') {

        let toastContainer = document.getElementById('toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            toastContainer.classList.add('toast-container', position);
            document.body.appendChild(toastContainer);
        }


        const toast = document.createElement('div');
        toast.classList.add('toast', type);
        toast.setAttribute('role', 'alert');
        toast.setAttribute('aria-live', 'assertive');
        toast.innerHTML = message;


        toastContainer.appendChild(toast);


        setTimeout(() => {
            toast.classList.add('show');
        }, 10);


        playSound(type);


        toast.addEventListener('click', () => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        });


        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 4000);
    }


    window.showToast = showToast;
})();
