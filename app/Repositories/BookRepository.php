<?php

namespace App\Repositories;

use App\Models\Book;
use Response;

class BookRepository implements BookRepoInterface
{

    public function getAll()
    {
        return Book::all();
    }

    public function getById($id)
    {
        $book = Book::where('id', $id)->get();

        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $book,
        ]);
    }

    public function create($request)
    {
        $bookData = $request->all();
        Book::create($bookData);

        return Response::json([
            'status' => "success",
            'code' => 201,
            'data' => $bookData,
        ]);
    }

    public function update($request)
    {
        $bookID = $request->id;
        $bookData = $this->formatBook($request);
        Book::where('id', $bookID)->update($bookData);

        return Response::json([
            'status' => "success",
            'code' => 200,
            'data' => $bookData,
        ]);
    }

    public function delete($id)
    {
        $bookData = Book::find($id);
        $result = $bookData->delete();

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
        return Book::orWhere('name', 'like', '%' . $name . '%')
            ->orWhere('author_name', 'like', '%' . $name . '%')
            ->get();
    }

    private function formatBook($request)
    {
        return [
            'name' => $request->name,
            'author_name' => $request->author_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
    }
}
