<?php 

namespace Otiumtek\StelOrderLaravel\Services;

use Illuminate\Http\Client\PendingRequest;
use Otiumtek\StelOrderLaravel\Contracts\IDocumentService;
use Otiumtek\StelOrderLaravel\Models\DocumentState;
use Illuminate\Support\Facades\Validator;
use Otiumtek\StelOrderLaravel\Models\Document;
use Otiumtek\StelOrderLaravel\Models\OrdinaryInvoice;
use Otiumtek\StelOrderLaravel\Models\FailedResponse;
use Otiumtek\StelOrderLaravel\Exceptions\ParseDataStelOrderException;
use Otiumtek\StelOrderLaravel\Exceptions\FailedCommunicationStelOrderException;
use Illuminate\Validation\ValidationException;

class DocumentService implements IDocumentService {

    private $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    public function getSalesDeliveryNotes(array $filter){
        $query = http_build_query($filter);
        $response = $this->client->get("/salesDeliveryNotes?$query");
        if($response->ok()){
            try {
                return collect($response->json())->filter(function($item){
                    return !$item['deleted'];
                })->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
            
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getSaleDeliveryNoteById(int $id){
        $response = $this->client->get("/salesDeliveryNotes/$id");
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function createSaleDeliveryNote(array $data){
        
        $validator = Validator::make($data, [
            'title' => 'required',
            'account-id' => 'required',
            'currency-code' => 'required',
            'lines.*.item-id' => 'required',
            'lines.*.line-type' => 'required',
            'lines.*.units' => 'required',
        ]);

        if($validator->fails()){
            throw new ValidationException();
        }

        $data['agent-id'] = config('stel-order.sale-agent-id');

        $response = $this->client->post("/salesOrders", $data);
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function updateSaleDeliveryNote(int $id, array $data){
        $response = $this->client->put("/salesOrders/$id", $data);
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function deleteSaleDeliveryNote(int $id){
        $response = $this->client->delete("/salesOrders/$id");
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getOrdinaryInvoices(array $filter){
        $query = http_build_query($filter);
        $response = $this->client->get("/ordinaryInvoices?$query");
        if($response->ok()){
            try {
                return collect($response->json())->filter(function($item){
                    return !$item['deleted'];
                })->map(function($item){
                    return OrdinaryInvoice::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getOrdinaryInvoiceById(int $id){
        $response = $this->client->get("/ordinaryInvoices/$id");
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return OrdinaryInvoice::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getRefundInvoices(array $filter){
        $query = http_build_query($filter);
        $response = $this->client->get("/refundInvoices?$query");
        if($response->ok()){
            try {
                return collect($response->json())->filter(function($item){
                    return !$item['deleted'];
                })->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getRefundInvoiceById(int $id){
        $response = $this->client->get("/refundInvoices/$id");
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return Document::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

    public function getDocumentStates(array $data){
        $query = http_build_query($data);
        $response = $this->client->get("/documentStates?$query");
        if($response->ok()){
            try {
                return collect($response->json())->map(function($item){
                    return DocumentState::make($item);
                });
            } catch (\Throwable $th) {
                throw new ParseDataStelOrderException($th);
            }
        }
        throw new FailedCommunicationStelOrderException;
    }

}