<?php

namespace App\Entity;

use App\Repository\AdVariantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdVariantRepository::class)]
class AdVariant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ad_copy = null;

    #[ORM\Column(length: 255)]
    private ?string $platform = null;

    #[ORM\Column]
    private ?int $impressions = null;

    #[ORM\Column]
    private ?int $clicks = null;

    #[ORM\Column]
    private ?int $roas = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_end = null;

    /**
     * @var Collection<int, ABT>
     */
    #[ORM\OneToMany(targetEntity: ABT::class, mappedBy: 'variantA')]
    private Collection $abTestsAsA;

    /**
     * @var Collection<int, ABT>
     */
    #[ORM\OneToMany(targetEntity: ABT::class, mappedBy: 'variantB')]
    private Collection $abTestsAsB;

    public function __construct()
    {
        $this->abTestsAsA = new ArrayCollection();
        $this->abTestsAsB = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getAdCopy(): ?string
    {
        return $this->ad_copy;
    }

    public function setAdCopy(string $ad_copy): static
    {
        $this->ad_copy = $ad_copy;

        return $this;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function setPlatform(string $platform): static
    {
        $this->platform = $platform;

        return $this;
    }

    public function getImpressions(): ?int
    {
        return $this->impressions;
    }

    public function setImpressions(int $impressions): static
    {
        $this->impressions = $impressions;

        return $this;
    }

    public function getClicks(): ?int
    {
        return $this->clicks;
    }

    public function setClicks(int $clicks): static
    {
        $this->clicks = $clicks;

        return $this;
    }

    public function getRoas(): ?int
    {
        return $this->roas;
    }

    public function setRoas(int $roas): static
    {
        $this->roas = $roas;

        return $this;
    }

    public function getDateStart(): ?\DateTime
    {
        return $this->date_start;
    }

    public function setDateStart(\DateTime $date_start): static
    {
        $this->date_start = $date_start;

        return $this;
    }

    public function getDateEnd(): ?\DateTime
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTime $date_end): static
    {
        $this->date_end = $date_end;

        return $this;
    }

    /**
     * @return Collection<int, ABT>
     */
    public function getAbTestsAsA(): Collection
    {
        return $this->abTestsAsA;
    }

    public function addAbTestsAsA(ABT $abTestsAsA): static
    {
        if (!$this->abTestsAsA->contains($abTestsAsA)) {
            $this->abTestsAsA->add($abTestsAsA);
            $abTestsAsA->setVariantA($this);
        }

        return $this;
    }

    public function removeAbTestsAsA(ABT $abTestsAsA): static
    {
        if ($this->abTestsAsA->removeElement($abTestsAsA)) {
            // set the owning side to null (unless already changed)
            if ($abTestsAsA->getVariantA() === $this) {
                $abTestsAsA->setVariantA(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ABT>
     */
    public function getAbTestsAsB(): Collection
    {
        return $this->abTestsAsB;
    }

    public function addAbTestsAsB(ABT $abTestsAsB): static
    {
        if (!$this->abTestsAsB->contains($abTestsAsB)) {
            $this->abTestsAsB->add($abTestsAsB);
            $abTestsAsB->setVariantB($this);
        }

        return $this;
    }

    public function removeAbTestsAsB(ABT $abTestsAsB): static
    {
        if ($this->abTestsAsB->removeElement($abTestsAsB)) {
            // set the owning side to null (unless already changed)
            if ($abTestsAsB->getVariantB() === $this) {
                $abTestsAsB->setVariantB(null);
            }
        }

        return $this;
    }
}
