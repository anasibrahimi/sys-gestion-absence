<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ISTA-ABS Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-blue-700 mb-2">System de gestion des absences</h1>
    </div>
    <div class="bg-white rounded-lg">
      <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Inscription</h2>
        <p class="text-gray-500 text-sm">Créer un nouveau compte</p>
      </div>
      <div>
        @if(session('error'))
          <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
          </div>
        @endif
        @if(session('success'))
          <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
          </div>
        @endif
        <form method="post" action="{{ route('register.attempt') }}" class="space-y-4">
          @csrf
          <div>
            <label for="name" class="block text-gray-700 font-medium mb-1">Nom complet</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" autofocus value="{{ old('name') }}" required>
            @error('name')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" required>
            @error('email')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="password" class="block text-gray-700 font-medium mb-1">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('password')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">Confirmer le mot de passe</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>
          <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">S'inscrire</button>
        </form>
        <div class="text-center mt-4">
          <p class="text-gray-600 text-sm">
            Déjà un compte? 
            <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Se connecter</a>
          </p>
        </div>
      </div>
    </div>
    <div class="text-center mt-6 text-gray-500 text-sm">
      <p>&copy; {{ date('Y') }} ISTA-ABS. Tous droits réservés.</p>
    </div>
  </div>
</body>
</html> 