<?php require APP_ROOT . '/views/inc/header.php'; ?>
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card mt-4">
                <div class="card card-body bg-light">
                    <?=flashMessage('register_success')?>
                    <h2>Авторизация</h2>
                    <form action="<?= URL_ROOT ?>/users/login" method="post">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email*</label>
                            <input type="email"
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

                        <div class="row">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary btn-block"
                                        style="--bs-btn-hover-bg: #{shade-color($indigo, 100%)}">Авторизация
                                </button>
                            </div>

                            <div class="col-auto">
                                <a href="<?= URL_ROOT ?>/users/register" class="btn btn-light btn-block">Еще нет
                                    акканута? Регистрация</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>