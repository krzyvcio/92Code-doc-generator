<?php


namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Models\Document;

class DocumentRepository extends BaseRepository
{
    /**
     * DocumentRepository constructor.
     *
     * @param Document $model
     */
    public function __construct(Document $model)
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
        return $this->model->findOrFail($id);
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
}
