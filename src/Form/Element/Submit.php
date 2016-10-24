<?php

namespace Dez\Form\Element;

use Dez\Form\Element;
use Dez\Html\Element\InputSubmitElement;

/**
 * Class Submit
 * @package Dez\Form\Element
 */
class Submit extends Element
{

  /**
   * @return InputSubmitElement
   */
  public function createElement()
  {
    return new InputSubmitElement($this->getValue());
  }

}