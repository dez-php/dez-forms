<?php

namespace Dez\Form;

use Dez\Html\HtmlElement;

/**
 * Class Element
 * @package Dez\Form
 */
abstract class Element
{

  /**
   * @var null
   */
  protected $name = null;

  /**
   * @var string
   */
  protected $label = '';

  /**
   * @var null
   */
  protected $value = null;

  /**
   * @var null
   */
  protected $default = null;

  /**
   * @var HtmlElement
   */
  protected $element = null;

  /**
   * @var bool
   */
  protected $created = false;

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
   * Cloning
   */
  public function __clone()
  {
    $this->setCreated(false);
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
  public function getElement()
  {
    if (!$this->isCreated()) {
      $this->element = $this->createElement();
      $this->setCreated(true);
    }

    return $this->element;
  }

  /**
   * @return boolean
   */
  public function isCreated()
  {
    return $this->created;
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
