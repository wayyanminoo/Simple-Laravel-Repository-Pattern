<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Repositories\BookRepoInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private $bookRepository;

    //constructor of BookController
    public function __construct(BookRepoInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    //CRUD methods.
    public function index()
    {
        return $this->bookRepository->getAll();
    }

    public function getById($id)
    {
        return $this->bookRepository->getById($id);
    }

    public function saveBook(Request $request)
    {
        return $this->bookRepository->create($request);
    }

    public function updateBook(Request $request)
    {
        return $this->bookRepository->update($request);
    }

    public function searchBook($name)
    {
        return $this->bookRepository->search($name);
    }

    public function deleteBook($id)
    {
        return $this->bookRepository->delete($id);
    }
}
