<?php

namespace Dez\Form;

use Dez\Form\Decorator\DefaultForm;
use Dez\Form\Element\InputEmail;
use Dez\Form\Element\InputPassword;
use Dez\Form\Element\InputText;
use Dez\Form\Element\Select;
use Dez\Form\Element\Submit;

/**
 * Class Form
 * @package Dez\Form
 */
class Form
{

  /**
   * @var Decorator
   */
  protected $decorator;

  /**
   * @var string
   */
  protected $action;

  /**
   * @var string
   */
  protected $method = 'get';

  /**
   * @var bool
   */
  protected $multipartData = false;

  /**
   * @var Element[]
   */
  protected $elements = [];

  /**
   * Form constructor.
   * @param $action
   * @param string $method
   * @param bool|false $multipart
   */
  public function __construct($action = null, $method = 'get', $multipart = false)
  {
    $this->setAction($action)->setMethod($method)->setMultipartData($multipart)->setDecorator(new DefaultForm($this));
  }

  /**
   * Cloning
   */
  public function __clone()
  {
    $this->setDecorator(clone $this->getDecorator());
    $this->getDecorator()->setForm($this);
  }

  /**
   * @return Decorator
   */
  public function getDecorator()
  {
    return $this->decorator;
  }

  /**
   * @param Decorator $decorator
   * @return static
   */
  public function setDecorator(Decorator $decorator)
  {
    if (!$decorator->hasForm()) {
      $decorator->setForm($this);
    }

    $this->decorator = $decorator;
    return $this;
  }

  /**
   * @return string
   */
  public function __toString()
  {
    return $this->render();
  }

  /**
   * @return string
   */
  public function render()
  {
    return $this->getDecorator()->render();
  }

  /**
   * @param $name
   * @param $label
   * @return Form
   */
  public function addPassword($name, $label)
  {
    return $this->add(new InputPassword($name, null, $label));
  }

  /**
   * @param Element $element
   * @return $this
   */
  public function add(Element $element)
  {
    $this->elements[$element->getName()] = $this->getDecorator()->element($element);
    return $this;
  }

  /**
   * @param $name
   * @param $label
   * @return Form
   */
  public function addText($name, $label)
  {
    return $this->add(new InputText($name, null, $label));
  }

  /**
   * @param $name
   * @param $label
   * @return Form
   */
  public function addEmail($name, $label)
  {
    return $this->add(new InputEmail($name, null, $label));
  }

  /**
   * @param $value
   * @return Form
   */
  public function addSubmit($value)
  {
    return $this->add(new Submit(null, $value));
  }

  /**
   * @param $name
   * @param array $data
   * @param $label
   * @return Form
   */
  public function addSelect($name, array $data = [], $label)
  {
    return $this->add(new Select($name, $data, $label));
  }

  /**
   * @param array $defaultValues
   * @return $this
   */
  public function setDefaultArray(array $defaultValues = [])
  {
    foreach ($defaultValues as $name => $value) {
      $this->setDefault($name, $value);
    }
    return $this;
  }

  /**
   * @param $name
   * @param null $defaultValue
   * @return $this
   */
  public function setDefault($name, $defaultValue = null)
  {
    if ($this->hasElement($name)) {
      $this->getElement($name)->setDefault($defaultValue);
    }
    return $this;
  }

  /**
   * @param $name
   * @return bool
   */
  public function hasElement($name)
  {
    return isset($this->elements[$name]);
  }

  /**
   * @param $name
   * @return Element
   */
  public function getElement($name)
  {
    return $this->hasElement($name) ? $this->elements[$name] : null;
  }

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