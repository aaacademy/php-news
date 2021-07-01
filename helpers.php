<?php
session_start();

function setFlash($message = "", $class = "alert alert-success") {
    $_SESSION['message'] = $message;
    $_SESSION['class'] = $class;
}

function getFlash() {
    if(@$_SESSION["message"]) {
        $result = <<<HTML
        <div class="alert position-absolute" style="right: 0">
            <div class="$_SESSION[class]">
                $_SESSION[message]
            </div>
        </div>
        HTML;

        echo $result;
        unset($_SESSION['message']);
        unset($_SESSION['class']);
    }
}