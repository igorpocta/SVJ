<?php declare(strict_types = 1);

namespace App\Model\Building;

use App\Model\Building\Unit\BuildingUnit;
use App\Model\Company\Company;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidType;
use Ramsey\Uuid\UuidInterface;

#[ORM\Entity]
#[ORM\Table(name: 'building')]
class Building
{

	#[ORM\Id]
	#[ORM\Column(type: UuidType::NAME, length: 36, unique: true)]
	private UuidInterface $id;

	#[ORM\ManyToOne(targetEntity: Company::class, cascade: ['all'])]
	private Company $company;

	#[ORM\Column(length: 255)]
	private string $name;

	/** @var Collection<BuildingUnit> */
	#[ORM\OneToMany(mappedBy: 'message', targetEntity: BuildingUnit::class, cascade: ['all'], orphanRemoval: true)]
	private Collection $units;

	/**
	 * @param Collection<BuildingUnit> $units
	 */
	public function __construct(
		UuidInterface $id,
		Company $company,
		string $name,
		ArrayCollection $units,
	)
	{
		$this->id = $id;
		$this->company = $company;
		$this->name = $name;
		$this->units = $units;
	}

	public function setId(UuidInterface $id): void
	{
		$this->id = $id;
	}

	public function getId(): UuidInterface
	{
		return $this->id;
	}

	public function getCompany(): Company
	{
		return $this->company;
	}

	public function setCompany(Company $company): void
	{
		$this->company = $company;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return Collection<BuildingUnit>
	 */
	public function getUnits(): Collection
	{
		return $this->units;
	}

}
