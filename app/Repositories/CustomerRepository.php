<?php

namespace App\Repositories;

use App\Models\Customer;
use Response;

class CustomerRepository implements CustomerRepoInterface
{
    public function getAll()
    {
        return Customer::paginate(10);
    }

    public function getById($id)
    {
        return Customer::where('id', $id)->get();
    }

    public function create($request)
    {
        $customerData = $request->all();
        Customer::create($customerData);

        return Response::json([
            'status' => "success",
            'code' => 201,
            'data' => $customerData,
        ]);
    }

    public function update($request)
    {
        $customerID = $request->id;
        $customerData = $this->formatCustomer($request);
        Customer::where('id', $customerID)->update($customerData);

        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $customerData,
        ]);
    }

    public function delete($id)
    {
        $customerData = Customer::find($id);
        $result = $customerData->delete();

        if ($result) {
            return Response::json([
                'status_code' => 200,
                'result' => "successfully deleted.",
            ]);

        } else {
            return [
                'result' => "failed.",
            ];
        }
    }

    public function search($name)
    {
        return Customer::where('name', 'like', '%' . $name . '%')->get();
    }

    private function formatCustomer($request)
    {
        return [
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'dob' => $request->dob,
        ];
    }
}
