<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>/pages">TaskOne</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-auto mb-2 mb-lg-0">
                        <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/users/logout">Выйти</a>
                    </li>
                </ul>
            <?php else: ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item ms-auto mb-2 mb-lg-0">
                        <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/users/login">Войти</a>
                    </li>
                </ul>

                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item ms-auto mb-2 mb-lg-0">
                        <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/users/register">
                            <button class="btn btn-secondary">Регистрация</button>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>