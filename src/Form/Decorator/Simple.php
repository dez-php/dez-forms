<?php

    namespace Dez\Form\Decorator;

    use Dez\Form\Element;
    use Dez\Form\Form;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\FormElement;
    use Dez\Html\Element\LabelElement;

    class Simple extends Form {

        /**
         * @return FormElement
         */
        public function render()
        {
            $form   = new FormElement($this->getAction(), $this->getMethod(), $this->isMultipartData());
            $form->setContent($this->getElements());
            return $form;
        }

        /**
         * @param Element $element
         * @return $this
         */
        public function prepareElement(Element $element)
        {
            $div    = new DivElement([ new LabelElement($element->getLabel()), $element->createElement() ]);
            return $div->addClass('dez-form-row');
        }

    }