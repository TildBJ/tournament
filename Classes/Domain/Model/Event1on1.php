<?php
namespace Dennis\Tournament\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * Class Event1on1
 *
 * @package Dennis\Tournament\Domain\Model
 */
class Event1on1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * sorting
	 *
	 * @var int
	 * @validate NotEmpty
	 */
	protected $sorting;

	/**
	 * date
	 *
	 * @var \DateTime
	 */
	protected $date = NULL;

	/**
	 * encounter
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Encounter1on1>
	 * @cascade remove
	 */
	protected $encounter = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->encounter = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return self
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Returns the sorting
	 *
	 * @return int $sorting
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param int $sorting
	 * @return self
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;

		return $this;
	}

	/**
	 * Returns the date
	 *
	 * @return \DateTime $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * Sets the date
	 *
	 * @param \DateTime $date
	 * @return self
	 */
	public function setDate(\DateTime $date) {
		$this->date = $date;

		return $this;
	}

	/**
	 * Adds a Encounter1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Encounter1on1 $encounter
	 * @return void
	 */
	public function addEncounter(\Dennis\Tournament\Domain\Model\Encounter1on1 $encounter) {
		$this->encounter->attach($encounter);
	}

	/**
	 * Removes a Encounter1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Encounter1on1 $encounterToRemove The Encounter1on1 to be removed
	 * @return void
	 */
	public function removeEncounter(\Dennis\Tournament\Domain\Model\Encounter1on1 $encounterToRemove) {
		$this->encounter->detach($encounterToRemove);
	}

	/**
	 * Returns the encounter
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Encounter1on1> $encounter
	 */
	public function getEncounter() {
		return $this->encounter;
	}

	/**
	 * Sets the encounter
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Encounter1on1> $encounter
	 * @return self
	 */
	public function setEncounter(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $encounter) {
		$this->encounter = $encounter;

		return $this;
	}

}
