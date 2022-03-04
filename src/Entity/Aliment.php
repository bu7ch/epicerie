<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlimentRepository;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: AlimentRepository::class)]
#[Vich\Uploadable]
class Aliment
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column(type: 'integer')]
  private $id;

  #[ORM\Column(type: 'string', length: 255)]
  private $name;

  #[ORM\Column(type: 'float')]
  private $price;

  #[ORM\Column(type: 'string', length: 255)]
  private $image;

  #[Vich\UploadableField(mapping: 'aliment_image', fileNameProperty: 'image')]
  private ?File $imageFile = null;

  public function getImageFile(): ?File
  {
    return $this->imageFile;
  }

  public function setImageFile(?File $imageFile = null): self
  {
    $this->image = $imageFile;
    // if($this->imageFile instanceof UploadedFile){
    //   $this-> updated_at = new \DateTime('now');
    // }
    return $this;
  }





  #[ORM\Column(type: 'integer')]
  private $calorie;

  #[ORM\Column(type: 'integer')]
  private $proteine;

  #[ORM\Column(type: 'integer')]
  private $glucide;

  #[ORM\Column(type: 'integer')]
  private $lipide;




  public function getId(): ?int
  {
    return $this->id;
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

  public function getPrice(): ?float
  {
    return $this->price;
  }

  public function setPrice(float $price): self
  {
    $this->price = $price;

    return $this;
  }

  public function getImage(): ?string
  {
    return $this->image;
  }

  public function setImage(?string $image): self
  {
    $this->image = $image;

    return $this;
  }

  public function getCalorie(): ?int
  {
    return $this->calorie;
  }

  public function setCalorie(int $calorie): self
  {
    $this->calorie = $calorie;

    return $this;
  }

  public function getProteine(): ?int
  {
    return $this->proteine;
  }

  public function setProteine(int $proteine): self
  {
    $this->proteine = $proteine;

    return $this;
  }

  public function getGlucide(): ?int
  {
    return $this->glucide;
  }

  public function setGlucide(int $glucide): self
  {
    $this->glucide = $glucide;

    return $this;
  }

  public function getLipide(): ?int
  {
    return $this->lipide;
  }

  public function setLipide(int $lipide): self
  {
    $this->lipide = $lipide;

    return $this;
  }
}
