<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?php if (isset($_SESSION['user_id'])) : ?>
    <form method="post" action="#" class="forms my-4">
        <div class="container col-3 ">
            <div class="card text-center">
                <div class="card-header"><h2>Заказать консультацию</h2></div>
                <div class="card-body">
                    <label for="name"><h5>Имя</h5></label>
                    <input class="form-control" type="text" name="name">
                    <div class="mb-3">
                        <div class="mb-3">
                            <h5>Опыт в IT</h5>
                            <input class="form-check-input" type="radio" name="experience" value="0" checked>
                            <label for="experience">Нет опыта</label>
                            <input class="form-check-input" type="radio" name="experience" value="1">
                            <label for="experience">Меньше года</label>
                            <input class="form-check-input" type="radio" name="experience" value="2">
                            <label for="experience">Больше года</label>
                        </div>
                        <h5>Ваша ОС</h5>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="os">
                            <option value="windows" selected>Windows</option>
                            <option value="macos">MacOS</option>
                            <option value="linux">Linux</option>
                        </select>
                        <h5>Что вы хотите изучать:</h5>
                        <input class="form-check-input mx-2" type="checkbox" name="php">PHP
                        <input class="form-check-input mx-2" type="checkbox" name="mysql">MySQL
                        <input class="form-check-input mx-2" type="checkbox" name="js">JS
                        <input class="form-check-input mx-2" type="checkbox" name="git">Git
                    </div>
                    <label for="info"><h5>Расскажите о себе:</h5></label>
                    <textarea class="form-control mb-3" name="info" id="info" cols="50" rows="5" required></textarea>
                    <input class="btn btn-success mx-3" type="reset" value="Сбросить">
                    <button class="btn btn-primary mx-3">Отправить</button>
                </div>
            </div>
        </div>
    </form>
<?php else:?>
    <div style="text-align: center" class="my-5">
        <h1>👮✋🏼Для начала нужно <a href="<?= URL_ROOT ?>/users/register">зарегистрироваться</a>🛑</h1>
    </div>
<?php endif;?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
