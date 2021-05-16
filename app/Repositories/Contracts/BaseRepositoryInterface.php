<?php
namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function find(int $id) : ?Model;
    public function findBySlug(string $slug) : Model;
    public function delete(int $id) : void;
    public function all() : Collection;
}
