<?php

session_start();

/**
 * Flash message helper
 * e.g - flashMessage('logged_in', 'Вы авторизованы!', 'alert alert-danger');
 * displayed in view as flashMessage('logged_in');
 * @param string $name
 * @param string $message
 * @param string $class
 * @return string | array
 */
function flashMessage(string $name, string $message='', string $class = 'alert alert-success'): string | array
{
    // Try to print message
    $flashMessage = getFlashMessage($name);
    if (!empty($flashMessage)){
        echo $flashMessage;
        unset($_SESSION[$name]);
        return '';
    }
    $_SESSION[$name] = [
        'name' => $name,
        'message' => $message,
        'class' => $class
    ];
    return $_SESSION[$name];
}

/**
 * FlashMessage getter
 * @param string $name
 * @return string
 */
function getFlashMessage(string $name): string
{
    if (!empty($_SESSION[$name])) {
        $class = $_SESSION[$name]['class'];
        return "<div class='$class' id='flash-msg'>$_SESSION[$name]['message']</div>";
    }
    return '';
}
