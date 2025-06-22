<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ISTA-ABS Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md mx-auto p-6 bg-white rounded-lg shadow-lg">
    <div class="text-center mb-6">
      <h1 class="text-3xl font-bold text-blue-700 mb-2">System de gestion des absences</h1>
    </div>
    <div class="bg-white rounded-lg">
      <div class="mb-4">
        <h2 class="text-xl font-semibold text-gray-800">Connexion</h2>
        <p class="text-gray-500 text-sm">Connexion au système</p>
      </div>
      <div>
        @if(session('error'))
          <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            {{ session('error') }}
          </div>
        @endif
        <form method="post" action="{{ route('login.attempt') }}" class="space-y-4">
          @csrf
          <div>
            <label for="username" class="block text-gray-700 font-medium mb-1">Nom d'utilisateur</label>
            <input type="text" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" autofocus value="{{ old('username') }}">
          </div>
          <div>
            <label for="password" class="block text-gray-700 font-medium mb-1">Mot de passe</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
          </div>
          <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">Se connecter</button>
        </form>
      </div>
    </div>
    <div class="text-center mt-6 text-gray-500 text-sm">
      <p>&copy; {{ date('Y') }} ISTA-ABS. Tous droits réservés.</p>
    </div>
  </div>
</body>
</html>
