<?php declare(strict_types = 1);

namespace App\Model\Building\Unit;

use App\Model\Building\Building;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidType;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
#[ORM\Table(name: 'building_unit')]
class BuildingUnit
{

	#[ORM\Id]
	#[ORM\Column(type: UuidType::NAME, length: 36, unique: true)]
	private UuidInterface $id;

	#[ORM\ManyToOne(targetEntity: Building::class, cascade: ['all'])]
	private Building $building;

	#[ORM\Column(length: 255)]
	private string $name;

	public function __construct(
		UuidInterface $id,
		Building $building,
		string $name,
		private int $numberOfPersons,
	)
	{
		$this->id = $id;
		$this->building = $building;
		$this->name = $name;
	}

	public function setId(UuidInterface $id): void
	{
		$this->id = $id;
	}

	public function getId(): UuidInterface
	{
		return $this->id;
	}

	public function setBuilding(Building $building): void
	{
		$this->building = $building;
	}

	public function getBuilding(): Building
	{
		return $this->building;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	public function setNumberOfPersons(int $numberOfPersons): void
	{
		$this->numberOfPersons = $numberOfPersons;
	}

	public function getNumberOfPersons(): int
	{
		return $this->numberOfPersons;
	}

}
