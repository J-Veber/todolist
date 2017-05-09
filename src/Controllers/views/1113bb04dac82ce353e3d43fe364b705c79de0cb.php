<?php echo $__env->yieldContent('session'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Template • TodoMVC</title>
    <link rel="stylesheet" href="../../../web/css/base.css">
    <link rel="stylesheet" href="../../../web/css/index.css">
    <!-- CSS overrides - remove if you don't need it -->
    <link rel="stylesheet" href="../../../web/css/app.css">
    <?php echo $__env->yieldContent('head'); ?>
</head>
<body>
<section class="todoapp">
    <header class="header">
        <h1>todos</h1>
        <?php echo $__env->yieldContent('content'); ?>
    </header>

</section>

<footer class="info">
    <p>Double-click to edit a todo</p>
</footer>
<script type="text/javascript"
        src="../../../web/js/jquery-3.1.1.js"></script>
<?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>