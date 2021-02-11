<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Restaurant;

interface RestaurantRepositoryInterface
{
    public function save(Restaurant $restaurant): void;

    public function remove(Restaurant $restaurant): void;

    public function findById(string $id): ?Restaurant;

    public function findBy(array $criteria, ?array $orderBy = null, ?int $limit = null): array;
}
