<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {! title !}</title>
    <link href="/public/bootstrap5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/bIcons/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="/public/main.css" rel="stylesheet">
</head>
<body>

<main>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    bl
                    <img src="/public/bIcons/emoji-grimace.svg" width="32" height="32">
                    G
                </a>
            </div>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2">Главная</a></li>
                <li><a href="#" class="nav-link px-2">Статьи</a></li>
                <li><a href="#" class="nav-link px-2">Авторы</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <a href="/login">
                    <button type="button" class="btn btn-outline-primary me-2">Вход</button>
                </a>
                <a href="/register">
                    <button type="button" class="btn btn-primary">Регистрация</button>
                </a>
            </div>
        </header>
        @{{ content }}
    </div>
    @{{ footer }}
</main>
<script src="/public/bootstrap5.3.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>