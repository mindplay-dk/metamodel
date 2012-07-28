<?php

namespace mindplay\metamodel;

/**
 * Common ancestor of meta-data objects that represent members, e.g. named
 * classes and properties, which may have annotations.
 */
abstract class MetaMember extends MetaData implements IMetaDataCollection
{
  /**
   * @var string property-name
   */
  protected $name;
  
  /**
   * @var array collection of MetaAnnotation objects associated with this type.
   */
  protected $annotations = array();
  
  public function getName()
  {
    return $this->name;
  }
  
  public function setName(MetaModelOperation $operation, $name)
  {
    $this->name = $name;
  }
  
  public function addAnnotation(MetaModelOperation $operation, MetaAnnotation $annotation)
  {
    $this->annotations[] = $annotation;
  }
  
  public function getChildObjects()
  {
    return $this->annotations;
  }
}
