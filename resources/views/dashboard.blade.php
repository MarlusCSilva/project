<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div id="carouselExampleCaptions" class="carousel slide mt-1" data-bs-ride="carousel">
      <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
      </div>
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="../img/festas.png" class="d-block w-100" alt="Festas">
              <div class="carousel-caption d-none d-md-block">
                  <h3 class="fw-bold text-shadow">Festas</h3>
                  <p class="fs-3 text-shadow">Transforme momentos especiais em celebrações inesquecíveis com nosso serviço de criação de festas. Personalize o local, a música e tudo o que precisar para que seu evento seja tão único quanto seus convidados.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="../img/encontrosCasuais.png" class="d-block w-100" alt="Encontros Casuais">
              <div class="carousel-caption d-none d-md-block">
                  <h3 class="fw-bold text-shadow">Encontros Casuais</h3>
                  <p class="fs-3 text-shadow">Crie eventos informais para reunir amigos, familiares ou colegas de trabalho. Perfeito para happy hours, piqueniques ou encontros após o trabalho.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="../img/casamentos.png" class="d-block w-100" alt="Eventos Sociais">
              <div class="carousel-caption d-none d-md-block">
                <h3 class="fw-bold text-shadow">Casamentos</h3>
                <p class="fs-3 text-shadow">Realize o casamento dos seus sonhos com nossa plataforma. Oferecemos todas as ferramentas necessárias para planejar um dia inesquecível, desde a escolha do local perfeito até detalhes como decoração, música e catering.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="../img/palestras.png" class="d-block w-100" alt="Palestras">
              <div class="carousel-caption d-none d-md-block">
                  <h3 class="fw-bold text-shadow">Palestras</h3>
                  <p class="fs-3 text-shadow">Ideal para conferências, seminários ou sessões de aprendizado, nossas ferramentas ajudam você a organizar eventos educativos com facilidade.</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="../img/shows.png" class="d-block w-100" alt="Shows">
              <div class="carousel-caption d-none d-md-block">
                  <h3 class="fw-bold text-shadow">Shows</h3>
                  <p class="fs-3 text-shadow">Monte espetáculos memoráveis, desde concertos de música até apresentações teatrais. Asseguramos que cada detalhe contribua para uma experiência impressionante para o público.</p>
              </div>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- CSS -->
  <link rel="stylesheet" href="app.css">
</x-app-layout>
