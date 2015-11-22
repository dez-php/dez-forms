<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\InputPasswordElement;

    class InputPassword extends Element {

        public function createElement()
        {
            return new InputPasswordElement($this->getName());
        }

    }