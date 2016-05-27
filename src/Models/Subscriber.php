<?php

namespace DivineOmega\CachetPHP\Models;

class Subscriber extends ModelBase
{
    protected $id;

    public function delete()
    {
        $this->cachetInstance->client()->request('subscribers/'.$this->id, null, 'DELETE');
    }
}
