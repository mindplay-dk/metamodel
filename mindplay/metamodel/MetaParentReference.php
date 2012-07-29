<?php

namespace mindplay\metamodel;

/**
 * This meta-data type represents the matching parent-reference of a reference-property.
 */
class MetaParentReference extends MetaProperty
{
  /**
   * @var string UUID of matching MetaReference
   */
  protected $refUUID;
  
  public function __construct($typeUUID, $refUUID)
  {
    parent::__construct($typeUUID);
    
    $this->refUUID = $refUUID;
  }
}
