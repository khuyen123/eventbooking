<?php
namespace App\Repository;

use App\Models\Cate;
use App\Models\event;
use Illuminate\Support\Collection;

interface EventRepositoryInterface
{
    public function getAll();

    public function destroyMany(Event $event);
    public function search($request);
}