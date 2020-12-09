<?php

namespace Otiumtek\StelOrderLaravel\Contracts;

interface IProductService {
    
    public function getProducts(array $data);

    public function getTaxs(array $data);

}