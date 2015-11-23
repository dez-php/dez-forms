<?php

    namespace Dez\Form;

    use Dez\Html\HtmlElement;

    abstract class Element {

        protected $name     = null;

        protected $label    = '';

        protected $value    = null;

        protected $default  = null;

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
         * @return HtmlElement
         */
        abstract public function createElement();

    }
