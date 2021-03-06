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
 * Class EventAllVsAll
 *
 * @package Dennis\Tournament\Domain\Model
 */
class EventAllVsAll extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * numberOfPlayers
	 *
	 * @var integer
	 */
	protected $numberOfPlayers = 0;

	/**
	 * player
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\PlayerAllVsAll>
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
	 * Returns the numberOfPlayers
	 *
	 * @return integer $numberOfPlayers
	 */
	public function getNumberOfPlayers() {
		return $this->numberOfPlayers;
	}

	/**
	 * Sets the numberOfPlayers
	 *
	 * @param integer $numberOfPlayers
	 * @return self
	 */
	public function setNumberOfPlayers($numberOfPlayers) {
		$this->numberOfPlayers = $numberOfPlayers;

		return $this;
	}

	/**
	 * Adds a PlayerAllVsAll
	 *
	 * @param \Dennis\Tournament\Domain\Model\PlayerAllVsAll $player
	 * @return void
	 */
	public function addPlayer(\Dennis\Tournament\Domain\Model\PlayerAllVsAll $player) {
		$this->player->attach($player);
	}

	/**
	 * Removes a PlayerAllVsAll
	 *
	 * @param \Dennis\Tournament\Domain\Model\PlayerAllVsAll $playerToRemove The PlayerAllVsAll to be removed
	 * @return void
	 */
	public function removePlayer(\Dennis\Tournament\Domain\Model\PlayerAllVsAll $playerToRemove) {
		$this->player->detach($playerToRemove);
	}

	/**
	 * Returns the player
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\PlayerAllVsAll> $player
	 */
	public function getPlayer() {
		return $this->player;
	}

	/**
	 * Sets the player
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dennis\Tournament\Domain\Model\PlayerAllVsAll> $player
	 * @return self
	 */
	public function setPlayer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $player) {
		$this->player = $player;

		return $this;
	}

}
