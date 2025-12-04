<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Screen</title>

    <style>
        /* Layar penuh */
        #loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom,#C3F0FD 28%, #23A1C4 72%);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.6s ease;
        }

        /* Logo + lingkaran */
        .logo-container {
            position: relative;
            width: 150px;
            height: 150px;
        }

        /* Cincin berputar di luar logo */
        .spinner-ring {
            position: absolute;
            top: 0;
            left: 0;
            width: 150px;
            height: 150px;
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 2s linear infinite;
        }

        /* Logo di tengah */
        .loading-logo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            border-radius: 20px;
            animation: morph-shape 3s ease-in-out infinite alternate;
            object-fit: cover;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes morph-shape {
            0% { border-radius: 20px; }
            100% { border-radius: 50%; }
        }
    </style>
</head>
<body>
    <!-- Loading Screen -->
    <div id="loading-screen">
        <div class="logo-container">
            <div class="spinner-ring"></div>
            <img src="{{ asset('images/logo1.jpeg') }}" alt="Logo" class="loading-logo">
        </div>
    </div>

    <script>
        // Setelah halaman dimuat, tunggu 2 detik lalu redirect
        window.addEventListener('load', () => {
            setTimeout(() => {
                // Arahkan ke route dashboard
                window.location.href = "{{ route('frontend.dashboard') }}";
            }, 2000); // 2 detik
        });
    </script>
</body>
</html>
