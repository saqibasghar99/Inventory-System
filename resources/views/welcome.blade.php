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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>=
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