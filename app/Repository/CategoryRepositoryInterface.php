<?php
namespace App\Repository;

use App\Models\Cate;
use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getAll();

    public function destroyMany(Category $category);
    public function search($request);
}