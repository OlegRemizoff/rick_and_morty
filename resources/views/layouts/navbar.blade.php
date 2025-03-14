<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-link d-flex align-items-center gap-2 text-decoration-none transition-all hover-text-primary" aria-current="page" href="/">
          <i class="bi bi-people-fill"></i>
          <span>Персонажи</span>
          <?php if (!empty($total)): ?>
            <span class="badge bg-secondary"><?php echo $total; ?></span>
          <?php endif; ?>
        </a>
        <a class="nav-link " aria-current="page" download href="{{ route('export') }}">Скачать excel</a>
        <a class="nav-link " aria-current="page" href="https://github.com/OlegRemizoff/rickandmortyapi" target="_blank">GitHub</a>
      </ul>
      <?php if (!empty($total)): ?>
        <form class="d-flex" role="search">

          <!-- <a href="{{ route('destroy') }}" class="btn btn-outline-danger custom-btn" onclick="return confirm('Вы уверены, что хотите очистить базу данных?');">
            Очистить базу данных
          </a> -->
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button disabled class="btn btn-outline-success" type="submit">Search</button>
        </form>
      <?php endif ?>
    </div>
  </div>
</nav>