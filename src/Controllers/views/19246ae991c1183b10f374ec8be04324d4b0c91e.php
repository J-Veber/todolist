<?php $__env->startSection('content'); ?>
    <div align="center" class="main">
        <form action=""
              id="registerform"
              method="post"
              name="registerform">
            <p><label for="user_pass">E-mail<br>
                    <input class="input"
                           id="email"
                           name="email"
                           size="20"
                           type="email"
                           value=""></label>
            </p>
            <p><label for="user_pass">Имя пользователя<br>
                    <input class="input"
                           id="username"
                           name="username"
                           size="20"
                           type="text"
                           value=""></label>
            </p>
            <p><label for="user_pass">Пароль<br>
                    <input class="input"
                           id="password"
                           name="password"
                           size="20"
                           type="password"
                           value=""></label>
            </p>
            
            <p class="submit" style="padding-top: 8px">
                <input class="button"
                       id="reg"
                       name= "reg"
                       type="submit"
                       value="Зарегистрироваться"
                       onclick="regUser()">
            </p>

            <p class="href_area">
                Уже зарегистрированы?
                <a href= "authorization"
                   style="color: #4d4d4d">Войти!</a>
            </p>
        </form>
    </div>

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" src="../../../web/js/registration.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>