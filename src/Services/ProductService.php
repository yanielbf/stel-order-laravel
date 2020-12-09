<?php 

namespace Otiumtek\StelOrderLaravel\Services;

use Illuminate\Http\Client\PendingRequest;
use Otiumtek\StelOrderLaravel\Contracts\IProductService;
use Otiumtek\StelOrderLaravel\Models\Product;
use Otiumtek\StelOrderLaravel\Models\Tax;
use Otiumtek\StelOrderLaravel\Exceptions\ParseDataStelOrderException;
use Otiumtek\StelOrderLaravel\Exceptions\FailedCommunicationStelOrderException;
use Illuminate\Http\Client\ConnectionException;

class ProductService implements IProductService {

    private $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }
    
    public function getProducts(array $data)
    {
        $query = http_build_query($data);
        
        $response = $this->client->get("/products?$query");
        if($response->ok()){
            try{
                return collect($response->json())->filter(function($item){
                    return !$item['inactive'];
                })->map(function($item){
                    return Product::make($item);
                });
            } catch(\Throwable $th){
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException();
    }

    public function getTaxs(array $data)
    {
        $query = http_build_query($data);
        $response = $this->client->get("/taxLines?$query");
        if($response->ok()){
            try{
                return collect($response->json())->map(function($item){
                    return Tax::make($item);
                });
            } catch(\Throwable $th){
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException();
    }

}