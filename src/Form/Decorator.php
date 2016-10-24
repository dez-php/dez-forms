<?php

namespace Dez\Form;

use Dez\Html\HtmlElement;

/**
 * Class Decorator
 * @package Dez\Form
 */
abstract class Decorator
{

  /**
   * @var Form
   */
  protected $form;

  /**
   * Decorator constructor.
   * @param Form|null $form
   */
  public function __construct(Form $form = null)
  {
    if ($form !== null) {
      $this->setForm($form);
    }
  }

  /**
   * @return Form
   * @throws \Exception
   */
  public function getForm()
  {
    if (!$this->hasForm()) {
      throw new \Exception('Decorator must have an "' . Form::class . '" object');
    }
    return $this->form;
  }

  /**
   * @param Form $form
   * @return static
   */
  public function setForm(Form $form)
  {
    $this->form = $form;
    return $this;
  }

  /**
   * @return bool
   */
  public function hasForm()
  {
    return $this->form instanceof Form;
  }

  /**
   * @param Element $element
   * @return HtmlElement
   */
  abstract public function element(Element $element);

  /**
   * @return string
   */
  abstract public function render();

}