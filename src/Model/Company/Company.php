<?php declare(strict_types = 1);

namespace App\Model\Company;

use App\Model\Building\Building;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidType;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
#[ORM\Table(name: 'company')]
class Company
{

	#[ORM\Id]
	#[ORM\Column(type: UuidType::NAME, length: 36, unique: true)]
	private UuidInterface $id;

	#[ORM\Column(length: 255)]
	private string $name;

	#[ORM\Column(length: 255)]
	private string $address;

	#[ORM\Column(length: 8)]
	private string $identificationNumber;

	#[ORM\Column(length: 12, nullable: true)]
	private string|null $taxIdentificationNumber;

	/** @var Collection<Building> */
	#[ORM\OneToMany(mappedBy: 'company', targetEntity: Building::class, cascade: ['all'], orphanRemoval: true)]
	private Collection $buildings;

	/**
	 * @param Collection<Building> $buildings
	 */
	public function __construct(
		UuidInterface $id,
		string $name,
		string $address,
		string $identificationNumber,
		string|null $taxIdentificationNumber,
		private int $totalNumberOfVotingRights,
		ArrayCollection $buildings,
	)
	{
		$this->id = $id;
		$this->name = $name;
		$this->address = $address;
		$this->identificationNumber = $identificationNumber;
		$this->taxIdentificationNumber = $taxIdentificationNumber;
		$this->buildings = $buildings;
	}

	public function setId(UuidInterface $id): void
	{
		$this->id = $id;
	}

	public function getId(): UuidInterface
	{
		return $this->id;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setAddress(string $address): void
	{
		$this->address = $address;
	}

	public function getAddress(): string
	{
		return $this->address;
	}

	public function setIdentificationNumber(string $identificationNumber): void
	{
		$this->identificationNumber = $identificationNumber;
	}

	public function getIdentificationNumber(): string
	{
		return $this->identificationNumber;
	}

	public function setTaxIdentificationNumber(string|null $taxIdentificationNumber): void
	{
		$this->taxIdentificationNumber = $taxIdentificationNumber;
	}

	public function getTaxIdentificationNumber(): string|null
	{
		return $this->taxIdentificationNumber;
	}

	public function setTotalNumberOfVotingRights(int $totalNumberOfVotingRights): void
	{
		$this->totalNumberOfVotingRights = $totalNumberOfVotingRights;
	}

	public function getTotalNumberOfVotingRights(): int
	{
		return $this->totalNumberOfVotingRights;
	}

	/**
	 * @return Collection<Building>
	 */
	public function getBuildings(): ArrayCollection
	{
		return $this->buildings;
	}

}
