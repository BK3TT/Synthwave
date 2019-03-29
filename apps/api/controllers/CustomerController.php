<?php

class CustomerController extends Controller 
{
    public function create()
    {
        if (empty($this->data['email'])) {
            return ['error' => 'Email is required'];
        }

        $customer = Customer::where('email', '=', $this->data['email'])->get()->first();

        if (isset($customer->exists) && $customer->exists) {
            return ['error' => 'customer with the email --  ' . $this->data['email'] . ' -- already exists, please try again.'];
        } else if (empty($this->data['firstname'])) {
            return ['error' => 'Firstname is required.'];
        } else if (empty($this->data['surname'])) {
            return ['error' => 'Surname is required.'];
        } else if (empty($this->data['email'])) {
            return ['error' => 'Email is required.'];
        } else if (empty($this->data['house'])) {
            return ['error' => 'House is required.'];
        } else if (empty($this->data['address'])) {
            return ['error' => 'Address is required.'];
        } else if (empty($this->data['address2'])) {
            return ['error' => 'Address2 is required.'];
        } else if (empty($this->data['city'])) {
            return ['error' => 'City is required.'];
        } else if (empty($this->data['postcode'])) {
            return ['error' => 'Postcode is required.'];
        }

        $customer = Customer::create($this->data)->id;

        if ($customer) {
            return ['success' => 'New customer created.'];
        }

        return ['error' => 'Failed to created customer.'];
    }

    public function filter() 
    {
        if (!empty($this->data)) {
            if (!isset($this->data['order'])) {
                $this->data['order'] = 'ASC';
            }

            if ($this->data['type'] == 'date') {
                if ($this->data['when'] == 'today') {
                    $customers = Customer::whereRaw('date(created_at) = curdate()')
                                                ->orderBy('created_at', $this->data['order'])
                                                ->get();
                }
            }

            if (!$customers->isEmpty()) {
                return $customers;
            }

            return ['error' => 'No customers to view'];
        }
    }
}