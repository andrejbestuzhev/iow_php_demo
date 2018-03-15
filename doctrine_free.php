<?php
/**
 * Frees the resources used by the collection.
 * WARNING: After invoking free() the collection is no longer considered to
 * be in a useable state. Subsequent usage may result in unexpected behavior.
 *
 * @return void
 */
public function free($deep = false)
{
    foreach ($this->getData() as $key => $record) {
        if ( ! ($record instanceof Doctrine_Null)) {
            $record->free($deep);
        }
    }

    $this->data = array();

    if ($this->reference) {
        $this->reference->free($deep);
        $this->reference = null;
    }
}
