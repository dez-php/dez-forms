<?php

    namespace Dez\Form\Decorator;

    use Dez\Form\Element;
    use Dez\Form\Form;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\FormElement;
    use Dez\Html\Element\InputSubmitElement;
    use Dez\Html\Element\LabelElement;

    class Bootstrap2 extends Form {

        /**
         * @return FormElement
         */
        public function render()
        {
            $form   = new FormElement($this->getAction(), $this->getMethod(), $this->isMultipartData());
            $form->addClass('form-horizontal')->setAttribute('role', 'form');
            $form->setContent($this->getElements());
            return $form;
        }

        /**
         * @param Element $element
         * @return $this
         */
        public function prepareElement(Element $element)
        {
            $identify       = "dez-element-{$element->getName()}";

            $input          = $element->createElement()->addClass('form-control')->id($identify);

            if($input instanceof InputSubmitElement) {
                $input->addClass('btn btn-primary');
            }
                $input       = new DivElement($input);
                $input->addClass('col-sm-10');


            $label          = new LabelElement($element->getLabel());
            $label->addClass('control-label')->addClass('col-sm-2')->setAttribute('for', $identify);

            $div    = new DivElement([ $label, $input ]);
            return $div->addClass('form-group');
        }

    }