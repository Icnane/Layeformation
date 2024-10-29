<!doctype html>
<html class="no-js" lang="en">

@include('partials.head')
@include('partials.sidbar')
    
    <style>
       

        .form-group {
            width: 100%; 
            max-width: 400px; 
            margin-bottom: 15px; 
        }

        .form-control {
            width: 100%;
        }
    </style>



    

    <div class="container">
        <h2>Éditer mon profil</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('editprofil.update') }}" method="POST"> <!-- Route mise à jour -->
            @csrf
            @method('PUT') <!-- Pour envoyer les données de mise à jour -->

            <!-- Prénom -->
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom"
                    value="{{ old('prenom', $user->prenom) }}" required>
            </div>

            <!-- Nom -->
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom"
                    value="{{ old('nom', $user->nom) }}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $user->email) }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
        </form>
    </div>

    

@include('components.footer')

