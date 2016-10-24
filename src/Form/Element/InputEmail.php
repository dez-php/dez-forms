<?php

namespace Dez\Form\Element;

use Dez\Form\Element;
use Dez\Html\Element\InputEmailElement;

/**
 * Class InputEmail
 * @package Dez\Form\Element
 */
class InputEmail extends Element
{

  /**
   * @return InputEmailElement
   */
  public function createElement()
  {
    $input = new InputEmailElement($this->getName());
    return $input;
  }

}