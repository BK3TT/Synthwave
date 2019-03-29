<?php

class OrderController extends Controller 
{
    public function view() 
    {
        if ($this->data['id']) {
            $order = Order::where('id', '=', $this->data['id'])->get()->first();

            if ($order) {
                return $order;
            }

            return ['error' => 'No order to view.'];
        }

        return ['error' => 'You can not view order.'];
    }

    public function viewAll()
    {
        $orders = Order::orderBy('created_at')->get();
        return $orders;
    }

    public function create() 
    {
        if (!$this->data['customer_id']) {
            return ['error' => 'Customer Id is required.'];
        }

        if (!is_array($this->data['products']) && empty($this->data['products'])) {
            return ['error' => 'No products added to order.'];
        }

        $total_price = array_sum(array_map(function($product) {
            return $product['price']; 
        }, $this->data['products']));

        $this->data['total_price'] = $total_price;
        $this->data['status_id'] = 1;

        $this->products = $this->data['products'];

        unset($this->data['products']);

        $order_id = $this->order->create($this->data)->id;

        if ($order_id) {
            foreach ($this->products as $key => $product) {
                $product['order_id'] = $order_id;    
                OrderProducts::create($product);
            }

            return ['success' => 'New order added.'];
        }

        return ['error' => 'Failed to create order.'];
    }

    public function filter() 
    {
        if (!empty($this->data)) {
            if (!isset($this->data['order'])) {
                $this->data['order'] = 'ASC';
            }

            if ($this->data['type'] == 'date') {
                if ($this->data['when'] == 'today') {
                    $orders = Order::whereRaw('date(created_at) = curdate()')
                                ->where('status_id', '=', $this->data['status'])
                                ->orderBy('created_at', $this->data['order'])
                                ->get();
                }
            }

            if (!$orders->isEmpty()) {
                return $orders;
            }

            return ['error' => 'No orders to view'];
        } 
    }
}