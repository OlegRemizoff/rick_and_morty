<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="assets/favicon.ico" type="image/x-icon">
    <title>Тестовое | Содержимое</title>

</head>

<body>
    @include('partials.navbar')


    <br>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                @empty(!$directories)
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Директории</th>
                        </tr>
                    </thead>
                    @foreach($directories as $dirPath)
                    <tbody>
                        <tr>
                            <td><a href="?path={{ $dirPath }}">📁 {{ basename($dirPath) }}</a></td>
                        </tr>
                    @endforeach
                @endempty

                    <thead class="table-dark">
                        <tr>
                            @empty(!$directories)
                            <th scope="col">Файлы</th>
                            @endempty
                        </tr>
                    </thead>
                    @foreach($files as $file)
                        <tr>
                        <td>{{ $file }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>


