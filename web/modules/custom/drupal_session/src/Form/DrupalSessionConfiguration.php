<?php

namespace Drupal\drupal_session\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class DrupalSessionConfiguration extends  ConfigFormBase{

  const SETTINGS = 'drupal_session.settings';

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupal_session_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);

    $form['external_api_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('External Api URL'),
      '#default_value' => $config->get('external_api_url'),
      '#required' => true
    ];


    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.
    $this->config(static::SETTINGS)
      ->set('external_api_url', $form_state->getValue('external_api_url'))
      ->save();

    parent::submitForm($form, $form_state);
  }


  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }
}
