<?php

namespace mindplay\metamodel;

/**
 * This meta-data type represents a Property of a Class.
 */
class MetaProperty extends MetaMember
{
  /**
   * @var string the UUID of the property-type
   */
  protected $typeUUID;
  
  public function __construct($typeUUID)
  {
    parent::__construct();
    
    $this->typeUUID = $typeUUID;
  }
}
