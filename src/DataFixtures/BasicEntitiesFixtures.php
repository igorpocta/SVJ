<?php declare(strict_types = 1);

namespace App\DataFixtures;

use App\Model\Building\Building;
use App\Model\Building\Unit\BuildingUnit;
use App\Model\Company\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;

class BasicEntitiesFixtures extends Fixture
{

	public function load(ObjectManager $manager): void
	{
		$buildings = new ArrayCollection();

		$company = new Company(
			Uuid::uuid4(),
			'Společenství vlastníků jednotek domu č.p. 1013,1014 ulice Mánesova, 363 01 Ostrov',
			'Mánesova 1013, 363 01 Ostrov',
			'71008845',
			null,
			21_613,
			$buildings,
		);

		$units_1013 = new ArrayCollection();
		$building_1013 = new Building(
			Uuid::uuid4(),
			$company,
			'1013',
			$units_1013,
		);

		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 01', 1));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 02', 3));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 03', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 04', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 05', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 06', 1));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 07', 1));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 08', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 09', 4));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 10', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 11', 3));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 12', 1));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 13', 1));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 14', 2));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 15', 5));
		$units_1013->add(new BuildingUnit(Uuid::uuid4(), $building_1013, 'Byt č. 16', 3));
		$manager->persist($building_1013);

		$units_1014 = new ArrayCollection();
		$building_1014 = new Building(
			Uuid::uuid4(),
			$company,
			'1014',
			$units_1014,
		);

		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 17', 2));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 18', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 19', 2));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 20', 3));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 21', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 22', 0));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 23', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 24', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 25', 5));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 26', 2));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 27', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 28', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 29', 2));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 30', 3));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 31', 1));
		$units_1014->add(new BuildingUnit(Uuid::uuid4(), $building_1014, 'Byt č. 32', 2));
		$manager->persist($building_1014);

		$manager->persist($company);
		$manager->flush();
	}

}
