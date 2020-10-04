<?php

declare(strict_types=1);

namespace App\Domain\Model;

use App\Domain\Migrations\TablesNameCatalog;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="TablesNameCatalog::RESTAURANTS")
 */
class Restaurant
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string", unique=true)
     * @Assert\Uuid
     *
     * @var string
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=150, unique=true)
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $alias;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Url
     *
     * @var string
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     * @PhoneNumber()
     *
     * @var string
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="datetime_immutable")
     * @Assert\NotNull()
     *
     * @var DateTimeImmutable
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotNull()
     *
     * @var DateTime
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *
     * @var DateTime
     */
    private $deleted_at;

    public function __construct()
    {
        $this->id = Uuid::v4();
        $this->setCreatedAt();
        $this->setUpdatedAt();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name): self
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

    public function setUrl($url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->created_at;
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAt(): self
    {
        $this->created_at = new DateTimeImmutable();

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updated_at;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setUpdatedAt(): self
    {
        $this->updated_at = new DateTimeImmutable();

        return $this;
    }

    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(?\DateTimeImmutable $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }
}
