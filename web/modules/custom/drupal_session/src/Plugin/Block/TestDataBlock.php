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

    $data_set = [
      0 => ['name' => 'Manish', 'age' => 37, 'dob' => 'abc'],
      1 => ['name' => 'Mohan', 'age' => 37, 'dob' => 'abc'],
      2 => ['name' => 'Himani', 'age' => 37, 'dob' => 'abc']
    ];

    return [
      '#theme' => 'test_block',
      '#data_set' => $data_set,
    ];
  }

}
