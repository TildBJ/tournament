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
 * Test case for class \Dennis\Tournament\Domain\Model\Event1on1.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html
 * GNU General Public License, version 3 or later
 *
 */

/**
 * Class Event1on1Test
 *
 * @package Dennis\Tournament\Tests\Unit\Domain\Model
 */
class Event1on1Test extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Dennis\Tournament\Domain\Model\Event1on1
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Dennis\Tournament\Domain\Model\Event1on1();
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
	public function getDateReturnsInitialValueForDateTime() {
		$this->assertEquals(
			NULL,
			$this->subject->getDate()
		);
	}

	/**
	 * @test
	 */
	public function setDateForDateTimeSetsDate() {
		$dateTimeFixture = new \DateTime();
		$this->subject->setDate($dateTimeFixture);

		$this->assertAttributeEquals(
			$dateTimeFixture,
			'date',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEncounterReturnsInitialValueForEncounter1on1() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getEncounter()
		);
	}

	/**
	 * @test
	 */
	public function setEncounterForObjectStorageContainingEncounter1on1SetsEncounter() {
		$encounter = new \Dennis\Tournament\Domain\Model\Encounter1on1();
		$objectStorageHoldingExactlyOneEncounter = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneEncounter->attach($encounter);
		$this->subject->setEncounter($objectStorageHoldingExactlyOneEncounter);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneEncounter,
			'encounter',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addEncounterToObjectStorageHoldingEncounter() {
		$encounter = new \Dennis\Tournament\Domain\Model\Encounter1on1();
		$encounterObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$encounterObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($encounter));
		$this->inject($this->subject, 'encounter', $encounterObjectStorageMock);

		$this->subject->addEncounter($encounter);
	}

	/**
	 * @test
	 */
	public function removeEncounterFromObjectStorageHoldingEncounter() {
		$encounter = new \Dennis\Tournament\Domain\Model\Encounter1on1();
		$encounterObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$encounterObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($encounter));
		$this->inject($this->subject, 'encounter', $encounterObjectStorageMock);

		$this->subject->removeEncounter($encounter);

	}
}
