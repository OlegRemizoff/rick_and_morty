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
    @if (count($characters) > 0)
    <div class="container">
        <div style="margin-bottom: 10px;">
            @include('layouts.navbar')
        </div>
        <!-- <div class="image-container">
            <img src="{{ asset('image/logo.webp') }}" alt="Логотип">
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <!-- <th scope="col">#</th> -->
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
            </div>
        </div>
    </div>
    @else
    
    <div class="container">
        <div style="margin-bottom: 10px;">
            @include('layouts.navbar')
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Внимание!</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="">I don't have any characters!</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</body>

</html>

