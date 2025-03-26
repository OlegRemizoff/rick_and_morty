<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <a class="nav-link d-flex align-items-center gap-2 text-decoration-none transition-all hover-text-primary" aria-current="page" href="{{ route('home') }}">
          <i class="bi bi-people-fill"></i>
          <span>Персонажи</span>
          <?php if (!empty($total)): ?>
            <span class="badge bg-secondary"><?php echo $total; ?></span>
          <?php endif; ?>
        </a>
        <a class="nav-link " aria-current="page" download href="{{ route('export') }}">Скачать excel</a>
        <a class="nav-link " aria-current="page" href="https://github.com/OlegRemizoff/rick_and_morty" target="_blank">GitHub</a>
        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Что это?
        </a>
      </ul>
      <?php if (!empty($total)): ?>
        <form class="d-flex" role="search">
          <!-- <a href="{{ route('destroy') }}" class="btn btn-outline-danger custom-btn" onclick="return confirm('Вы уверены, что хотите очистить базу данных?');">
            Очистить базу данных
          </a> -->
          <input class="form-control me-2" id="search" type="search" placeholder="Search" aria-label="Search">
          <!-- <button disabled class="btn btn-outline-success" type="submit">Search</button> -->
        </form>
      <?php endif ?>
    </div>
  </div>
</nav>

<!-- Модальное окно -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-lg-custom">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Тестовое Laravel Middle</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
      </div>
      <div class="modal-body modal-body-custom">
        <p>
        1. Развернуть новый проект на laravel. База данных MySql
        </p>
        <p>
        2. Работа с отрытым API - <a href="https://rickandmortyapi.com/documentation">rickandmortyapi.com/documentation</a> 
        </p>
        <p>
          <ul>
            <li>Необходимо создать таблицы в БД, содержащие информацию о персонажах, существующих локациях и эпизодах</li>
          </ul>
        </p>

        <p>
        3. Прописать связи между таблицами. Между двумя таблицами использовать связь многие ко многим. С остальными связь по персонажу.
        </p>
        <p>
        4. Реализовать сохранение данных из таблиц ДБ в Exel-документ через очереди и возможностью скачать этот документ.
        </p>
        <p>
        Содержимое excel-файла:
        <ul>
          <li>Имя персонажа</li>
          <li>Статус</li>
          <li>Вид</li>
          <li>Пол</li>
          <li>Название локации</li>
          <li>url локации</li>
          <li>Эпизоды, в которых снимался</li>
        </ul>
        </p>
      <p>
      5. Реализовать в blade-шаблоне минимальный функционал для работы с данными: кнопка получить персонажей и вывести их количество, кнопка получить эпизоды и вывести их количество и кнопка сохранить документ и ссылка на скачивание документа
      </p>
      </div>
    </div>
  </div>
</div>