<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-4 mx-auto">
        <div class="card mt-4">
            <div class="card card-body bg-light">
                <h2>Регистрация</h2>
                <form action="<?= URL_ROOT ?>/users/register" method="post" class="needs-validation">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email*</label>
                        <input type="text"
                               class="form-control <?= (!empty($data['email_err'])) ? 'is-invalid' : '' ?>"
                               name="email" id="exampleFormControlInput1"
                               placeholder="email@example.com" value="<?= $data['email'] ?>">
                        <div class="invalid-feedback">
                            <?= $data['email_err'] ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Пароль*</label>
                        <input type="password" name="password" id="inputPassword5"
                               class="form-control <?= (!empty($data['password_err'])) ? 'is-invalid' : '' ?>"
                               aria-labelledby="passwordHelpBlock">
                        <div class="invalid-feedback">
                            <?= $data['password_err'] ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputPassword5" class="form-label">Подтвердите пароль*</label>
                        <input type="password" name="confirm_password" id="inputPassword5"
                               class="form-control <?= (!empty($data['confirm_password_err'])) ? 'is-invalid' : '' ?>"
                               aria-labelledby="passwordHelpBlock">
                        <div class="invalid-feedback">
                            <?= $data['confirm_password_err'] ?>
                        </div>
                        <div id="passwordHelpBlock" class="form-text">
                            Пароль должен быть от 8 до 20 символов, недопустимы пробелы, спецсимволы и эмодзи
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input <?= (!empty($data['agreed_err'])) ? 'is-invalid' : '' ?>"
                                   type="checkbox" id="invalidCheck" name="agreed"
                                   value="agreed">
                            <label class="form-check-label" for="invalidCheck">
                                Я прочитал(а) условия <a href="https://youtu.be/26NgQua2FOg" target="_blank">пользовательского
                                    соглашения</a>
                            </label>
                            <div class="invalid-feedback">
                                <?= $data['agreed_err'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-success btn-block">Зарегистрироваться</button>
                        </div>
                        <div class="col-auto">
                            <a href="<?= URL_ROOT ?>/users/login" class="btn btn-light btn-block">Есть акканут?
                                Войдите</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>
