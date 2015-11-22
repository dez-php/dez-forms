<?php

    namespace Dez\Form\Element;

    use Dez\Form\Element;

    class RangeSelect extends Select {

        public function __construct($name, $label = null, $start = 0, $end = 1000, $step = 1, $default = null)
        {
            parent::__construct($name, iterator_to_array($this->generateRange($start, $end, $step)), $label, $default);
        }

        protected function generateRange($start, $end, $step)
        {
            for($i = $start; $i <= $end; $i += $step) {
                yield $i => $i;
            }
        }

    }