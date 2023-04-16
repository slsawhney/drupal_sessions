<?php

namespace Drupal\drupal_session\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Test Block' Block.
 *
 * @Block(
 *   id = "test_block",
 *   admin_label = @Translation("Test block by code"),
 *   category = @Translation("Custom"),
 * )
 */
class TestDataBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    /* return [
      '#markup' => '<h2>'.$this->t('Test, World!'). '</h2>',
    ]; */

    //services
    $getService = \Drupal::service('drupal_session.get_data');
    $dataSet = $getService->getData();

    return [
      '#theme' => 'test_block',
      '#data_set' => $dataSet,
    ];
  }

}
