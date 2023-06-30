<?php
namespace App\Repository;

use App\Models\Cate;
use App\Models\event_detail;
use Illuminate\Support\Collection;

interface EventDetailRepositoryInterface
{
    public function getAll();

    public function destroyMany(event_detail $event);
    public function searchEvent($id_sukien);
}