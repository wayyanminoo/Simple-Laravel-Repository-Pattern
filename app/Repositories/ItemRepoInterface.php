<?php

namespace App\Repositories;

interface ItemRepoInterface
{

    public function getAll();

    public function getById($id);

    public function create($request);

    public function update($request);

    public function delete($id);

    public function search($name);

}
