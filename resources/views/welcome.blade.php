<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BudgetZen | Gestion de budget intelligente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        /* Navbar stylée */
        .navbar {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        
        .nav-link {
            color: white !important;
            margin: 0 10px;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .nav-link:hover {
            color: var(--accent-color) !important;
        }
        
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: var(--accent-color);
            transition: width 0.3s ease;
        }
        
        .nav-link:hover::after {
            width: 100%;
        }
        
        /* Boutons */
        .btn-custom {
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-primary-custom {
            background-color: white;
            color: var(--primary-color);
        }
        
        .btn-primary-custom:hover {
            background-color: var(--light-color);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }
        
        .btn-success-custom {
            background-color: #2ecc71;
            color: white;
        }
        
        .btn-success-custom:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(46, 204, 113, 0.3);
        }
        
        /* Contenu principal */
        .hero-section {
            padding: 100px 0;
            text-align: center;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        
        .hero-subtitle {
            font-size: 1.5rem;
            font-weight: 300;
            margin-bottom: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* Sections */
        .section {
            padding: 80px 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            text-align: center;
        }
        
        /* Features cards */
        .features-section {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 20px;
        }
        
        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 30px;
            margin: 15px;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: var(--accent-color);
        }
        
        /* À propos section */
        .about-content {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid rgba(255, 255, 255, 0.2);
            margin-bottom: 15px;
        }
        
        /* Contact section */
        .contact-form {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 20px;
            padding: 40px;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding: 12px 15px;
            margin-bottom: 20px;
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.7);
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.25rem rgba(76, 201, 240, 0.25);
        }
        
        .contact-info {
            margin-top: 40px;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .contact-icon {
            font-size: 1.5rem;
            color: var(--accent-color);
            margin-right: 15px;
            width: 40px;
            text-align: center;
        }
        
        /* Animation */
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
            
            .navbar-brand {
                font-size: 1.2rem;
            }
            
            .navbar-brand img {
                height: 30px;
            }
            
            .section {
                padding: 60px 0;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar améliorée -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/images/logo.webp') }}" alt="BudgetZen Logo">
                BudgetZen
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fonctionnalités</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">À propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                
                <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
                    <a href="{{ route('login') }}" class="btn btn-primary-custom btn-custom me-2">
                        <i class="fas fa-sign-in-alt me-2"></i>Connexion
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-success-custom btn-custom">
                        <i class="fas fa-user-plus me-2"></i>Inscription
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <h1 class="hero-title animate__animated animate__fadeInDown">
                        Prenez le contrôle de vos finances avec <span class="text-warning">BudgetZen</span>
                    </h1>
                    <p class="hero-subtitle animate__animated animate__fadeIn animate__delay-1s">
                        La solution intelligente pour gérer votre budget, épargner plus et atteindre vos objectifs financiers sans stress.
                    </p>
                    <div class="animate__animated animate__fadeIn animate__delay-2s">
                        <a href="{{ route('register') }}" class="btn btn-success-custom btn-custom btn-lg">
                            <i class="fas fa-rocket me-2"></i>Commencer gratuitement
                        </a>
                    </div>
                    
                    <div class="mt-5 animate__animated animate__fadeIn animate__delay-3s animate-float">
                        <img src="/images/icone3.png" alt="Finance illustration" style="height: 200px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2)); background-color: transparent;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section features-section">
        <div class="container">
            <h2 class="section-title">Pourquoi choisir BudgetZen ?</h2>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Analyses détaillées</h3>
                        <p>Visualisez vos dépenses et revenus avec des graphiques clairs et des rapports personnalisés.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h3>Alertes intelligentes</h3>
                        <p>Recevez des notifications lorsque vous dépassez votre budget ou quand une facture est due.</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3>Sécurité renforcée</h3>
                        <p>Vos données sont chiffrées et protégées avec les standards les plus élevés de sécurité.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- À propos Section -->
    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title">À propos de BudgetZen</h2>
            
            <div class="about-content">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h3>Notre mission</h3>
                        <p>BudgetZen est né de la volonté de simplifier la gestion des finances personnelles pour tout le monde. Nous croyons que la gestion de l'argent ne devrait pas être une source de stress, mais plutôt un moyen d'atteindre ses rêves.</p>
                        <p>Notre plateforme combine des outils puissants avec une interface intuitive pour vous aider à prendre le contrôle de vos finances en toute sérénité.</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Équipe BudgetZen" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            
            <h3 class="text-center mb-4">Notre équipe</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="/images/icone2.png" alt="Membre d'équipe">
                        <h4>hanane el_anbari</h4>
                        <p>Développeur</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="/images/icone.png" alt="Membre d'équipe">
                        <h4>Atika Ouhmani</h4>
                        <p>Développeur </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="team-member">
                        <img src="/images/icone4.png" alt="Membre d'équipe">
                        <h4>AAAAAAA HHHHHHHH</h4>
                        <p>Designer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <h2 class="section-title">Contactez-nous</h2>
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre nom" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Votre email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Sujet">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" placeholder="Votre message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success-custom btn-custom">
                                <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                            </button>
                        </form>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="contact-info">
                        <h3>Nos coordonnées</h3>
                        <p>Nous sommes toujours ravis d'entendre nos utilisateurs. N'hésitez pas à nous contacter pour toute question ou suggestion.</p>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h5>Adresse</h5>
                                <p>Beni Mellal </p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                <h5>Téléphone</h5>
                                <p>0609876521</p>
                            </div>
                        </div>
                        
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h5>Email</h5>
                                <p>atikaouhmani66@gmail.com</p>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center py-4">
        <div class="container">
            <p class="mb-0">© 2025 BudgetZen. Tous droits réservés.</p>
            <div class="mt-3">
                <a href="https://www.facebook.com/profile.php?id=100088150794320" class="text-white mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/atika.on?igsh=aXEzbWhocmJxOHd4" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/in/atika-ouhmani-389b6830a" class="text-white mx-2"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animation au scroll
        document.addEventListener('DOMContentLoaded', function() {
            const animateElements = document.querySelectorAll('.feature-card, .about-content, .team-member, .contact-form, .contact-info');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = 1;
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            animateElements.forEach((element, index) => {
                element.style.opacity = 0;
                element.style.transform = 'translateY(50px)';
                element.style.transition = `all 0.5s ease ${index * 0.1}s`;
                observer.observe(element);
            });
            
            // Smooth scrolling pour les liens de la navbar
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        });
    </script>
</body>
</html>