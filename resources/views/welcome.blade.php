<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Inventory Management</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #00660eff;
            --white: #ffffff;
            --gray-light: #f8f9fa;
            --gray: #6c757d;
            --dark: #212529;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: var(--white);
            color: var(--dark);
            overflow-x: hidden;
        }

        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, rgba(248, 249, 250, 0.9) 0%, rgba(255, 255, 255, 1) 100%);
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 200%;
            background: radial-gradient(circle, rgba(67, 97, 238, 0.05) 0%, rgba(255, 255, 255, 0) 70%);
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            line-height: 1.2;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1rem;
            color: var(--gray);
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .go-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 7px 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 10px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px -5px rgba(5, 228, 16, 0.3);
        }

        .go-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -5px rgba(67, 97, 238, 0.4);
        }

        .go-btn::after {
            content: '→';
            position: absolute;
            right: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0;
            transition: all 0.3s ease;
        }

        .go-btn:hover::after {
            opacity: 1;
            right: 1rem;
        }

        .hero-image {
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            animation: float 6s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            overflow: hidden;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(67, 97, 238, 0.05);
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: -100px;
            right: -100px;
        }

        .shape-2 {
            width: 150px;
            height: 150px;
            bottom: 50px;
            left: -50px;
        }

        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                text-align: center;
                padding-top: 5rem;
                padding-bottom: 5rem;
            }
            
            .hero-title {
                font-size: 1.5rem;
            }
            
            .hero-subtitle {
                margin-left: auto;
                margin-right: auto;
            }
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
        </div>
        
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h4 class="hero-title">Inventory Management System</h4>
                    <p class="hero-subtitle"><b>Inventory:</b> http://127.0.0.1:8000/api/inventory <br> <b>Inventory Details:</b> http://127.0.0.1:8000/api/inventory/{id} <br> <b>Update Stock:</b> http://127.0.0.1:8000/api/inventory/update/{id} <br> <b>Perform Transaction:</b> http://127.0.0.1:8000/api/transaction</p>
                        <hr class="border-start">
                    <p class="hero-subtitle"><b>See logs:</b> http://127.0.0.1:8000/api/audit-logs </p>

                    <a href="http://127.0.0.1:8000/api/inventory"><button class="go-btn rounded-0">Go</button></a>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://voyager.postman.com/illustration/diagram-what-is-an-api-postman-illustration.svg" alt="Inventory Dashboard" class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Button hover effect enhancement
        const goBtn = document.querySelector('.go-btn');
        
        goBtn.addEventListener('mouseenter', function() {
            this.style.paddingRight = '3.5rem';
        });
        
        goBtn.addEventListener('mouseleave', function() {
            this.style.paddingRight = '2.5rem';
        });
        
    </script>
</body>
</html>