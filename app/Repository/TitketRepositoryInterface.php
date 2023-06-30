<?php
namespace App\Repository;

use App\Models\titket;
use Illuminate\Support\Collection;

interface TitketRepositoryInterface
{
    public function getAll();
    public function destroyMany(titket $event);
    public function search($request);
}