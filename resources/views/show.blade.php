<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Информация о персонаже</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="image-container">
            <img src="{{ asset('image/logo1.webp') }}" class="img-fluid" alt="Логотип">
        </div>
        <div style="margin-bottom: 10px;">
            @include('layouts.navbar')
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- Карточка персонажа -->
                <div class="card">
                    <img src="{{ $character->image }}" class="card-img-top" alt="Фото персонажа">
                    <div class="card-body">
                        <h5 class="card-title">{{ $character->name }}</h5>
                        <p class="card-text"><a href="#"></a></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Статуc:</strong> {{ $character->status }} </li>
                        <li class="list-group-item"><strong>Пол:</strong> {{ $character->gender }} </li>
                        <li class="list-group-item"><strong>Вид:</strong> {{ $character->species }} </li>
                        <li class="list-group-item"><strong>Тип:</strong> {{ $character->type }} </li>
                        <li class="list-group-item"><strong>Локация: </strong>{{ $character->location->name }}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Список эпизодов:</h5>
                        <p class="card-text">
                            <!-- ... -->
                        </p>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">Имя</th>
                                            <th scope="col">Серия</th>
                                            <th scope="col">URL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if($character->episodes->isNotEmpty())
                                        @foreach($character->episodes as $episode)
                                        <tr>
                                            <td>{{ $episode->name }}</td>
                                            <td>{{ $episode->episode }}</td>
                                            <td><a href="{{ $episode->url }}">{{ $episode->url }}</a></td>
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="1">No episodes found.</td>
                                        </tr>
                                    @endif  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>