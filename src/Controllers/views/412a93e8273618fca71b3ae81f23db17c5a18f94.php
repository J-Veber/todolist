<?php $__env->startSection('content'); ?>
    <div align="center" class="main">
        <form   action="reset_password.php"
                id="registerform"
                method="post"
                name="registerform">

            <p><label for="registerform">Введите почтовый ящик: <br>
                <input id="input_text"
                       name="text"
                       size="20"
                       type="text"
                       value=""></label>
            </p>

            <p style="padding-top: 8px">
                <input class="button"
                       id="reset"
                       name= "reset"
                       type="submit"
                       value="Восстановить пароль"
                       onclick="resetUserPassw()">
            </p>

            <p class="href_area">
                <a href= "authorization"
                   style="color: #4d4d4d;">Войти</a>
            </p>
        </form>
    </div>
    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript"
            src="../../../web/js/reset.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>