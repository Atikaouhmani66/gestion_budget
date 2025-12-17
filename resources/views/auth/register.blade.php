<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription | BudgetZen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --accent-color: #4cc9f0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color), var(--accent-color));
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }
        
        .register-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .logo-container img {
            height: 60px;
            margin-bottom: 15px;
        }
        
        .logo-container h2 {
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }
        
        .logo-container p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 201, 240, 0.25);
            color: white;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .form-label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }
        
        .btn-register {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }
        
        .btn-register:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
        }
        
        .login-link {
            text-align: center;
            margin-top: 25px;
            color: rgba(255, 255, 255, 0.8);
        }
        
        .login-link a {
            color: white;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .login-link a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }
        
        .input-error {
            color: #ff6b6b;
            font-size: 0.875rem;
            margin-top: -15px;
            margin-bottom: 15px;
        }
        
        .password-strength {
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 2px;
            margin-top: -15px;
            margin-bottom: 15px;
            overflow: hidden;
        }
        
        .strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s ease, background 0.3s ease;
        }
        
        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .register-container {
            animation: fadeIn 0.6s ease-out forwards;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo-container">
            <img src="{{ asset('/images/logo.webp') }}" alt="BudgetZen Logo">
            <h2>Créez votre compte</h2>
            <p>Commencez à gérer vos finances en toute sérénité</p>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="form-label">Nom complet</label>
                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Votre nom">
                @if ($errors->has('name'))
                    <div class="input-error">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="form-label">Adresse Email</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="votre@email.com">
                @if ($errors->has('email'))
                    <div class="input-error">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="form-label">Mot de passe</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="••••••••">
                <div class="password-strength">
                    <div class="strength-bar" id="strength-bar"></div>
                </div>
                @if ($errors->has('password'))
                    <div class="input-error">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="form-label">Confirmez le mot de passe</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••">
                @if ($errors->has('password_confirmation'))
                    <div class="input-error">
                        {{ $errors->first('password_confirmation') }}
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus me-2"></i> S'inscrire
            </button>
        </form>

        <div class="login-link">
            Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Indicateur de force du mot de passe
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('strength-bar');
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Longueur minimale
            if (password.length >= 8) strength += 1;
            
            // Contient des lettres minuscules et majuscules
            if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
            
            // Contient des chiffres
            if (password.match(/([0-9])/)) strength += 1;
            
            // Contient des caractères spéciaux
            if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
            
            // Mise à jour de la barre de force
            switch(strength) {
                case 0:
                    strengthBar.style.width = '0%';
                    strengthBar.style.background = '#ff6b6b';
                    break;
                case 1:
                    strengthBar.style.width = '25%';
                    strengthBar.style.background = '#ff6b6b';
                    break;
                case 2:
                    strengthBar.style.width = '50%';
                    strengthBar.style.background = '#feca57';
                    break;
                case 3:
                    strengthBar.style.width = '75%';
                    strengthBar.style.background = '#48dbfb';
                    break;
                case 4:
                    strengthBar.style.width = '100%';
                    strengthBar.style.background = '#1dd1a1';
                    break;
            }
        });
    </script>
</body>
</html>