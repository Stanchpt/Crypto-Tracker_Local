<?php

namespace App\Entity;

use App\Repository\InvestissementJourRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvestissementJourRepository::class)
 */
class InvestissementJour
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $montant_invest;

    /**
     * @ORM\Column( type="string", length=255)
     */
    private $date_invest;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantInvest(): ?string
    {
        return $this->montant_invest;
    }

    public function setMontantInvest(string $montant_invest): self
    {
        $this->montant_invest = $montant_invest;

        return $this;
    }

    public function getDateInvest(): string
    {
        return $this->date_invest;
    }

    public function setDateInvest(string $date_invest): self
    {
        $this->date_invest = $date_invest;

        return $this;
    }
}
