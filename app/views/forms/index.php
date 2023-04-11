<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?php if (isset($_SESSION['user_id'])) : ?>
    <form method="post" action="<?= URL_ROOT ?>/forms/index" class="forms my-4 needs-validation">
        <div class="container col-4 ">
            <div class="card text-center">
                <div class="card-header"><h2>Заполните форму</h2></div>
                <div class="card-body">
                    <label for="name"><h5>Имя</h5></label>
                    <input class="form-control <?= (!empty($data['name_err'])) ? 'is-invalid' : '' ?>" type="text"
                           name="name" value="<?= $data['name'] ?>">
                    <div class="invalid-feedback">
                        <?= $data['name_err'] ?>
                    </div>

                    <div class="my-3">
                        <div class="mb-3">
                            <h5>Опыт в IT</h5>
                            <input class="form-check-input <?= (!empty($data['experience_err'])) ? 'is-invalid' : '' ?>"
                                   type="radio" name="experience"
                                   value="1" id="experience">
                            <label for="experience">Нет опыта</label>
                            <input class="form-check-input <?= (!empty($data['experience_err'])) ? 'is-invalid' : '' ?>"
                                   type="radio" name="experience" id="experience" value="2">
                            <label for="experience">Меньше года</label>
                            <input class="form-check-input <?= (!empty($data['experience_err'])) ? 'is-invalid' : '' ?>"
                                   type="radio" name="experience" id="experience" value="3">
                            <label for="experience">Больше года</label>
                            <div class="invalid-feedback">
                                <?= $data['experience_err'] ?>
                            </div>
                        </div>

                        <h5>Ваша ОС</h5>
                        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="os">
                            <option value="1" selected>Windows</option>
                            <option value="2">MacOS</option>
                            <option value="3">Linux</option>
                        </select>

                        <h5>Что вы хотите изучать</h5>
                        <input class="form-check-input mx-2 <?= (!empty($data['learn_err'])) ? 'is-invalid' : '' ?>"
                               type="checkbox" name="php">PHP
                        <input class="form-check-input mx-2 <?= (!empty($data['learn_err'])) ? 'is-invalid' : '' ?>"
                               type="checkbox" name="mysql">MySQL
                        <input class="form-check-input mx-2 <?= (!empty($data['learn_err'])) ? 'is-invalid' : '' ?>"
                               type="checkbox" name="js">JS
                        <input class="form-check-input mx-2 <?= (!empty($data['learn_err'])) ? 'is-invalid' : '' ?>"
                               type="checkbox" name="git">Git
                        <div class="invalid-feedback">
                            <?= $data['learn_err'] ?>
                        </div>

                    </div>
                    <label for="about"><h5>Расскажите о себе</h5></label>
                    <textarea class="form-control mb-3" name="about" id="about" cols="40" rows="5"></textarea>
                    <input class="btn btn-success mx-3" type="reset" value="Сбросить">
                    <button class="btn btn-primary mx-3">Отправить</button>

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
