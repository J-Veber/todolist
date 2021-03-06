@yield('session')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template • TodoMVC</title>
    <link rel="stylesheet" href="/css/base.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/app.css">
    @yield('head')
</head>
<body>
<section class="todoapp">
    <header class="header">
        @yield('content')
    </header>

</section>

<footer class="info">
    <p>Double-click to edit a todo</p>
</footer>
<script type="text/javascript"
        src="/js/jquery-3.1.1.js"></script>
@yield('scripts')
</body>
</html>