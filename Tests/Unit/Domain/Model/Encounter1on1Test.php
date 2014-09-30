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
 * Test case for class \Dennis\Tournament\Domain\Model\Encounter1on1.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class Encounter1on1Test
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class Encounter1on1Test extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\Encounter1on1
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\Encounter1on1();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDurationReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDuration()
		);
	}

	/**
	 * @test
	 */
	public function setDurationForDateTimeSetsDuration() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDuration($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'duration',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeamHomePointsReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getTeamHomePoints()
		);
	}

	/**
	 * @test
	 */
	public function setTeamHomePointsForIntegerSetsTeamHomePoints() {
		$this->subject->setTeamHomePoints(12);

		$this->assertAttributeEquals(
			12,
			'teamHomePoints',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTeamGuestPointsReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getTeamGuestPoints()
		);
	}

	/**
	 * @test
	 */
	public function setTeamGuestPointsForIntegerSetsTeamGuestPoints() {
		$this->subject->setTeamGuestPoints(12);

		$this->assertAttributeEquals(
			12,
			'teamGuestPoints',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPlayerHomeReturnsInitialValueForPlayer1on1() {
		$this->assertEquals(
			NULL,
			$this->subject->getPlayerHome()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerHomeForPlayer1on1SetsPlayerHome() {
		$playerHomeFixture = new \Dennis\Tournament\Domain\Model\Player1on1();
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
	public function getPlayerGuestReturnsInitialValueForPlayer1on1() {
		$this->assertEquals(
			NULL,
			$this->subject->getPlayerGuest()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerGuestForPlayer1on1SetsPlayerGuest() {
		$playerGuestFixture = new \Dennis\Tournament\Domain\Model\Player1on1();
		$this->subject->setPlayerGuest($playerGuestFixture);

		$this->assertAttributeEquals(
			$playerGuestFixture,
			'playerGuest',
			$this->subject
		);
	}
}
