<?php

namespace App\Entity;

use App\Repository\AjoutTransacRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AjoutTransacRepository::class)
 */
class AjoutTransac
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
    private $nomcrypto;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prixdachat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomcrypto(): ?string
    {
        return $this->nomcrypto;
    }

    public function setNomcrypto(string $nomcrypto): self
    {
        $this->nomcrypto = $nomcrypto;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrixdachat(): ?string
    {
        return $this->prixdachat;
    }

    public function setPrixdachat(string $prixdachat): self
    {
        $this->prixdachat = $prixdachat;

        return $this;
    }
}
