<?php

namespace App\Entity;

use App\Repository\MessagingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MessagingRepository::class)
 */
class Messaging
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $me_auteur;

    /**
     * @ORM\Column(type="datetime")
     */
    private $me_date;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $me_text;

    /**
     * @ORM\Column(type="binary")
     */
    private $read_me;

    /**
     * @ORM\ManyToMany(targetEntity=Users::class, mappedBy="messaging")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMeAuteur(): ?string
    {
        return $this->me_auteur;
    }

    public function setMeAuteur(string $me_auteur): self
    {
        $this->me_auteur = $me_auteur;

        return $this;
    }

    public function getMeDate(): ?\DateTimeInterface
    {
        return $this->me_date;
    }

    public function setMeDate(\DateTimeInterface $me_date): self
    {
        $this->me_date = $me_date;

        return $this;
    }

    public function getMeText(): ?string
    {
        return $this->me_text;
    }

    public function setMeText(string $me_text): self
    {
        $this->me_text = $me_text;

        return $this;
    }

    public function getReadMe()
    {
        return $this->read_me;
    }

    public function setReadMe($read_me): self
    {
        $this->read_me = $read_me;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addMessaging($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            $user->removeMessaging($this);
        }

        return $this;
    }
}
