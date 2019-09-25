<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LogDataRepository")
 */
class LogData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $programTime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $actualTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $serverNum;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $eventType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProgramTime(): ?\DateTimeInterface
    {
        return $this->programTime;
    }

    public function setProgramTime(\DateTimeInterface $programTime): self
    {
        $this->programTime = $programTime;

        return $this;
    }

    public function getActualTime(): ?\DateTimeInterface
    {
        return $this->actualTime;
    }

    public function setActualTime(\DateTimeInterface $actualTime): self
    {
        $this->actualTime = $actualTime;

        return $this;
    }

    public function getServerNum(): ?int
    {
        return $this->serverNum;
    }

    public function setServerNum(int $serverNum): self
    {
        $this->serverNum = $serverNum;

        return $this;
    }

    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    public function setEventType(string $eventType): self
    {
        $this->eventType = $eventType;

        return $this;
    }
}
