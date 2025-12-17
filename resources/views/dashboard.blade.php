@extends('layouts.app')

@section('content')
<div class="minimal-dashboard">
    <!-- Sidebar Simplifiée -->
    <div class="sidebar">
        <div class="logo">
            <i class="fas fa-coins"></i>
            <span>BudgetZen</span>
        </div>
        
        <nav>
            <a href="#" class="active">
                <i class="fas fa-home"></i>
                <span>Accueil</span>
            </a>
            <a href="{{ route('transactions.index') }}">
                <i class="fas fa-exchange-alt"></i>
                <span>Historique</span>
            </a>
            <a href="{{ route('graphique') }}">
                <i class="fas fa-chart-line"></i> <!-- Icône pour Graphique -->
                <span>Graphique</span>
            </a>
            
        </nav>

        
        <div class="logout">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Déconnexion</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </div>

    <!-- Contenu Principal -->
    <main class="main-content">
        <header>
            <h1>Bonjour, {{ Auth::user()->name }}</h1>
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
            </div>
        </header>
        
        <div class="welcome-message">
            <p>Bienvenue dans votre espace BudgetZen 🪙</p>
        </div>
        
        <!-- Bouton d'action principal -->
        <div class="main-action">
            <a href="{{ route('transactions.create') }}" class="btn-create">
                <i class="fas fa-plus-circle"></i>
                <span>Nouvelle transaction</span>
            </a>
        </div>
    </main>
</div>

<style>
    :root {
        --primary: #6C5CE7;
        --primary-light: #A29BFE;
        --white: #FFFFFF;
        --light: #F5F6FA;
        --dark: #2D3436;
        --gray: #636E72;
    }
    
    .minimal-dashboard {
        display: flex;
        min-height: 100vh;
        background: var(--light);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    /* Sidebar Minimaliste */
    .sidebar {
        width: 220px;
        background: var(--white);
        padding: 30px 0;
        display: flex;
        flex-direction: column;
        box-shadow: 2px 0 10px rgba(0,0,0,0.03);
    }
    
    .logo {
        display: flex;
        align-items: center;
        padding: 0 25px 30px;
        color: var(--primary);
        font-size: 20px;
        font-weight: 600;
    }
    
    .logo i {
        margin-right: 10px;
        font-size: 24px;
    }
    
    nav {
        flex: 1;
        padding: 0 15px;
    }
    
    nav a {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: var(--gray);
        text-decoration: none;
        border-radius: 6px;
        margin-bottom: 5px;
        transition: all 0.2s;
    }
    
    nav a:hover {
        color: var(--primary);
        background: rgba(108, 92, 231, 0.1);
    }
    
    nav a.active {
        color: var(--primary);
        background: rgba(108, 92, 231, 0.1);
        font-weight: 500;
    }
    
    nav a i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    .logout {
        padding: 0 15px;
    }
    
    .logout a {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        color: var(--gray);
        text-decoration: none;
        border-radius: 6px;
        transition: all 0.2s;
    }
    
    .logout a:hover {
        color: #D63031;
        background: rgba(214, 48, 49, 0.1);
    }
    
    .logout i {
        margin-right: 10px;
        width: 20px;
        text-align: center;
    }
    
    /* Contenu Principal */
    .main-content {
        flex: 1;
        padding: 40px;
        max-width: 800px;
        margin: 0 auto;
    }
    
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }
    
    header h1 {
        font-size: 24px;
        color: var(--dark);
        font-weight: 600;
        margin: 0;
    }
    
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
    }
    
    .welcome-message {
        text-align: center;
        margin-bottom: 50px;
    }
    
    .welcome-message p {
        font-size: 18px;
        color: var(--gray);
    }
    
    /* Bouton Principal */
    .main-action {
        text-align: center;
    }
    
    .btn-create {
        display: inline-flex;
        align-items: center;
        background: var(--primary);
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 18px;
        font-weight: 500;
        transition: all 0.2s;
        box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);
    }
    
    .btn-create:hover {
        background: #5a4bc0;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(108, 92, 231, 0.4);
    }
    
    .btn-create i {
        font-size: 22px;
        margin-right: 10px;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .minimal-dashboard {
            flex-direction: column;
        }
        
        .sidebar {
            width: 100%;
            padding: 15px;
            flex-direction: row;
            align-items: center;
        }
        
        .logo {
            padding: 0;
            margin-right: 20px;
        }
        
        nav {
            flex: 1;
            display: flex;
            padding: 0;
        }
        
        nav a {
            margin: 0 5px;
            padding: 10px;
        }
        
        nav a span {
            display: none;
        }
        
        .logout {
            padding: 0;
        }
        
        .logout span {
            display: none;
        }
        
        .main-content {
            padding: 20px;
        }
    }
</style>
@endsection