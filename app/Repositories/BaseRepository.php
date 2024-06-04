<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
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
     * Create a new record in the database
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Update record in the database
     *
     * @param array $data
     * @param int $id
     * @return Model
     */
    public function update(array $data, $id)
    {
        $record = $this->model->find($id);
        $record->update($data);
        return $record;
    }

    /**
     * Remove record from the database
     *
     * @param int $id
     * @return bool|null
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Show the record with the given id
     *
     * @param int $id
     * @return Model
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function updateOrCreate(array $data, $id)
    {
        return $this->model->updateOrCreate($data, $id);
    }

    public function findOrFail($id)
    {
        return $this->model->findOrFail($id);
    }
}
