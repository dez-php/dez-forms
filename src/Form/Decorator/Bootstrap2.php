<?php

    namespace Dez\Form\Decorator;

    use Dez\Form\Decorator;
    use Dez\Form\Element;
    use Dez\Html\Element\DivElement;
    use Dez\Html\Element\FormElement;
    use Dez\Html\Element\LabelElement;
    use Dez\Html\HtmlElement;

    class Bootstrap2 extends Decorator {

        /**
         * @param Element $element
         * @return HtmlElement
         */
        public function element(Element $element)
        {
            return (new DivElement([ new LabelElement($element->getLabel()), $element->getElement() ]))->addClass('bootstrap-row');
        }

        /**
         * @return string
         * @throws \Exception
         */
        public function render()
        {
            $action         = $this->getForm()->getAction();
            $method         = $this->getForm()->getMethod();
            $isMultipart    = $this->getForm()->isMultipartData();

            $form   = new FormElement($action, $method, $isMultipart);
            $form->setContent($this->getForm()->getElements());

            return $form->render();
        }

    }