<?php

namespace Drupal\drupal_session\Controller;

use Drupal\Core\Controller\ControllerBase;

class ContentList extends ControllerBase {


  public function getContentList(){

    $data_set = [
      0 => ['name' => 'Manish', 'age' => 37, 'dob' => 'abc'],
      1 => ['name' => 'Mohan', 'age' => 38, 'dob' => 'abc'],
      2 => ['name' => 'Himani', 'age' => 39, 'dob' => 'abc']
    ];

    return [
      '#theme' => 'get_content_list',
      '#data_set' => $data_set
    ];
  }
}
