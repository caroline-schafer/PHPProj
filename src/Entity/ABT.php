<?php

namespace App\Entity;

use App\Repository\ABTRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ABTRepository::class)]
class ABT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'abTestsAsA')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AdVariant $variantA = null;

    #[ORM\ManyToOne(inversedBy: 'abTestsAsB')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AdVariant $variantB = null;

    #[ORM\Column(length: 255)]
    private ?string $testLabel = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    /**
     * @var Collection<int, Insight>
     */
    #[ORM\OneToMany(targetEntity: Insight::class, mappedBy: 'ab_test')]
    private Collection $insights;

    public function __construct()
    {
        $this->insights = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVariantA(): ?AdVariant
    {
        return $this->variantA;
    }

    public function setVariantA(?AdVariant $variantA): static
    {
        $this->variantA = $variantA;

        return $this;
    }

    public function getVariantB(): ?AdVariant
    {
        return $this->variantB;
    }

    public function setVariantB(?AdVariant $variantB): static
    {
        $this->variantB = $variantB;

        return $this;
    }

    public function getTestLabel(): ?string
    {
        return $this->testLabel;
    }

    public function setTestLabel(string $testLabel): static
    {
        $this->testLabel = $testLabel;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return Collection<int, Insight>
     */
    public function getInsights(): Collection
    {
        return $this->insights;
    }

    public function addInsight(Insight $insight): static
    {
        if (!$this->insights->contains($insight)) {
            $this->insights->add($insight);
            $insight->setAbTest($this);
        }

        return $this;
    }

    public function removeInsight(Insight $insight): static
    {
        if ($this->insights->removeElement($insight)) {
            // set the owning side to null (unless already changed)
            if ($insight->getAbTest() === $this) {
                $insight->setAbTest(null);
            }
        }

        return $this;
    }
}
