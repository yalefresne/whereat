<?php

declare(strict_types=1);

namespace Whereat\Domain\Model;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;
use Whereat\Domain\Migrations\TablesNameCatalog;
use Whereat\Domain\Validator\PhoneNumber;

#[ORM\Entity(repositoryClass: TablesNameCatalog::RESTAURANTS)]
#[ORM\Table(name: "restaurants")]
class Restaurant
{
    #[ORM\Id, ORM\Column(type: 'string')]
    #[Assert\Uuid]
    private Uuid $id;

    #[ORM\Column(type: 'string', length: 150)]
    #[Assert\NotBlank]
    private string $name;

    #[ORM\Column(type: 'string', length: 150, unique: true)]
    #[Assert\NotBlank]
    #[Assert\Unique]
    private string $alias;

    #[ORM\Column(type: 'string', length: 150, nullable: true)]
    #[Assert\Url]
    private ?string $url;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    #[PhoneNumber]
    private ?string $phoneNumber;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $createdAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private DateTimeImmutable $updatedAt;

    #[ORM\Column(type: 'datetime_immutable', nullable: true)]
    private ?DateTimeImmutable $deletedAt;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }

    public function setAlias($alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAt(): self
    {
        $this->createdAt = new DateTimeImmutable();

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PreUpdate]
    #[ORM\PrePersist]
    public function setUpdatedAt(): self
    {
        $this->updatedAt = new DateTimeImmutable();

        return $this;
    }

    public function getDeletedAt(): ?DateTimeImmutable
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(?DateTimeImmutable $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }
}
