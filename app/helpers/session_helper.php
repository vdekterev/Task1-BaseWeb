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
function flashMessage(string $name, string $message = '', string $class = 'alert alert-success'): string
{
    if (!empty($message)) {
        $_SESSION[$name] = [
            'name' => $name,
            'message' => $message,
            'class' => $class
        ];
        return '';
    }
    if (isset($_SESSION[$name])){
        $class = $_SESSION[$name]['class'];
        $message = $_SESSION[$name]['message'];
        unset($_SESSION[$name]);
        return "<div class='$class' id='flash-msg'>$message</div>";
    }
    return '';

}
