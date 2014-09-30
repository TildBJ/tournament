<?php

namespace Dennis\Tournament\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Dennis\Tournament\Domain\Model\PlayerAllVsAll.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class PlayerAllVsAllTest
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class PlayerAllVsAllTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\PlayerAllVsAll
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\PlayerAllVsAll();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCountryReturnsInitialValueForCountryAllVsAll() {
		$this->assertEquals(
			NULL,
			$this->subject->getCountry()
		);
	}

	/**
	 * @test
	 */
	public function setCountryForCountryAllVsAllSetsCountry() {
		$countryFixture = new \Dennis\Tournament\Domain\Model\CountryAllVsAll();
		$this->subject->setCountry($countryFixture);

		$this->assertAttributeEquals(
			$countryFixture,
			'country',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeamsReturnsInitialValueForTeamAllVsAll() {
		$this->assertEquals(
			NULL,
			$this->subject->getTeams()
		);
	}

	/**
	 * @test
	 */
	public function setTeamsForTeamAllVsAllSetsTeams() {
		$teamsFixture = new \Dennis\Tournament\Domain\Model\TeamAllVsAll();
		$this->subject->setTeams($teamsFixture);

		$this->assertAttributeEquals(
			$teamsFixture,
			'teams',
			$this->subject
		);
	}
}
