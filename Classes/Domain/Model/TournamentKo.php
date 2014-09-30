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
 * Class TournamentKo
 *
 * @package Dennis\Tournament\Domain\Model
 */
class TournamentKo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * numberOfPlayer
	 *
	 * @var integer
	 */
	protected $numberOfPlayer = 0;

	/**
	 * numberOfGamesPerSet
	 *
	 * @var integer
	 */
	protected $numberOfGamesPerSet = 0;

	/**
	 * numberOfSets
	 *
	 * @var integer
	 */
	protected $numberOfSets = 0;

	/**
	 * event
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventKo>
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
	 * Returns the numberOfPlayer
	 *
	 * @return integer $numberOfPlayer
	 */
	public function getNumberOfPlayer() {
		return $this->numberOfPlayer;
	}

	/**
	 * Sets the numberOfPlayer
	 *
	 * @param integer $numberOfPlayer
	 * @return self
	 */
	public function setNumberOfPlayer($numberOfPlayer) {
		$this->numberOfPlayer = $numberOfPlayer;

		return $this;
	}

	/**
	 * Returns the numberOfGamesPerSet
	 *
	 * @return integer $numberOfGamesPerSet
	 */
	public function getNumberOfGamesPerSet() {
		return $this->numberOfGamesPerSet;
	}

	/**
	 * Sets the numberOfGamesPerSet
	 *
	 * @param integer $numberOfGamesPerSet
	 * @return self
	 */
	public function setNumberOfGamesPerSet($numberOfGamesPerSet) {
		$this->numberOfGamesPerSet = $numberOfGamesPerSet;

		return $this;
	}

	/**
	 * Returns the numberOfSets
	 *
	 * @return integer $numberOfSets
	 */
	public function getNumberOfSets() {
		return $this->numberOfSets;
	}

	/**
	 * Sets the numberOfSets
	 *
	 * @param integer $numberOfSets
	 * @return self
	 */
	public function setNumberOfSets($numberOfSets) {
		$this->numberOfSets = $numberOfSets;

		return $this;
	}

	/**
	 * Adds a EventKo
	 *
	 * @param \Dennis\Tournament\Domain\Model\EventKo $event
	 * @return void
	 */
	public function addEvent(\Dennis\Tournament\Domain\Model\EventKo $event) {
		$this->event->attach($event);
	}

	/**
	 * Removes a EventKo
	 *
	 * @param \Dennis\Tournament\Domain\Model\EventKo $eventToRemove The EventKo to be removed
	 * @return void
	 */
	public function removeEvent(\Dennis\Tournament\Domain\Model\EventKo $eventToRemove) {
		$this->event->detach($eventToRemove);
	}

	/**
	 * Returns the event
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventKo> $event
	 */
	public function getEvent() {
		return $this->event;
	}

	/**
	 * Sets the event
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\EventKo> $event
	 * @return self
	 */
	public function setEvent(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $event) {
		$this->event = $event;

		return $this;
	}

}
