<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\InputSubmitElement;

    class Submit extends Element {

        public function createElement()
        {
            $submit     = new InputSubmitElement($this->getValue());
            return $submit;
        }

    }