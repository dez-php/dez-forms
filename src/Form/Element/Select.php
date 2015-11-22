<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\SelectElement;

    class Select extends Element {

        public function createElement()
        {
            return new SelectElement($this->getName(), $this->getValue());
        }

    }