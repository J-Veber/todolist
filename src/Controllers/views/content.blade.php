@extends('main')

<!--если нет записей-->

@section('content')
    <h1>todos <a href="/login" id="closeSession" name="close_session">Exit</a></h1>
    <input class="new-todo" id="newTask" placeholder="What needs to be done?" autofocus>
    <section class="main">
        <input class="toggle-all" type="checkbox">
        <label for="toggle-all">Mark all as complete</label>
        <ul class="todo-list"></ul>
    </section>

    <footer class="footer">
        <span class="todo-count"><strong id = "uncompleteTasksCount">0</strong> item left</span>
        <ul class="filters">
            <li>
                <a class="state all selected" id="selectAll">All</a>
            </li>
            <li>
                <a class="state uncompleted" id="selectActive">Active</a>
            </li>
            <li>
                <a class = "state completed" id="selectCompleted">Completed</a>
            </li>
        </ul>
        <button class="clear-completed" id="selectClearCompleted">Clear completed</button>
    </footer>
@endsection

@section('scripts')
    <script type="text/javascript" src="/js/content.js"></script>
@endsection