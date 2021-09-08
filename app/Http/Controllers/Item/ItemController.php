<?php

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Repositories\ItemRepoInterface;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    private $itemRepository;

    //constructor of ItemController
    public function __construct(ItemRepoInterface $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    //CRUD methods
    public function index()
    {
        return $this->itemRepository->getAll();
    }

    public function getById($id)
    {
        return $this->itemRepository->getById($id);
    }

    public function saveItem(Request $request)
    {
        return $this->itemRepository->create($request);
    }

    public function updateItem(Request $request)
    {
        return $this->itemRepository->update($request);
    }

    public function deleteItem($id)
    {
        return $this->itemRepository->delete($id);
    }

    public function searchItem($name)
    {
        return $this->itemRepository->search($name);
    }
}
