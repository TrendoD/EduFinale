<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Masuk - EduFinale</title>

    <!-- GLOBAL STYLES -->
    <link href="<?php echo base_url();?>login-assets/css/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="<?php echo base_url();?>login-assets/icon/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            overflow-x: hidden;
            background: white;
        }

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .login-left {
            width: 35%;
            padding: 24px 64px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            background: white;
        }

        .login-right {
            width: 65%;
            background: linear-gradient(145deg, #e8ecff 0%, #d8e0ff 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 40px;
            overflow: hidden;
            min-height: 100vh;
        }

        .illustration-container {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transform: scale(1);
            margin-left: 0;
        }

        .illustration-content {
            position: relative;
            width: 275%;
            max-width: none;
            margin: 0 auto;
            transform-origin: center center;
        }

        .illustration-1 {
            width: 100%;
            height: auto;
            opacity: 1;
            transition: opacity 0.5s ease-in-out;
        }

        .illustration-2 {
            width: 100%;
            height: auto;
            position: absolute;
            bottom: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .decoration {
            position: absolute;
            border-radius: 50%;
            z-index: 1;
        }

        .decoration-1 {
            top: 10%;
            right: 10%;
            width: 10px;
            height: 10px;
            background: #3396FF;
            animation: pulse 2s infinite;
        }

        .decoration-2 {
            bottom: 15%;
            left: 15%;
            width: 8px;
            height: 8px;
            background: #1A2942;
            animation: pulse 2s infinite 1s;
        }

        @keyframes pulse {
            0% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.2); opacity: 0.4; }
            100% { transform: scale(1); opacity: 0.8; }
        }

        .logo-container {
            margin: 0 auto;
            margin-bottom: -45px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 0;
        }

        .logo-container img {
            height: 320px;
            width: auto;
            margin: 0;
            padding: 0;
        }

        .welcome-text {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .welcome-text h1 {
            font-size: 42px;
            color: #1A2942;
            margin: 0;
            padding: 0;
            font-weight: 700;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
            transition: all 0.3s ease;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #344054;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .form-control {
            width: 100%;
            padding: 16px;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }

        .form-control:hover {
            border-color: #D1D5DB;
            box-shadow: 0 3px 6px rgba(0,0,0,0.04);
        }

        .form-control:focus {
            border-color: #3396FF;
            box-shadow: 0 0 0 4px rgba(51, 150, 255, 0.15);
            outline: none;
        }

        .form-control::placeholder {
            color: #9CA3AF;
        }

        .btn-login {
            width: 100%;
            padding: 16px;
            background: #1A2942;
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 32px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-login:hover {
            background: #3396FF;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(51, 150, 255, 0.2);
        }

        .btn-login:active {
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(51, 150, 255, 0.2);
        }

        .context-text {
            position: absolute;
            top: 40px;
            right: 40px;
            text-align: right;
            color: #1A2942;
            font-size: 14px;
            font-weight: 500;
            opacity: 0.8;
            z-index: 2;
        }

        .alert {
            border-radius: 8px;
            padding: 16px;
            margin-top: 16px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-danger {
            background-color: #fef3f2;
            border: 1px solid #fecdca;
            color: #b42318;
        }

        @keyframes float {
            0% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-10px) scale(1); }
            100% { transform: translateY(0px) scale(1); }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @media (max-width: 968px) {
            .login-container {
                flex-direction: column;
            }

            .login-left {
                width: 100%;
                padding: 40px 24px;
            }

            .login-right {
                width: 100%;
                min-height: 500px;
                padding: 24px;
            }

            .illustration-content {
                width: 120%;
                margin: 0 auto;
            }

            .context-text {
                position: relative;
                top: 0;
                right: 0;
                text-align: center;
                margin-bottom: 20px;
            }

            .logo-container img {
                height: 240px;
            }
        }

        @media (max-width: 576px) {
            .login-right {
                min-height: 400px;
            }

            .login-left {
                padding: 30px 20px;
            }

            .illustration-content {
                width: 140%;
                margin: 0 auto;
            }

            .logo-container img {
                height: 180px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-left">
            <div class="logo-container">
                <img src="<?php echo base_url();?>img/edufinale.png" alt="EduFinale Logo">
            </div>
            
            <div class="welcome-text">
                <h1>Selamat Datang</h1>
            </div>

            <form accept-charset="UTF-8" role="form" action="masuk/process" method="post">
                <div class="form-group">
                    <label class="form-label">NIM / Username</label>
                    <input class="form-control" placeholder="Masukkan NIM / Username Anda" name="nim" type="text" required="required">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input class="form-control" placeholder="Masukkan password Anda" name="password" type="password" required="required">
                </div>
                
                <input type="submit" class="btn-login" value="Masuk">
                
                <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == '1') {
                        ?>
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-circle"></i>
                            <strong>Login Gagal!</strong> Cek kembali NIM / Username dan Password Anda
                        </div>
                        <?php
                    }
                }
                ?>
            </form>
        </div>

        <div class="login-right">
            <div class="context-text">
                Selamat datang di Sistem Pengajuan Skripsi Online
            </div>
            
            <div class="decoration decoration-1"></div>
            <div class="decoration decoration-2"></div>
            
            <div class="illustration-container">
                <div class="illustration-content floating">
                    <img src="<?php echo base_url();?>img/login1.svg" alt="Illustration 1" class="illustration-1">
                    <img src="<?php echo base_url();?>img/login2.svg" alt="Illustration 2" class="illustration-2">
                </div>
            </div>
        </div>
    </div>

    <!-- GLOBAL SCRIPTS -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="<?php echo base_url();?>login-assets/js/plugins/bootstrap/bootstrap.min.js"></script>
    
    <script>
        // Form animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-2px)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });

        // Auto-hide alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                $(alert).fadeOut('slow');
            }, 5000);
        });

        // Illustration swap animation
        setInterval(() => {
            const ill1 = document.querySelector('.illustration-1');
            const ill2 = document.querySelector('.illustration-2');
            if (ill1.style.opacity === '1' || ill1.style.opacity === '') {
                ill1.style.opacity = '0';
                ill2.style.opacity = '1';
            } else {
                ill1.style.opacity = '1';
                ill2.style.opacity = '0';
            }
        }, 5000);
    </script>
</body>
</html>