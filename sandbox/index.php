<?php

namespace Sandbox;

use Dez\Form\Decorator\Bootstrap2;
use Dez\Form\Element\MonthSelect;
use Dez\Form\Element\RangeSelect;
use Dez\Form\Form;

include_once '../vendor/autoload.php';

error_reporting(1); ini_set('display_errors', 1);

$form    = new Form('?r=/app/update_user.php', 'post', true);

$form->setDecorator(new Bootstrap2());

$form->addEmail('email', 'Enter your email');
$form->addEmail('email_repeat', 'Repeat your email');
$form->addSubmit('Submit me!');

$subscriptionForm   = clone $form;

$form->addSelect('sex', [
    'Famale'    => 'f',
    'Male'      => 'm'
], 'you are?');

$form->addText('comment', 'comment [optional]');

$form->addPassword('pwd', 'enter password!');

$form->add(
    new MonthSelect('month', 'select birth day month', 7)
);

$form->add(
    new RangeSelect('y', 'year', 1890, date('Y'), 5)
);

$form->addSubmit('submit me 1');

$form->addSubmit('submit me 2');

?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Form test</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://getbootstrap.com/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <div class="row marketing">
        <div class="col-lg-10">
            <h3>Form 1</h3>
            <?= $subscriptionForm; ?>

            <h3>Form 2</h3>
            <?= $form; ?>
        </div>
    </div>

    <footer class="footer">
        <p>Dez Forms</p>
    </footer>

</div>

</body>
</html>
