<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\InputTextElement;

    class InputText extends Element {

        public function createElement()
        {
            $input     = new InputTextElement($this->getName());
            return $input;
        }

    }