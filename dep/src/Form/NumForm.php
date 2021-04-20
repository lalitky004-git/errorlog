<?php

namespace Drupal\dep\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\dep\MyService;

/**
 * Our simple form class.
 */
class NumForm extends FormBase {

  protected $loggerFactory;

  /**
   * {@inheritdoc}
   */
  public function __construct(MyService $loggerFactory) {
    $this->loggerFactory = $loggerFactory;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('dep.calc_num')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dep_num_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['fibo_numbers'] = [
      '#type' => 'textfield',
      '#title' => $this->t('enter a number'),
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Generate!'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $this->loggerFactory->logSomething('error logged');
  }

}
