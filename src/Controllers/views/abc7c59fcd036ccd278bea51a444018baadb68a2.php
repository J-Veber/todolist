<?php $__env->startSection('session'); ?>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div align="center" class="main">
        <form id="loginForm" method="post" name="loginForm">

            <div id="loginResult" class="success">Авторизация</div>
            <p><label for="user_login">Имя пользователя<br><input class="input" id="username" name="username" size="20" type="text" value="" data-help="Логин должен состоять из ..."></label></p>

            <p><label for="user_pass">Пароль<br> <input class="input" id="password" name="password" size="20" type="password" value=""></label></p>

            <p class="submit"> <input class="button" id="login" name="login" type= "submit" value="Log In" onclick=loginUser()></p>
            <p class="href_area"> <a href="../src/Controllers/RegistrationController.php" id = "reghref" style="color: #4d4d4d">Регистрация</a> | <a href="reset_password.blade.php" id="resethref" style="color: #4d4d4d">Напомнить пароль?</a></p>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="../../../web/js/login.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>