<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <title>RickAndMortyApi</title>
</head>
</head>

<body>
    <!-- Заполненая таблица -->
    @if (count($characters) > 0)
    <div class="container">
        <div class="image-container">
            <a href="{{ route('home') }}">
            <img src="{{ asset('image/logo1.webp') }}" class="img-fluid" alt="Логотип"></a>
        </div>
        <div style="margin-bottom: 10px;">
            @include('partials.navbar')
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Миниатюра</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Вид</th>
                            <th scope="col">Пол</th>
                            <th scope="col">Локация</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($characters as $character)
                        <tr>
                            <td class=""><img src="{{ $character->image }}" alt="" style="width: 55px;"></td>
                            <td class=""><a href="{{ route('show', $character->id); }}">{{ $character->name }}</a></td>
                            <td> {{ $character->status }} </td>
                            <td> {{ $character->species }} </td>
                            <td> {{ $character->gender }} </td>
                            <?php if (!empty($character->location->name)): ?>
                                <td> {{ $character->location->name }} </td>
                            <?php endif; ?>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    {{ $characters->links() }}
                    <span style="margin-top: -20px;">
                        <a href="{{ route('destroy') }}" class="btn btn-outline-danger custom-btn" onclick="return confirm('Вы уверены, что хотите очистить базу данных?');">
                            Очистить базу данных
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
    @else
    <!-- Пустая таблица -->
    <div class="container">
        <div class="image-container">
            <img src="{{ asset('image/logo1.webp') }}" class="img-fluid" alt="Логотип">
        </div>
        <div style="margin-bottom: 10px;">
            @include('partials.navbar')
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="d-inline-block">
                    <div class="image-container">
                        <img src="{{ asset('image/logo2.jpg') }}" class="img-fluid" alt="Логотип">
                    </div>
                    <a id="fillDatabaseButton" href="{{ route('store') }}" class="btn btn-outline-info w-100 mt-2 custom-btn">Заполнить базу данных</a>

                    <div id="loadingSpinner" class="mt-3" style="display: none;">
                        <div class="spinner-border text-info" role="status">
                            <span class="visually-hidden">Загрузка...</span>
                        </div>
                        <p class="mt-2">Пожалуйста, подождите...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif


    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>