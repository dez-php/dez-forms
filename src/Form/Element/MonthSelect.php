<?php

namespace Dez\Form\Element;

/**
 * Class MonthSelect
 * @package Dez\Form\Element
 */
class MonthSelect extends Select
{

  /**
   * MonthSelect constructor.
   * @param $name
   * @param null $label
   * @param null $default
   */
  public function __construct($name, $label = null, $default = null)
  {
    parent::__construct($name, iterator_to_array($this->generateMonths()), $label, $default);
  }

  /**
   * @return \Generator
   */
  protected function generateMonths()
  {
    for ($m = 1; $m <= 12; $m++) {
      $month = date('F', mktime(0, 0, 0, $m, 1, date('Y')));
      yield $month => $m;
    }
  }

}