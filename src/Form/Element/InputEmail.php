<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\InputEmailElement;

    class InputEmail extends Element {

        public function createElement()
        {
            $input     = new InputEmailElement($this->getName());
            return $input;
        }

    }