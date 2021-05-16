<?php
namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseRepository implements BaseRepositoryInterface
{
    const GUARDED = ['id', 'slug'];
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(int $id): ?Model
    {
        return $this->model->find($id);
    }

    public function findBySlug(string $slug): Model
    {
        $model = $this->model->where('slug', $slug)->first();
        if (!$model) {
            throw new ModelNotFoundException("The requested resourse was not found");
        }

        return $model;
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }

    public function all(): Collection
    {
        return $this->model->get();
    }
}
