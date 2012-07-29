<?php

namespace mindplay\metamodel;

/**
 * This type represents an editable meta-model - it is a transient wrapper
 * for a collection of MetaData objects.
 */
class MetaModel
{
  /**
   * @var array map of UUID to MetaData objects
   */
  protected $data = array();
  
  /**
   * @var array list of MetaModelChange objects added since last save
   */
  protected $changes = array();
  
  /**
   * Load an existing MetaData and any child-objects (recursively) into this manager.
   */
  public function loadData(MetaData $model)
  {
    $this->data[ $model->getId() ] = $model;
    
    if ($model instanceof IMetaDataCollection) {
      /**
       * @var $model IMetaDataCollection
       */
      foreach ($model->getChildObjects() as $child) {
        $this->loadData($child);
      }
    }
  }
  
  /**
   * @return MetaData
   */
  public function getData($uuid)
  {
    return $this->data[$uuid];
  }
  
  /**
   * Apply a change to the meta-model.
   */
  protected function applyChange(Change $change)
  {
    return $change->upgrade($this);
  }
  
  /**
   * Roll back a change made to the meta-model.
   */
  protected function revertChange(Change $change)
  {
    return $change->downgrade($this);
  }
  
  /**
   * Record a new MetaModelChange and apply the upgrade-operation.
   */
  protected function makeChange(Operation $up, Operation $down)
  {
    $change = new Change($up, $down);
    
    if ($this->applyChange($change) !== false) {
      $this->changes[] = $change;
    }
  }
  
  /**
   * Change the name of a member.
   */
  public function setMemberName(MetaMember $member, $newName)
  {
    $this->makeChange(
      new operations\SetMemberName($member->getId(), $newName),
      new operations\SetMemberName($member->getId(), $member->getName())
    );
  }
}
