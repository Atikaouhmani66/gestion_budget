<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container py-5">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0"><i class="fas fa-user-edit mr-2"></i> Edit Profile</h3>
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">
                        <i class="fas fa-tachometer-alt mr-1"></i> Tableau de bord
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                <i class="fas fa-user-circle mr-2"></i>Full Name
                            </label>
                            <div class="col-md-6">
                                <input type="text" 
                                       id="name" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $user->name) }}" 
                                       required 
                                       autocomplete="name" 
                                       autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <i class="fas fa-envelope mr-2"></i>Email Address
                            </label>
                            <div class="col-md-6">
                                <input type="email" 
                                       id="email" 
                                       name="email" 
                                       class="form-control @error('email') is-invalid @enderror" 
                                       value="{{ old('email', $user->email) }}" 
                                       required 
                                       autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    <i class="fas fa-save mr-2"></i> Update Profile
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .form-control {
        border-radius: 8px;
        padding: 12px 15px;
        border: 1px solid #ced4da;
        transition: all 0.3s;
    }
    .form-control:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }
    .btn-primary {
        background-color: #4e73df;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        background-color: #2e59d9;
        transform: translateY(-2px);
    }
    .btn-light {
        border-radius: 8px;
        font-weight: 500;
    }
</style>
@endsection