<?php

    namespace Sandbox;

    use Dez\Form\Decorator\Simple;

    include_once '../vendor/autoload.php';

    error_reporting(1); ini_set('display_errors', 1);

    $form    = new Simple(
        '?r=/app/update_user.php', 'post', true
    );

    $form->addEmail('email', 'enter your email');

    $form->addSubmit('submit me!!1');

    echo $form->render();