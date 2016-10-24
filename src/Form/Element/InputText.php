<?php

namespace Dez\Form\Element;

use Dez\Form\Element;
use Dez\Html\Element\InputTextElement;

/**
 * Class InputText
 * @package Dez\Form\Element
 */
class InputText extends Element
{

  /**
   * @return InputTextElement
   */
  public function createElement()
  {
    $input = new InputTextElement($this->getName());
    return $input;
  }

}