<?php

namespace mindplay\metamodel\operations;

use mindplay\metamodel\Operation;

/**
 * This operation changes the name of a MetaMember
 */
class SetMemberName extends Operation
{
  protected $memberUUID;
  
  protected $newName;
  
  public function __construct($memberUUID, $newName)
  {
    $this->memberUUID = $memberUUID;
    $this->newName = $newName;
  }
  
  public function apply(MetaModel $model)
  {
    /**
     * @var MetaMember
     */
    $member = $model->getData($this->memberUUID);
    
    if ($member->getName() === $this->newName) return;
    
    $member->setName($this, $this->newName);
  }
}
