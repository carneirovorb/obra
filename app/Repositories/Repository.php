<?php

namespace App\Repositories;

/**
 * Repository pattern interface  
 *
 * Business logic.
 *
 * @package    amado-eng
 * @subpackage App\Repositories
 * @author     Lucas Souza <lucas252souza@gmail.com>
 * @author     Luiz Toni <luiztoni@outlook.com>
 * @author     Valber Carneiro <valbercarneiro@outlook.com>
 * @copyright  Copyright (c) 2017, EngenheJr
 */
interface Repository
{
    public function create(array $data);

    public function read(int $id);

    public function update(int $id, array $data);

    public function delete(int $id);

    public function all();
}
