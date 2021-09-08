<?php

namespace App\Repositories;

use App\Models\Item;
use Response;

class ItemRepository implements ItemRepoInterface
{

    public function getAll()
    {
        return Item::paginate();
    }

    public function getById($id)
    {
        $item = Item::where('id', $id)->firstOrFail();

        return Response::json([
            'status' => "success",
            'data' => $item,
        ]);
    }

    public function create($request)
    {
        $itemData = $request->all();
        Item::create($itemData);

        return Response::json([
            'status' => "success",
            'code' => 201,
            'data' => $itemData,
        ]);
    }

    public function update($request)
    {
        $itemID = $request->id;
        $itemData = $this->formatItem($request);
        Item::where('id', $itemID)->update($itemData);

        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $itemData,
        ]);
    }

    public function delete($id)
    {
        $itemData = Item::find($id);
        $result = $itemData->delete();

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
        return Item::where('name', 'like', '%' . $name . '%')->get();
    }

    private function formatItem($request)
    {
        return [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'available' => $request->available,
        ];
    }
}
