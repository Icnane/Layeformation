@include('partials.head')
@include('partials.sidbar')

@vite('resources/css/style.css')

<div class="container">
    <h2 class="text-center">Envoyer une invitation</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @elseif($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Formulaire d'invitation -->
    <form action="{{ route('invitation.store') }}" method="POST" class="mx-auto" style="max-width: 400px;">
        @csrf
        <div class="form-group mb-3">
            <label for="email" class="d-block text-center">Email de l'invité</label>
            <input type="email" class="form-control text-center" id="email" name="email" placeholder="Entrez l'email" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Envoyer l'invitation</button>
    </form>
</div>


