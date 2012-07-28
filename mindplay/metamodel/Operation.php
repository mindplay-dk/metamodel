<?php

namespace mindplay\metamodel;

/**
 * This type represents an operation performed on a meta-model.
 */
abstract class Operation
{
  /**
   * Applies the operation to the meta-model.
   *
   * @return bool true if a change was made, false if no change was made
   * @throws OperationException if the change cannot be correctly applied
   */
  abstract public function apply(MetaModel $model);
}
