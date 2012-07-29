<?php

namespace mindplay\metamodel\operations;

use mindplay\metamodel\MetaModel;
use mindplay\metamodel\Operation;
use mindplay\metamodel\MetaMember;

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
     * @var $member MetaMember
     */
    $member = $model->getData($this->memberUUID);

    if ($member->getName() === $this->newName) {
      return;
    }

    $member->setName($this, $this->newName);
  }
}
