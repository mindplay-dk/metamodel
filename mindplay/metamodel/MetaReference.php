<?php

namespace mindplay\metamodel;

/**
 * This meta-data type represents a Property referencing an instance of a Class.
 */
class MetaReference extends MetaProperty
{
  /**
   * @var string UUID of MetaParentReference
   */
  protected $parentUUID;
  
  public function __construct($typeUUID, $parentUUID)
  {
    parent::__construct($typeUUID);
    
    $this->parentUUID = $parentUUID;
  }
}
