<?php

/**
 * Class LoginForm
 */
class LoginForm extends \Dez\Form\Form {

    /**
     * LoginForm constructor.
     * @param null $action
     */
    public function __construct($action)
    {
        parent::__construct($action, 'post', false);

        $this
            ->addEmail('email', 'Enter your email!')
            ->addPassword('password', 'Enter your password')
            ->addSubmit('Sing in!');
    }

}