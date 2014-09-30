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
 * Test case for class \Dennis\Tournament\Domain\Model\EncounterKo.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class EncounterKoTest
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class EncounterKoTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\EncounterKo
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\EncounterKo();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getPointsPlayerHomeReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPointsPlayerHome()
		);
	}

	/**
	 * @test
	 */
	public function setPointsPlayerHomeForIntegerSetsPointsPlayerHome() {
		$this->subject->setPointsPlayerHome(12);

		$this->assertAttributeEquals(
			12,
			'pointsPlayerHome',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPointsPlayerGuestReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPointsPlayerGuest()
		);
	}

	/**
	 * @test
	 */
	public function setPointsPlayerGuestForIntegerSetsPointsPlayerGuest() {
		$this->subject->setPointsPlayerGuest(12);

		$this->assertAttributeEquals(
			12,
			'pointsPlayerGuest',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPlayerHomeReturnsInitialValueForPlayerKo() {
		$this->assertEquals(
			NULL,
			$this->subject->getPlayerHome()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerHomeForPlayerKoSetsPlayerHome() {
		$playerHomeFixture = new \Dennis\Tournament\Domain\Model\PlayerKo();
		$this->subject->setPlayerHome($playerHomeFixture);

		$this->assertAttributeEquals(
			$playerHomeFixture,
			'playerHome',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPlayerGuestReturnsInitialValueForPlayerKo() {
		$this->assertEquals(
			NULL,
			$this->subject->getPlayerGuest()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerGuestForPlayerKoSetsPlayerGuest() {
		$playerGuestFixture = new \Dennis\Tournament\Domain\Model\PlayerKo();
		$this->subject->setPlayerGuest($playerGuestFixture);

		$this->assertAttributeEquals(
			$playerGuestFixture,
			'playerGuest',
			$this->subject
		);
	}
}
