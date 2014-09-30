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
 * Test case for class \Dennis\Tournament\Domain\Model\Tournament1on1.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class Tournament1on1Test
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class Tournament1on1Test extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\Tournament1on1
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\Tournament1on1();
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
	public function getPointsWinnerReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPointsWinner()
		);
	}

	/**
	 * @test
	 */
	public function setPointsWinnerForIntegerSetsPointsWinner() {
		$this->subject->setPointsWinner(12);

		$this->assertAttributeEquals(
			12,
			'pointsWinner',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPointsLoserReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPointsLoser()
		);
	}

	/**
	 * @test
	 */
	public function setPointsLoserForIntegerSetsPointsLoser() {
		$this->subject->setPointsLoser(12);

		$this->assertAttributeEquals(
			12,
			'pointsLoser',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPointsDrawReturnsInitialValueForInteger() {
		$this->assertSame(
			0,
			$this->subject->getPointsDraw()
		);
	}

	/**
	 * @test
	 */
	public function setPointsDrawForIntegerSetsPointsDraw() {
		$this->subject->setPointsDraw(12);

		$this->assertAttributeEquals(
			12,
			'pointsDraw',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEventsReturnsInitialValueForEvent1on1() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEvents()
		);
	}

	/**
	 * @test
	 */
	public function setEventsForObjectStorageContainingEvent1on1SetsEvents() {
		$event = new \Dennis\Tournament\Domain\Model\Event1on1();
		$objectStorageHoldingExactlyOneEvents = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEvents->attach($event);
		$this->subject->setEvents($objectStorageHoldingExactlyOneEvents);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEvents,
			'events',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEventToObjectStorageHoldingEvents() {
		$event = new \Dennis\Tournament\Domain\Model\Event1on1();
		$eventsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$eventsObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($event));
		$this->inject($this->subject, 'events', $eventsObjectStorageMock);

		$this->subject->addEvent($event);
	}

	/**
	 * @test
	 */
	public function removeEventFromObjectStorageHoldingEvents() {
		$event = new \Dennis\Tournament\Domain\Model\Event1on1();
		$eventsObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$eventsObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($event));
		$this->inject($this->subject, 'events', $eventsObjectStorageMock);

		$this->subject->removeEvent($event);

	}

	/**
	 * @test
	 */
	public function getPlayerReturnsInitialValueForPlayer1on1() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getPlayer()
		);
	}

	/**
	 * @test
	 */
	public function setPlayerForObjectStorageContainingPlayer1on1SetsPlayer() {
		$player = new \Dennis\Tournament\Domain\Model\Player1on1();
		$objectStorageHoldingExactlyOnePlayer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOnePlayer->attach($player);
		$this->subject->setPlayer($objectStorageHoldingExactlyOnePlayer);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOnePlayer,
			'player',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addPlayerToObjectStorageHoldingPlayer() {
		$player = new \Dennis\Tournament\Domain\Model\Player1on1();
		$playerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$playerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($player));
		$this->inject($this->subject, 'player', $playerObjectStorageMock);

		$this->subject->addPlayer($player);
	}

	/**
	 * @test
	 */
	public function removePlayerFromObjectStorageHoldingPlayer() {
		$player = new \Dennis\Tournament\Domain\Model\Player1on1();
		$playerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$playerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($player));
		$this->inject($this->subject, 'player', $playerObjectStorageMock);

		$this->subject->removePlayer($player);

	}
}
