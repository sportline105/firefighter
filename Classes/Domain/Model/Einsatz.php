<?php
namespace Vendor\Firefighter\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\Generic\LazyLoadingProxy;
use Vendor\Firefighter\Domain\Model\Car;
use Vendor\Firefighter\Domain\Model\Type;

class Einsatz extends AbstractEntity
{
    protected string $title = '';
    protected string $location = '';
    protected string $description = '';
    protected string $shortDescription = '';
    protected ?\DateTime $datefrom = null;
    protected ?\DateTime $dateto = null;
    protected string $geoCoords = '';
    protected string $number = '';
    protected int $mens = 0;

    /**
     * Fahrzeuge (MM-Beziehung)
     * @var ObjectStorage<Car>
     */
    protected ObjectStorage $cars;

    /**
     * Einsatztyp (Single Relation)
     * @var Type|null
     */
    protected $type = null;

    /**
     * Bilder (FAL, Mehrfach)
     *
     * @var ObjectStorage<FileReference>
     * @\TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $images;

    public function __construct()
    {
        $this->cars = new ObjectStorage();
        $this->images = new ObjectStorage();
    }

    // === Getter/Setter: Basisfelder ===
    public function getTitle(): string { return $this->title; }
    public function setTitle(string $title): void { $this->title = $title; }

    public function getLocation(): string { return $this->location; }
    public function setLocation(string $location): void { $this->location = $location; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): void { $this->description = $description; }

    public function getShortDescription(): string { return $this->shortDescription; }
    public function setShortDescription(string $shortDescription): void { $this->shortDescription = $shortDescription; }

    public function getDatefrom(): ?\DateTime { return $this->datefrom; }
    public function setDatefrom(?\DateTime $datefrom): void { $this->datefrom = $datefrom; }

    public function getDateto(): ?\DateTime { return $this->dateto; }
    public function setDateto(?\DateTime $dateto): void { $this->dateto = $dateto; }

    public function getGeoCoords(): string { return $this->geoCoords; }
    public function setGeoCoords(string $geoCoords): void { $this->geoCoords = $geoCoords; }

    public function getNumber(): string { return $this->number; }
    public function setNumber(string $number): void { $this->number = $number; }

    public function getMens(): int { return $this->mens; }
    public function setMens(int $mens): void { $this->mens = $mens; }

    // === Cars (MM Relation) ===
    public function getCars(): ObjectStorage { return $this->cars; }
    public function setCars(ObjectStorage $cars): void { $this->cars = $cars; }
    public function addCar(Car $car): void { $this->cars->attach($car); }
    public function removeCar(Car $car): void { $this->cars->detach($car); }

    // === Type (Single Relation) ===
    public function getType(): ?Type
    {
        if ($this->type instanceof LazyLoadingProxy) {
            $resolved = $this->type->_loadRealInstance();
            $this->type = $resolved instanceof Type ? $resolved : null;
        }
        return $this->type;
    }
    public function setType(?Type $type): void { $this->type = $type; }

    // === Images (FAL, Mehrfach) ===
    public function getImages()
    {
        return $this->images;
    }
    public function setImages($images): void
    {
        $this->images = $images;
    }
}