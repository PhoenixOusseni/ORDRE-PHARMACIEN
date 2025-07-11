@extends('layout.master')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6">
        <div class="card shadow-sm border border-success p-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <img src="{{asset('assets/img/logo.jpg')}}" alt="Logo" width="60">
                    <h4 class="mt-3 text-success">Connexion à l'espace membre</h4>
                    <p class="text-muted">Bienvenue, veuillez vous connecter</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" required autofocus value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>
                        <a href="{{ route('inscription') }}" class="text-success text-decoration-none">Mot de passe oublié ?</a>
                     </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-success" style="background-color:#14532d;">
                            Se connecter
                        </button>
                    </div>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">Pas encore de compte ?
                            <a href="{{ route('inscription') }}" class="text-success text-decoration-none">Créer un compte</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
