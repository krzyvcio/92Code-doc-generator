<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;

use App\Models\User;

class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * Get all instances of model
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Show the record with the given id
     *
     * @param int $id
     * @return Model|null
     */
    public function show($id)
    {
        return $this->model->findById($id);
    }

    /**
     * Update the record with the given id
     *
     * @param array $attributes
     * @param int $id
     * @return Model
     */
    public function update(array $attributes, $id)
    {
        $record = $this->show($id);
        $record->update($attributes);
        return $record;
    }
}
