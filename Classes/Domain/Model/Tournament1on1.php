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
 * Class Tournament1on1
 *
 * @package Dennis\Tournament\Domain\Model
 */
class Tournament1on1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * pointsWinner
	 *
	 * @var integer
	 */
	protected $pointsWinner = 0;

	/**
	 * pointsLoser
	 *
	 * @var integer
	 */
	protected $pointsLoser = 0;

	/**
	 * pointsDraw
	 *
	 * @var integer
	 */
	protected $pointsDraw = 0;

	/**
	 * events
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Event1on1>
	 * @cascade remove
	 */
	protected $events = NULL;

	/**
	 * player
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Player1on1>
	 * @cascade remove
	 */
	protected $player = NULL;

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
		$this->events = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->player = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Returns the pointsWinner
	 *
	 * @return integer $pointsWinner
	 */
	public function getPointsWinner() {
		return $this->pointsWinner;
	}

	/**
	 * Sets the pointsWinner
	 *
	 * @param integer $pointsWinner
	 * @return self
	 */
	public function setPointsWinner($pointsWinner) {
		$this->pointsWinner = $pointsWinner;

		return $this;
	}

	/**
	 * Returns the pointsLoser
	 *
	 * @return integer $pointsLoser
	 */
	public function getPointsLoser() {
		return $this->pointsLoser;
	}

	/**
	 * Sets the pointsLoser
	 *
	 * @param integer $pointsLoser
	 * @return self
	 */
	public function setPointsLoser($pointsLoser) {
		$this->pointsLoser = $pointsLoser;

		return $this;
	}

	/**
	 * Returns the pointsDraw
	 *
	 * @return integer $pointsDraw
	 */
	public function getPointsDraw() {
		return $this->pointsDraw;
	}

	/**
	 * Sets the pointsDraw
	 *
	 * @param integer $pointsDraw
	 * @return self
	 */
	public function setPointsDraw($pointsDraw) {
		$this->pointsDraw = $pointsDraw;

		return $this;
	}

	/**
	 * Adds a Event1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Event1on1 $event
	 * @return void
	 */
	public function addEvent(\Dennis\Tournament\Domain\Model\Event1on1 $event) {
		$this->events->attach($event);
	}

	/**
	 * Removes a Event1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Event1on1 $eventToRemove The Event1on1 to be removed
	 * @return void
	 */
	public function removeEvent(\Dennis\Tournament\Domain\Model\Event1on1 $eventToRemove) {
		$this->events->detach($eventToRemove);
	}

	/**
	 * Returns the events
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Event1on1> $events
	 */
	public function getEvents() {
		return $this->events;
	}

	/**
	 * Sets the events
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Event1on1> $events
	 * @return self
	 */
	public function setEvents(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $events) {
		$this->events = $events;

		return $this;
	}

	/**
	 * Adds a Player1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Player1on1 $player
	 * @return void
	 */
	public function addPlayer(\Dennis\Tournament\Domain\Model\Player1on1 $player) {
		$this->player->attach($player);
	}

	/**
	 * Removes a Player1on1
	 *
	 * @param \Dennis\Tournament\Domain\Model\Player1on1 $playerToRemove The Player1on1 to be removed
	 * @return void
	 */
	public function removePlayer(\Dennis\Tournament\Domain\Model\Player1on1 $playerToRemove) {
		$this->player->detach($playerToRemove);
	}

	/**
	 * Returns the player
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Player1on1> $player
	 */
	public function getPlayer() {
		return $this->player;
	}

	/**
	 * Sets the player
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\Player1on1> $player
	 * @return self
	 */
	public function setPlayer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $player) {
		$this->player = $player;

		return $this;
	}

}
