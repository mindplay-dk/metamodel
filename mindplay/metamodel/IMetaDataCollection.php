<?php

namespace mindplay\metamodel;

/**
 * This interface is implemented by MetaData-types that contain MetaData child-objects.
 */
interface IMetaDataCollection
{
  public function getChildObjects();
}
