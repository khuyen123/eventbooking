<?php
namespace App\Repository;

use App\Models\banner;
use Illuminate\Support\Collection;

interface BannerRepositoryInterface
{
    public function getAll();
    public function destroyMany($request);

}