<x-guest-layout>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Iniciar sesión - Fundación SAPIB</title>
  </head>

  <body class="bg-gray-900 text-white font-sans min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-lg p-8">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <a href="/">
          <img src="{{ asset('img/logo sapib.jpeg') }}" alt="Logo SAPIB" class="h-16 w-auto">
        </a>
      </div>

      <!-- Mensajes de validación -->
      <x-validation-errors class="mb-4" />

      @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-400">
          {{ session('status') }}
        </div>
      @endif

      <!-- Formulario -->
      <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-white">Email</label>
          <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                 class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label for="password" class="block text-sm font-medium text-white">Password</label>
          <input id="password" type="password" name="password" required autocomplete="current-password"
                 class="mt-1 block w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <!-- Remember Me -->
        <div class="flex items-center mb-4">
          <input id="remember_me" type="checkbox" name="remember"
                 class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500">
          <label for="remember_me" class="ml-2 text-sm text-gray-300">Recordarme</label>
        </div>

        <!-- Acciones -->
        <div class="flex items-center justify-between">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:underline">
              ¿Olvidaste tu contraseña?
            </a>
          @endif

          <button type="submit"
                  class="px-4 py-2 bg-blue-600 hover:bg-blue-500 text-white font-semibold rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            Iniciar sesión
          </button>
        </div>
      </form>
    </div>
  </body>
</x-guest-layout>
