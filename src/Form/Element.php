<?php

    namespace Dez\Form;

    use Dez\Html\HtmlElement;

    abstract class Element {

        protected $name     = null;

        protected $label    = '';

        protected $value    = null;

        protected $default  = null;

        protected $element  = null;

        protected $created  = false;

        /**
         * Element constructor.
         * @param $name
         * @param null $value
         * @param null $label
         * @param null $default
         */
        public function __construct($name, $value = null, $label = null, $default = null)
        {
            $this->setName($name)->setValue($value)->setLabel($label)->setDefault($default);
        }

        /**
         * @return null
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @param null $name
         * @return $this
         */
        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        /**
         * @return string
         */
        public function getLabel()
        {
            return $this->label;
        }

        /**
         * @param string $label
         * @return $this
         */
        public function setLabel($label)
        {
            $this->label = $label;
            return $this;
        }

        /**
         * @return null
         */
        public function getValue()
        {
            return $this->value;
        }

        /**
         * @param null $value
         * @return $this
         */
        public function setValue($value)
        {
            $this->value = $value;
            return $this;
        }

        /**
         * @return null
         */
        public function getDefault()
        {
            return $this->default;
        }

        /**
         * @param null $default
         * @return $this
         */
        public function setDefault($default)
        {
            $this->default = $default;
            return $this;
        }

        /**
         * @return boolean
         */
        public function isCreated()
        {
            return $this->created;
        }

        /**
         * @return HtmlElement
         */
        public function getElement()
        {
            if(! $this->isCreated()) {
                $this->element  = $this->createElement();
                $this->setCreated(true);
            }

            return $this->element;
        }

        /**
         * @param boolean $created
         * @return static
         */
        public function setCreated($created)
        {
            $this->created = $created;
            return $this;
        }

        /**
         * @return HtmlElement
         */
        abstract protected function createElement();

    }
