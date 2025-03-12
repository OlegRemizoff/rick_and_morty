<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            <img src="{{ asset('image/logo1.webp') }}" class="img-fluid" alt="Логотип">
        </div>
        <div style="margin-bottom: 10px;">
            @include('layouts.navbar')
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Миниатюра</th>
                            <th scope="col">Имя</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($characters as $character)
                        <tr>
                            <td class=""><img src="{{ $character->image }}" alt="" style="width: 55px;"></td>
                            <td class=""><a href="#">{{ $character->name }}</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('destroy') }}" class="btn btn-outline-danger w-100 mt-2 custom-btn" onclick="return confirm('Вы уверены, что хотите очистить базу данных?');">
                    Очистить базу данных
                </a>
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
            @include('layouts.navbar')
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
</body>

</html>