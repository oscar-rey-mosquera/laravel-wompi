<?php

namespace LaravelWompi\Tests;

use LaravelWompi\LaravelWompiProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      LaravelWompiProvider::class
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // perform environment setup
  }

  /** 
   * @test
   */
  public function example_test() {
    $this->assertTrue(true);
  }
}