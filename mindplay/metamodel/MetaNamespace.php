<?php

namespace mindplay\metamodel;

/**
 * This type is the aggregate-root of a persistent meta-model, and represents
 * a namespace containing a list of types.
 */
class MetaNamespace extends MetaData implements IMetaDataCollection
{
  /**
   * @var array collection of MetaType objects
   */
  protected $types = array();
  
  /**
   * @var string the root-namespace of this meta-model.
   */
  protected $namespace;
  
  public function __construct($namespace)
  {
    parent::__construct();
    
    $this->namespace = $namespace;
  }
  
  public function addType(MetaModelOperation $operation, MetaType $type)
  {
    $this->types[$type->id] = $type;
  }
  
  public function getChildObjects()
  {
    return $this->types;
  }
}
