<?php

session_start();

/**
 * Flash message helper
 * e.g - flashMessage('logged_in', 'Вы авторизованы!', 'alert alert-danger');
 * displayed in view as flashMessage('logged_in');
 * @param string $name
 * @param string $message
 * @param string $class
 * @return string
 */
function flashMessage(string $name, string $message='', string $class = 'alert alert-success'): string
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
    return $_SESSION[$name]['message'];
}

/**
 * FlashMessage getter
 * @param string $name
 * @return string
 */
function getFlashMessage(string $name): string
{
    if (!empty($_SESSION[$name]['message'])) {
        $class = $_SESSION[$name]['class'];
        $message = $_SESSION[$name]['message'];
        return "<div class='$class' id='flash-msg'>$message</div>";
    }
    return '';
}
