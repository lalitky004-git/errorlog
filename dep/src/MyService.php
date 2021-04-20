<?php

namespace Drupal\dep;

use Drupal\Core\Logger\LoggerChannelFactory;
class MyService {

  /**
   * Logger Factory.
   *
   * @var \Drupal\Core\Logger\LoggerChannelFactory
   */
  protected $loggerFactory;

  /**
   * Constructor.
   */
  public function __construct(LoggerChannelFactory $loggerFactory) {
    $this->loggerFactory = $loggerFactory->get('dep');
  }
  
  public function logSomething($something) {
    $this->loggerFactory->error('okey : @something', [
      '@something' => $something,
    ]);
  }

}
