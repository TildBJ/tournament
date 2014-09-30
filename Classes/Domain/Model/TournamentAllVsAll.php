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
 * Class TournamentAllVsAll
 *
 * @package Dennis\Tournament\Domain\Model
 *
 */
class TournamentAllVsAll extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * event
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventAllVsAll>
	 * @cascade remove
	 */
	protected $event = NULL;

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
		$this->event = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a EventAllVsAll
	 *
	 * @param \Dennis\Tournament\Domain\Model\EventAllVsAll $event
	 * @return void
	 */
	public function addEvent(\Dennis\Tournament\Domain\Model\EventAllVsAll $event) {
		$this->event->attach($event);
	}

	/**
	 * Removes a EventAllVsAll
	 *
	 * @param \Dennis\Tournament\Domain\Model\EventAllVsAll $eventToRemove The EventAllVsAll to be removed
	 * @return self
	 */
	public function removeEvent(\Dennis\Tournament\Domain\Model\EventAllVsAll $eventToRemove) {
		$this->event->detach($eventToRemove);
	}

	/**
	 * Returns the event
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventAllVsAll> $event
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * Sets the event
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventAllVsAll> $event
	 * @return self
	 */
	public function setEvent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $event) {
		$this->event = $event;

		return $this;
	}

}
