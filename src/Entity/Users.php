<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
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
    private $email;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $password;

    /**
     * @ORM\Column(type="date")
     */
    private $date_birthday;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_at;

    /**
     * @ORM\Column(type="binary")
     */
    private $covid_more;

    /**
     * @ORM\Column(type="binary")
     */
    private $cas_contact;

    /**
     * @ORM\OneToOne(targetEntity=geolocalisation::class, cascade={"persist", "remove"})
     */
    private $geolocalisation_user;

    /**
     * @ORM\ManyToMany(targetEntity=messaging::class, inversedBy="users")
     */
    private $messaging;

    public function __construct()
    {
        $this->messaging = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getDateBirthday(): ?\DateTimeInterface
    {
        return $this->date_birthday;
    }

    public function setDateBirthday(\DateTimeInterface $date_birthday): self
    {
        $this->date_birthday = $date_birthday;

        return $this;
    }

    public function getDateAt(): ?\DateTimeInterface
    {
        return $this->date_at;
    }

    public function setDateAt(\DateTimeInterface $date_at): self
    {
        $this->date_at = $date_at;

        return $this;
    }

    public function getCovidMore()
    {
        return $this->covid_more;
    }

    public function setCovidMore($covid_more): self
    {
        $this->covid_more = $covid_more;

        return $this;
    }

    public function getCasContact()
    {
        return $this->cas_contact;
    }

    public function setCasContact($cas_contact): self
    {
        $this->cas_contact = $cas_contact;

        return $this;
    }

    public function getGeolocalisationUser(): ?geolocalisation
    {
        return $this->geolocalisation_user;
    }

    public function setGeolocalisationUser(?geolocalisation $geolocalisation_user): self
    {
        $this->geolocalisation_user = $geolocalisation_user;

        return $this;
    }

    /**
     * @return Collection|messaging[]
     */
    public function getMessaging(): Collection
    {
        return $this->messaging;
    }

    public function addMessaging(messaging $messaging): self
    {
        if (!$this->messaging->contains($messaging)) {
            $this->messaging[] = $messaging;
        }

        return $this;
    }

    public function removeMessaging(messaging $messaging): self
    {
        if ($this->messaging->contains($messaging)) {
            $this->messaging->removeElement($messaging);
        }

        return $this;
    }
}
