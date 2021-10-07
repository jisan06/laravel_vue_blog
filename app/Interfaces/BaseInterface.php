<?php


namespace App\Interfaces;


interface BaseInterface
{
    public function find($id);

    public function all();

    public function create(object $data);

    public function update($id, object $data);

    public function delete($id);
    
}
