<?php

    namespace Dez\Form\Decorator;

    use Dez\Form\Element;
    use Dez\Form\Form;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\LabelElement;

    class Simple extends Form {

        protected function decorateElement(Element $element)
        {
            $div    = new DivElement([ new LabelElement($element->getLabel()), $element->createElement() ]);
            return $div->addClass('dez-form-row');
        }

    }