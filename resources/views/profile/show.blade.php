<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card shadow-lg">
                    
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h2 class="mb-0 text-center flex-grow-1">PROFILE UPDATED</h2>
                        <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-tachometer-alt mr-1"></i> Tableau de bord
                        </a>
                    </div>
                    
                    <div class="card-body">
                        <!-- Le reste du contenu reste inchangé -->
                        <div class="text-center mb-4">
                            <div class="profile-icon bg-light p-4 rounded-circle d-inline-block">
                                <i class="fas fa-user-check fa-3x text-primary"></i>
                            </div>
                        </div>

                        <div class="profile-details p-4 bg-light rounded mb-4">
                            <h3 class="text-center mb-4">Your Profile Information</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="profile-info"><strong>Name:</strong> <span class="float-right">{{ $user->name }}</span></p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-info"><strong>Email:</strong> <span class="float-right">{{ $user->email }}</span></p>
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-4">
                            <a href="{{ route('profile.edit') }}" class="btn btn-primary btn-lg px-5">
                                <i class="fas fa-edit mr-2"></i> Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-icon {
            border: 3px solid #007bff;
        }
        .profile-details {
            border-left: 4px solid #007bff;
        }
        .profile-info {
            font-size: 1.1rem;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .card-header h2 {
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
    </style>
@endsection