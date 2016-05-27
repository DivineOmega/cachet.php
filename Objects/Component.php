<?php

namespace DivineOmega\CachetPHP\Objects;

class Component extends ModelBase
{
    public $id;
    public $name;
    public $description;
    public $link;
    public $status;
    public $order;
    public $group_id;

    public function delete()
    {
        $this->cachetInstance->guzzleClient->delete('components/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders()]);
    }

    public function save()
    {
        $queryParams = [];

        $queryParams['name'] = $this->name;
        $queryParams['description'] = $this->description;
        $queryParams['link'] = $this->link;
        $queryParams['status'] = $this->status;
        $queryParams['order'] = $this->order;
        $queryParams['group_id'] = $this->group_id;

        $this->cachetInstance->guzzleClient->put('components/'.$this->id, ['headers' => $this->cachetInstance->getAuthHeaders(),
            'query' => $queryParams, ]);
    }
}
