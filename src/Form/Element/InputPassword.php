<?php

namespace Dez\Form\Element;

use Dez\Form\Element;
use Dez\Html\Element\InputPasswordElement;

/**
 * Class InputPassword
 * @package Dez\Form\Element
 */
class InputPassword extends Element
{

  /**
   * @return InputPasswordElement
   */
  public function createElement()
  {
    return new InputPasswordElement($this->getName());
  }

}