<!doctype html>
<html lang="en">
<head>
    @include('head')
</head>
<body>
<section class="todoapp">
    <header class="header">
        <h1>todos</h1>
        <input class="new-todo" placeholder="What needs to be done?" autofocus>
    </header>

    <!-- This section should be hidden by default and shown when there are todos -->
    //если нет куки
    @section('login')
        @show
    //иначе
    @section('content')
        @show

    <!-- This footer should hidden by default and shown when there are todos -->

</section>
<footer class="info">
    <p>Double-click to edit a todo</p>
</footer>
<!-- Scripts here. Don't remove ↓ -->
{{--<script src="node_modules/todomvc-common/base.js"></script>--}}
{{--<script src="js/app.js"></script>--}}
</body>
</html>