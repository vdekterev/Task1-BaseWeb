<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?php if (flashMessage('forms_warning')) : ?>
<div style="text-align: center" class="my-5">
    <h1>У вас нет заявок, но вы всегда можете <a href="<?= URL_ROOT ?>/forms/index">добавить новую</a>!</h1>
</div>
<?php elseif (isset($_SESSION['user_id']))  : ?>
<form method="post" action="<?= URL_ROOT ?>/forms/index" class="forms my-4 needs-validation">
    <div class="container col-4 ">
        <div class="card text-center">
            <div class="card-header"><h3>Добавлено: <?= $data['created_at'] ?></h3></div>
            <div class="card-body">
                <label for="name" id="name"><h5>Имя</h5></label>
                <input class="form-control" type="text"
                       name="name" value="<?= $data['name'] ?>" id="name" disabled>

                <div class="my-3">
                    <div class="mb-3">
                        <h5>Опыт в IT</h5>
                        <input class="form-check-input" type="radio" name="experience" value="1" id="experience"
                            <?= $data['experience'] === 'Нет опыта' ? 'checked' : 'disabled' ?>>
                        <label for="experience">Нет опыта</label>

                        <input class="form-check-input" type="radio" name="experience" id="experience" value="2"
                            <?= $data['experience'] === 'Меньше года' ? 'checked' : 'disabled' ?>>
                        <label for="experience">Меньше года</label>

                        <input class="form-check-input" type="radio" name="experience" id="experience" value="3"
                            <?= $data['experience'] === 'Больше года' ? 'checked' : 'disabled' ?>>
                        <label for="experience">Больше года</label>
                    </div>

                    <h5>Ваша ОС</h5>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="os">
                        <option value="1" <?= $data['os'] === 'Windows' ? 'selected' : 'disabled' ?>>
                            Windows
                        </option>
                        <option value="2" <?= $data['os'] === 'MacOS' ? 'selected' : 'disabled' ?>>
                            MacOS
                        </option>
                        <option value="3" <?= $data['os'] === 'Linux' ? 'selected' : 'disabled' ?>>
                            Linux
                        </option>
                    </select>

                    <h5>Что вы хотите изучать</h5>
                    <input class="form-check-input mx-2"
                           type="checkbox"
                           name="php" <?= str_contains($data['learn'], 'php') ? 'checked' : '' ?> disabled>PHP
                    <input class="form-check-input mx-2"
                           type="checkbox" name="mysql"
                        <?= str_contains($data['learn'], 'mysql') ? 'checked' : '' ?> disabled>MySQL
                    <input class="form-check-input mx-2"
                           type="checkbox" name="js"
                        <?= str_contains($data['learn'], 'js') ? 'checked' : '' ?> disabled>JS
                    <input class="form-check-input mx-2"
                           type="checkbox" name="git"
                        <?= str_contains($data['learn'], 'git') ? 'checked' : '' ?> disabled>Git

                </div>
                <label for="about"><h5>Расскажите о себе</h5></label>
                <textarea class="form-control mb-3" name="about" id="about" cols="30" rows="3" disabled><?=$data['about']?></textarea>
                <div class="alert alert-danger" role="alert">
                    Отредактировать заявку нельзя, но можно отправить новую, при этом текущая заявка <b>удалится</b>!
                </div>
                <div class="dropdown">
                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Действия
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="<?= URL_ROOT ?>/forms/index">Отправить новую заявку</a></li>
                        <li><a class="dropdown-item" href="<?= URL_ROOT ?>/forms/delete">Удалить  текущую заявку</a></li>
                    </ul>
                </div>
                </div>
            </div>
        </div>
    </form>

<?php else: ?>
    <div style="text-align: center" class="my-5">
        <h1>✋🏼Для начала нужно <a href="<?= URL_ROOT ?>/users/login">авторизоваться</a>🛑</h1>
    </div>
<?php endif; ?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
