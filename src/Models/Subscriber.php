<?php

namespace DivineOmega\CachetPHP\Objects;

class Subscriber extends ModelBase
{
    protected $id;

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('subscribers/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }
}
