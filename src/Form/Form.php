<?php

    namespace Dez\Form;

    use Dez\Form\Element\InputEmail;
    use Dez\Form\Element\InputText;
    use Dez\Form\Element\Submit;
    use Dez\Html\Element\FormElement;

    abstract class Form {

        protected $action;

        protected $method   = 'get';

        protected $multipartData = false;

        protected $elements = [];

        public function __construct($action, $method = 'get', $multipart = false)
        {
            $this->setAction($action)->setMethod($method)->setMultipartData($multipart);
        }

        public function addPassword($name, $label)
        {

        }

        public function addText($name, $label)
        {
            $this->add(new InputText($name, null, $label));
        }

        public function addEmail($name, $label)
        {
            $this->add(new InputEmail($name, null, $label));
        }

        public function addSubmit($value)
        {
            $this->add(new Submit(null, $value));
        }

        public function add(Element $element)
        {
            $this->elements[]   = $this->decorateElement($element);
            return $this;
        }

        /**
         * @return $this
         */
        public function render()
        {
            $form   = new FormElement($this->getAction(), $this->getMethod(), $this->isMultipartData());
            $form->setContent($this->getElements());

            return $form;
        }

        /**
         * @param Element $element
         * @return mixed
         */
        abstract protected function decorateElement(Element $element);

        /**
         * @return mixed
         */
        public function getAction()
        {
            return $this->action;
        }

        /**
         * @param mixed $action
         * @return $this
         */
        public function setAction($action)
        {
            $this->action = $action;
            return $this;
        }

        /**
         * @return string
         */
        public function getMethod()
        {
            return $this->method;
        }

        /**
         * @param string $method
         * @return $this
         */
        public function setMethod($method)
        {
            $this->method = $method;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isMultipartData()
        {
            return $this->multipartData;
        }

        /**
         * @param boolean $multipartData
         * @return $this
         */
        public function setMultipartData($multipartData)
        {
            $this->multipartData = $multipartData;
            return $this;
        }

        /**
         * @return Element[]
         */
        public function getElements()
        {
            return $this->elements;
        }

        /**
         * @param Element[] $elements
         * @return $this
         */
        public function setElements($elements)
        {
            $this->elements = $elements;
            return $this;
        }

    }