<?php

namespace mindplay\metamodel;

/**
 * This meta-data type represents a Class in a meta-model.
 */
class MetaClass extends MetaType
{
  /**
   * @var array list of MetaProperty objects
   */
  protected $properties = array();
  
  public function addProperty(Operation $operation, MetaProperty $property)
  {
    $this->properties[] = $property;
  }
  
  public function getChildObjects()
  {
    return array_merge(
      $this->properties,
      parent::getChildObjects()
    );
  }
}
