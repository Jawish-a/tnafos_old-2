<?php

namespace App;

class Quest
{
    public $products;
    public $services;

    public $totalQty = 0;

    public function __construct($oldQuest)
    {
        if ($oldQuest) {
            $this->products = $oldQuest->products;
            $this->services = $oldQuest->services;
            $this->totalQty = $oldQuest->totalQty;
        }

    }

    public function addProduct($product, $id)
    {
        $storedProducts = ['product' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $storedProducts = $this->products[$id];
            }
        }
        $this->products[$id] = $storedProducts;
        $this->totalQty++;
    }
    public function addService($service, $id)
    {
        $storedServices = ['service' => $service];
        if ($this->services) {
            if (array_key_exists($id, $this->services)) {
                $storedServices = $this->services[$id];
            }
        }
        $this->services[$id] = $storedServices;
        $this->totalQty++;
    }

}
