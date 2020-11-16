<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Restaurant;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;

final class RestaurantRepository implements RestaurantRepositoryInterface
{
    private EntityManagerInterface $entityManager;
    private ObjectRepository $repository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(Restaurant::class);
    }

    public function save(Restaurant $restaurant): void
    {
        $this->entityManager->persist($restaurant);
        $this->entityManager->flush();
    }

    public function remove(Restaurant $restaurant): void
    {
        $this->entityManager->remove($restaurant);
        $this->entityManager->flush();
    }

    public function findById(string $id): ?Restaurant
    {
        return $this->repository->find($id);
    }

    public function findBy(array $criteria, ?array $orderBy = null, ?int $limit = null): array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit);
    }
}
