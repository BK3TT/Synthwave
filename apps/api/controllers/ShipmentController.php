<?php

class ShipmentController extends Controller 
{
    public function create() 
    {
        if (!$this->data['customer_id']) {
            return ['error' => 'Customer id is required.'];
        } else if (trim($this->data['customer_address']) == '') {
            return ['error' => 'Customer address is required.'];
        } else if (trim($this->data['billing_address']) == '') {
            return ['error' => 'Billing address is required.'];
        } else if (!$this->data['order_id']) {
            return ['error' => 'Order id is required.'];
        } else if (trim($this->data['order_price']) == '') {
            return ['error' => 'Order price is required.'];
        } else if (trim($this->data['delivery_cost']) == '') {
            return ['error' => 'Delivery cost is required.'];
        } else if (trim($this->data['total_cost']) == '') {
            return ['error' => 'Total price is required.'];
        }

        $shipment = Shipment::create($this->data)->id;

        if ($shipment) {
            $orderUpdate = Order::where('id', $this->data['order_id'])->update([
                'status_id' => 4
            ]);

            if (!$orderUpdate) {
                return ['error' => 'Failed to update order status.'];
            } else {
                return ['success' => 'New shipment added.'];
            }
        }

        return ['error' => 'Failed to create shipment.'];
    }
}