<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAPIB</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white font-sans">

  <!-- NAVBAR -->
  <header class="w-full bg-gray-950 shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      
      <!-- LOGO izquierda -->
      <div class="flex items-center space-x-2">
        <img src="{{ asset('img/SAPIF.png') }}" alt="Impacto" class="rounded-lg shadow-lg mx-auto h-10 object-cover" class="h-14 w-auto">
        <span class="text-xl font-bold text-white-400">SAPIB</span>
      </div>

      <!-- LINKS derecha -->
      @if (Route::has('login'))
        <nav class="flex space-x-4">
          @auth
            <a href="{{ url('/dashboard') }}" 
               class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-blue-400">
              Dashboard
            </a>
          @else
            <a href="{{ route('login') }}" 
               class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-blue-400">
              Log in
            </a>
            @if (Route::has('register'))
              <a href="{{ route('register') }}" 
                 class="px-3 py-2 rounded-md text-sm font-medium text-white hover:text-blue-400">
                Register
              </a>
            @endif
          @endauth
        </nav>
      @endif
    </div>
  </header>

  <!-- HERO -->
  <section class="bg-gradient-to-r from-gray-700 via-blue-700 to-gray-700 py-20 text-center">
    <h1 class="text-4xl md:text-6xl font-bold">Bienvenido a SAPIB</h1>
    <p class="mt-4 text-lg md:text-xl">Apoyando causas que transforman vidas</p>
    <a href="/conocenos" class="mt-6 inline-block px-6 py-3 bg-blue-600 hover:bg-blue-500 rounded-lg text-lg font-semibold">Conócenos</a>
  </section>

  <!-- 3 COLUMNAS -->
  <section class="py-16 max-w-6xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
    <div>
      <img src="{{ asset('img/TALLERES.png') }}" alt="Talleres">
      <h2 class="mt-4 text-2xl font-semibold">Talleres Psicosociales</h2>
      <p class="mt-2 text-gray-300">Espacios seguros para fortalecer el bienestar emocional...</p>
      <a href="/inscripcion" class="mt-4 inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-md">Inscríbete »</a>
    </div>

    <div>
      <img src="{{ asset('img/FUNDABOG.png') }}" alt="Ubicaciones" class="mx-auto rounded-full w-56 h-56 object-cover">
      <h2 class="mt-4 text-2xl font-semibold">Ubicaciones</h2>
      <p class="mt-2 text-gray-300">Estamos en sectores clave de la ciudad...</p>
      <a href="/ubicaciones" class="mt-4 inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-md">Ver detalles »</a>
    </div>

    <div>
      <img src="{{ asset('img/VISITAS.png') }}" alt="Visitas" class="mx-auto rounded-full w-56 h-56 object-cover">
      <h2 class="mt-4 text-2xl font-semibold">Visitas</h2>
      <p class="mt-2 text-gray-300">Conoce de cerca los proyectos sociales...</p>
      <a href="/visitas" class="mt-4 inline-block px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded-md">Agendar Visita »</a>
    </div>
  </section>

  <!-- CARRUSEL -->
  <section class="relative w-full max-w-5xl mx-auto overflow-hidden rounded-lg shadow-lg">
    <div class="carousel w-full">
      <!-- Slide 1 -->
      <div class="carousel-item relative w-full">
        <img src="{{ asset('img/funda.jpg') }}" class="w-full h-[400px] object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center p-6">
          <h3 class="text-2xl font-bold">“Unidos por un Sueño: Tu Apoyo Transforma”</h3>
          <p class="mt-2">Programa de ayuda a personas vulnerables.</p>
        </div>
      </div>
      <!-- Slide 2 -->
      <div class="carousel-item relative w-full">
        <img src="{{ asset('img/AYUDA.jpg') }}" class="w-full h-[400px] object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center p-6">
          <h3 class="text-2xl font-bold">“Juntos Somos Más: Construye un Futuro Mejor”</h3>
          <p class="mt-2">Agenda una visita o crea un taller.</p>
        </div>
      </div>
      <!-- Slide 3 -->
      <div class="carousel-item relative w-full"> 
      <img src="{{ asset('img/olovorgo.jpg') }}" alt="Olovorgo" class="w-full h-[400px] object-cover">
        <div class="absolute inset-0 bg-black/40 flex flex-col justify-center items-center text-center p-6">
          <h3 class="text-2xl font-bold">Fundación SAPIB</h3>
          <p class="mt-2">Diseña talleres, agenda visitas o colabora con donativos.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- IMPACTO -->
  <section class="py-16 bg-gray-800">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center px-6">
      <img src="{{ asset('img/SAPIF.png') }}" alt="Impacto" class="rounded-lg shadow-lg mx-auto h-72 object-cover">
      <div>
        <h2 class="text-3xl font-bold mb-4">Nuestro Impacto</h2>
        <p class="text-gray-300 mb-4">Centralizamos talleres, visitas y donativos, logrando:</p>
        <ul class="list-disc pl-5 space-y-2 text-gray-300">
          <li>+50% de participación de voluntarios y beneficiarios.</li>
          <li>40% menos tiempos de respuesta en entrega de insumos.</li>
          <li>Transparencia y confianza con reportes en tiempo real.</li>
          <li>Una red colaborativa con impacto social medible.</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- REDES SOCIALES -->
  <section class="py-16 bg-gray-900 text-center">
    <h2 class="text-3xl font-bold text-blue-400">¡Síguenos en nuestras redes!</h2>
    <p class="mt-2 text-gray-300">Conéctate para ver actividades, eventos y noticias.</p>
    <div class="flex justify-center gap-6 mt-6 text-3xl">
      <a href="https://facebook.com/FundacionSAPIB" target="_blank" class="hover:text-blue-500">
        <i class="bi bi-facebook"></i>
      </a>
      <a href="https://instagram.com/FundacionSAPIB" target="_blank" class="hover:text-pink-500">
        <i class="bi bi-instagram"></i>
      </a>
      <a href="https://wa.me/573001234567" target="_blank" class="hover:text-green-500">
        <i class="bi bi-whatsapp"></i>
      </a>
      <a href="https://t.me/FundacionSAPIB" target="_blank" class="hover:text-sky-400">
        <i class="bi bi-telegram"></i>
      </a>
    </div>
  </section>

  <!-- CONTACTO -->
  <section class="py-16 bg-gray-700 text-center">
    <h2 class="text-3xl font-bold mb-6">Contáctanos</h2>
    <ul class="space-y-3 text-lg">
      <li>📧 contacto@sapib.org</li>
      <li>📞 +57 300 123 4567</li>
      <li>📍 Calle 45 #10-25, Bogotá, Colombia</li>
      <li>⏰ Lunes a Viernes de 8:00 a.m. a 5:00 p.m.</li>
    </ul>
  </section>

  <!-- FOOTER -->
  <footer class="bg-black py-6 text-center text-gray-400">
    © 2025 Fundación SAPIB - Todos los derechos reservados.
  </footer>

</body>
</html>
