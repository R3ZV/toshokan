<?php
require_once("src/views/404.php");

class Errors {
    static function notFound(): string {
        return notFoundPage();
    }
}
?>
