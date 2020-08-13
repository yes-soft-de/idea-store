<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
<<<<<<< HEAD
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
=======

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
<<<<<<< HEAD
     * @Groups("api")
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
<<<<<<< HEAD
     * @Groups("api")
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     */
    private $email;

    /**
     * @ORM\Column(type="json")
<<<<<<< HEAD
     * @Groups("api")
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
<<<<<<< HEAD
     * @Groups("api")
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     */
    private $userName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
<<<<<<< HEAD
     * @Groups("api")
=======
>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
     */
    private $phone;

    /**
<<<<<<< HEAD
     * @ORM\Column(type="date", nullable=true)
     * @Groups("api")
     */
    private $createdTime;

    /*public function __construct()
    {
        $this->createdTime = new \DateTime();
    }*/
    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->createdTime = new \DateTime('now');
    }

=======
     * @ORM\Column(type="date")
     */
    private $createdTime;

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getCreatedTime(): ?\DateTimeInterface
    {
        return $this->createdTime;
    }

    public function setCreatedTime(\DateTimeInterface $createdTime): self
    {
<<<<<<< HEAD
        $this->createdTime = new \DateTime('now');
=======
        $this->createdTime = $createdTime;

>>>>>>> f055343e76a9fc4dd5ec6b0304d34424e8f48e44
        return $this;
    }
}
