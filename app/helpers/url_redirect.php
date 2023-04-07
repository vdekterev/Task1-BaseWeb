<?php

/**
 * Redirect Helper
 * @param string $page
 * @return void
 */
function url_redirect(string $page): void
{
    header('Location: ' . URL_ROOT . "/$page");
}
