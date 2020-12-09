<?php

namespace Otiumtek\StelOrderLaravel;

use Otiumtek\StelOrderLaravel\Contracts\IProductService;
use Otiumtek\StelOrderLaravel\Contracts\ICustomerService;
use Otiumtek\StelOrderLaravel\Contracts\ISaleOrderService;

class StelOrderLaravel{

    public static function getCustomers(array $data)
    {
        return app()->make(ICustomerService::class)->getCustomers($data);
    }

    public static function getProducts(array $data)
    {
        return app()->make(IProductService::class)->getProducts($data);
    }

    public static function getTaxs(array $data)
    {
        return app()->make(IProductService::class)->getTaxs($data);
    }

    public static function getSaleOrders(array $data)
    {
        return app()->make(ISaleOrderService::class)->getSaleOrders($data);
    }

    public static function getSaleOrdersById(int $id)
    {
        return app()->make(ISaleOrderService::class)->getSaleOrdersById($id);
    }

    public static function createSaleOrder(array $data)
    {
        return app()->make(ISaleOrderService::class)->createSaleOrder($data);
    }

    public static function updateSaleOrder(int $id, array $data)
    {
        return app()->make(ISaleOrderService::class)->updateSaleOrder($id, $data);
    }

    public static function deleteSaleOrder(int $id)
    {
        return app()->make(ISaleOrderService::class)->deleteSaleOrder($id);
    }

    public static function getDocumentStates(int $id)
    {
        return app()->make(ISaleOrderService::class)->getDocumentStates($data);
    }

}
