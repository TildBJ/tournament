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
 * Test case for class \Dennis\Tournament\Domain\Model\TournamentAllVsAll.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class TournamentAllVsAllTest
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class TournamentAllVsAllTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\TournamentAllVsAll
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\TournamentAllVsAll();
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
	public function getEventReturnsInitialValueForEventAllVsAll() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEvent()
		);
	}

	/**
	 * @test
	 */
	public function setEventForObjectStorageContainingEventAllVsAllSetsEvent() {
		$event = new \Dennis\Tournament\Domain\Model\EventAllVsAll();
		$objectStorageHoldingExactlyOneEvent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEvent->attach($event);
		$this->subject->setEvent($objectStorageHoldingExactlyOneEvent);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEvent,
			'event',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEventToObjectStorageHoldingEvent() {
		$event = new \Dennis\Tournament\Domain\Model\EventAllVsAll();
		$eventObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$eventObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($event));
		$this->inject($this->subject, 'event', $eventObjectStorageMock);

		$this->subject->addEvent($event);
	}

	/**
	 * @test
	 */
	public function removeEventFromObjectStorageHoldingEvent() {
		$event = new \Dennis\Tournament\Domain\Model\EventAllVsAll();
		$eventObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$eventObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($event));
		$this->inject($this->subject, 'event', $eventObjectStorageMock);

		$this->subject->removeEvent($event);

	}
}
