<?php

namespace App\Entity;

use App\Repository\InsightRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InsightRepository::class)]
class Insight
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'insights')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ABT $ab_test = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $insightText = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAbTest(): ?ABT
    {
        return $this->ab_test;
    }

    public function setAbTest(?ABT $ab_test): static
    {
        $this->ab_test = $ab_test;

        return $this;
    }

    public function getInsightText(): ?string
    {
        return $this->insightText;
    }

    public function setInsightText(string $insightText): static
    {
        $this->insightText = $insightText;

        return $this;
    }
}
