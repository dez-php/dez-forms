<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;
    use Dez\Html\Element\SelectElement;

    /**
     * Class Select
     * @package Dez\Form\Element
     */
    class Select extends Element {

        /**
         * @return SelectElement
         */
        public function createElement()
        {
            return new SelectElement($this->getName(), $this->getValue(), $this->getDefault());
        }

    }