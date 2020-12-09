<?php

namespace Otiumtek\StelOrderLaravel\Contracts;

interface IDocumentService {
    
    public function getSalesDeliveryNotes(array $filter);

    public function getSaleDeliveryNoteById(int $id);

    public function createSaleDeliveryNote(array $data);

    public function updateSaleDeliveryNote(int $id, array $data);

    public function deleteSaleDeliveryNote(int $id);

    public function getOrdinaryInvoices(array $filter);

    public function getOrdinaryInvoiceById(int $id);

    public function getRefundInvoices(array $filter);

    public function getRefundInvoiceById(int $id);

    public function getDocumentStates(array $data); 

}