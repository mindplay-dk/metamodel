<?php

namespace mindplay\metamodel;

/**
 * Common ancestor of all meta-data objects in a meta-model.
 */
abstract class MetaData
{
  protected $id;
  
  public function __construct()
  {
    $this->id = self::createUUID();
  }
  
  /**
   * @return string UUID identifier of this meta-data object
   */
  public function getId()
  {
    return $this->id;
  }
  
  /**
   * Create a new pseudo-random UUID
   *
   * @see https://github.com/danlopez00/generate-guid
   */
  public static function createUUID()
  {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
      mt_rand(0, 0xffff), mt_rand(0, 0xffff),
      mt_rand(0, 0xffff),
      mt_rand(0, 0x0fff) | 0x4000,
      mt_rand(0, 0x3fff) | 0x8000,
      mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
  }
}
