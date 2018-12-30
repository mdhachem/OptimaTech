<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2 , max=100)
     */
    private $fullName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(
     *  pattern="/[0-9]/"
     * )
     */
    private $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=2 , max=100)
     */
    private $company;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2 , max=200)
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10)
     */
    private $message;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    public function getId() : ? int
    {
        return $this->id;
    }

    public function getFullName() : ? string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName) : self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getEmail() : ? string
    {
        return $this->email;
    }

    public function setEmail(string $email) : self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber() : ? string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(? string $phoneNumber) : self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getCompany() : ? string
    {
        return $this->company;
    }

    public function setCompany(? string $company) : self
    {
        $this->company = $company;

        return $this;
    }

    public function getSubject() : ? string
    {
        return $this->subject;
    }

    public function setSubject(string $subject) : self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMessage() : ? string
    {
        return $this->message;
    }

    public function setMessage(string $message) : self
    {
        $this->message = $message;

        return $this;
    }

    public function getCreatedAt() : ? \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt) : self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
