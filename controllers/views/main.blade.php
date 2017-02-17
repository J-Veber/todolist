<!doctype html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
<section class="todoapp">
    <header class="header">
        <h1>todos</h1>
        @yield('content')
    </header>

</section>

<footer class="info">
    <p>Double-click to edit a todo</p>
</footer>
<!-- Scripts here. Don't remove ↓ -->
{{--<script src="node_modules/todomvc-common/base.js"></script>--}}
{{--<script src="js/app.js"></script>--}}
</body>
</html>