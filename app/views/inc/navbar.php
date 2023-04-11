<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="<?= URL_ROOT ?>/pages/main">
            <div style="color: #6c757d">TaskOne</div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-1 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/pages/main">Главная</a>
                </li>
            </ul>
            <ul class="navbar-nav mx-1 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/pages/products">Наша
                        продукция</a>
                </li>
            </ul>

            <ul class="navbar-nav mx-1 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/forms/index">
                        <button class="btn btn-light">Заказать консультацию</button>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav mx-1 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= URL_ROOT ?>/pages/about">О компании</a>
                </li>
            </ul>


            <?php if (isset($_SESSION['user_id'])): ?>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?=$_SESSION['email']?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= URL_ROOT ?>/pages/profile">Профиль</a></li>
                            <li><a class="dropdown-item" href="<?= URL_ROOT ?>/forms/view_form">Отправленные заявки</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= URL_ROOT ?>/users/logout">Выйти</a></li>

                        </ul>
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