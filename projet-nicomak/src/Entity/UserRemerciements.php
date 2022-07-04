<?php

namespace App\Entity;

use App\Repository\UserRemerciementsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRemerciementsRepository::class)
 */
class UserRemerciements
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
    private $membre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raison_remerciement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $membre_remercie;

    /**
     * @ORM\Column(type="date")
     */
    private $date_remerciement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMembre(): ?string
    {
        return $this->membre;
    }

    public function setMembre(string $membre): self
    {
        $this->membre = $membre;

        return $this;
    }

    public function getRaisonRemerciement(): ?string
    {
        return $this->raison_remerciement;
    }

    public function setRaisonRemerciement(string $raison_remerciement): self
    {
        $this->raison_remerciement = $raison_remerciement;

        return $this;
    }

    public function getMembreRemercie(): ?string
    {
        return $this->membre_remercie;
    }

    public function setMembreRemercie(string $membre_remercie): self
    {
        $this->membre_remercie = $membre_remercie;

        return $this;
    }

    public function getDateRemerciement(): ?\DateTimeInterface
    {
        return $this->date_remerciement;
    }

    public function setDateRemerciement(\DateTimeInterface $date_remerciement): self
    {
        $this->date_remerciement = $date_remerciement;

        return $this;
    }
}
