<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Repositories\CustomerRepoInterface;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerRepository;

    //constructor of CustomerController
    public function __construct(CustomerRepoInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    //CRUD methods.
    public function index()
    {
        return $this->customerRepository->getAll();
    }

    public function getById($id)
    {
        return $this->customerRepository->getById($id);
    }

    public function saveCustomer(Request $request)
    {
        return $this->customerRepository->create($request);
    }

    public function updateCustomer(Request $request)
    {
        return $this->customerRepository->update($request);
    }

    public function deleteCustomer($id)
    {
        return $this->customerRepository->delete($id);
    }

    public function searchCustomer($name)
    {
        return $this->customerRepository->search($name);
    }
}
