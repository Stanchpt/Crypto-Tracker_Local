<?php

namespace App\Entity;

use App\Repository\DeleteTransacRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeleteTransacRepository::class)
 */
class DeleteTransac
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_crypto;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite_trans;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prix_transac;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCrypto(): ?string
    {
        return $this->nom_crypto;
    }

    public function setNomCrypto(string $nom_crypto): self
    {
        $this->nom_crypto = $nom_crypto;

        return $this;
    }

    public function getQuantiteTrans(): ?int
    {
        return $this->quantite_trans;
    }

    public function setQuantiteTrans(int $quantite_trans): self
    {
        $this->quantite_trans = $quantite_trans;

        return $this;
    }

    public function getPrixTransac(): ?string
    {
        return $this->prix_transac;
    }

    public function setPrixTransac(string $prix_transac): self
    {
        $this->prix_transac = $prix_transac;

        return $this;
    }
}
