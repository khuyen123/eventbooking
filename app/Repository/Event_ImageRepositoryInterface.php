<?php
namespace App\Repository;


use App\Models\event_image;
use Illuminate\Support\Collection;

interface Event_ImageRepositoryInterface
{
    public function getAll();

    public function destroyMany(event_image $event);

}