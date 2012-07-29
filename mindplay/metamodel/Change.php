<?php

namespace mindplay\metamodel;

/**
 * This type represents a pair of operations performed on a meta-model -
 * one operation for an upgrade, and a reverse operation for a downgrade.
 */
class Change
{
  /**
   * @var Operation operation applied on upgrade
   */
  protected $up;
  
  /**
   * @var Operation operation applied on downgrade
   */
  protected $down;
  
  public function __construct(Operation $up, Operation $down)
  {
    $this->up = $up;
    $this->down = $down;
  }
  
  public function upgrade(MetaModel $model)
  {
    return $this->up->apply($model);
  }
  
  public function downgrade(MetaModel $model)
  {
    return $this->down->apply($model);
  }
}
