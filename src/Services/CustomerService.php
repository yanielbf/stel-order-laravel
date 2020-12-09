<?php 

namespace Otiumtek\StelOrderLaravel\Services;

use Otiumtek\StelOrderLaravel\Contracts\ICustomerService;
use Illuminate\Http\Client\PendingRequest;
use Otiumtek\StelOrderLaravel\Models\Customer;
use Otiumtek\StelOrderLaravel\Models\FailedResponse;
use Otiumtek\StelOrderLaravel\Exceptions\ParseDataStelOrderException;
use Otiumtek\StelOrderLaravel\Exceptions\FailedCommunicationStelOrderException;

class CustomerService implements ICustomerService {

    private $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }
    
    public function getCustomers(array $data)
    {
        $query = http_build_query($data);
        $response = $this->client->get("/clients?$query");
        if($response->ok()){
            try{
                return collect($response->json())->map(function($item){
                    return Customer::make($item);
                });
            } catch(\Throwable $th){
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException();
    }

}