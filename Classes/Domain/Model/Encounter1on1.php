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
 * Class Encounter1on1
 *
 * @package Dennis\Tournament\Domain\Model
 */
class Encounter1on1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * duration
	 *
	 * @var \DateTime
	 */
	protected $duration = NULL;

	/**
	 * teamHomePoints
	 *
	 * @var integer
	 */
	protected $teamHomePoints = 0;

	/**
	 * teamGuestPoints
	 *
	 * @var integer
	 */
	protected $teamGuestPoints = 0;

	/**
	 * playerHome
	 *
	 * @var \Dennis\Tournament\Domain\Model\Player1on1
	 */
	protected $playerHome = NULL;

	/**
	 * playerGuest
	 *
	 * @var \Dennis\Tournament\Domain\Model\Player1on1
	 */
	protected $playerGuest = NULL;

	/**
	 * Returns the duration
	 *
	 * @return \DateTime $duration
	 */
	public function getDuration() {
		return $this->duration;
	}

	/**
	 * Sets the duration
	 *
	 * @param \DateTime $duration
	 * @return self
	 */
	public function setDuration(\DateTime $duration) {
		$this->duration = $duration;

		return $this;
	}

	/**
	 * Returns the teamHomePoints
	 *
	 * @return integer $teamHomePoints
	 */
	public function getTeamHomePoints() {
		return $this->teamHomePoints;
	}

	/**
	 * Sets the teamHomePoints
	 *
	 * @param integer $teamHomePoints
	 * @return self
	 */
	public function setTeamHomePoints($teamHomePoints) {
		$this->teamHomePoints = $teamHomePoints;

		return $this;
	}

	/**
	 * Returns the teamGuestPoints
	 *
	 * @return integer $teamGuestPoints
	 */
	public function getTeamGuestPoints() {
		return $this->teamGuestPoints;
	}

	/**
	 * Sets the teamGuestPoints
	 *
	 * @param integer $teamGuestPoints
	 * @return self
	 */
	public function setTeamGuestPoints($teamGuestPoints) {
		$this->teamGuestPoints = $teamGuestPoints;

		return $this;
	}

	/**
	 * Returns the playerHome
	 *
	 * @return \Dennis\Tournament\Domain\Model\Player1on1 $playerHome
	 */
	public function getPlayerHome() {
		return $this->playerHome;
	}

	/**
	 * Sets the playerHome
	 *
	 * @param \Dennis\Tournament\Domain\Model\Player1on1 $playerHome
	 * @return self
	 */
	public function setPlayerHome(\Dennis\Tournament\Domain\Model\Player1on1 $playerHome) {
		$this->playerHome = $playerHome;

		return $this;
	}

	/**
	 * Returns the playerGuest
	 *
	 * @return \Dennis\Tournament\Domain\Model\Player1on1 $playerGuest
	 */
	public function getPlayerGuest() {
		return $this->playerGuest;
	}

	/**
	 * Sets the playerGuest
	 *
	 * @param \Dennis\Tournament\Domain\Model\Player1on1 $playerGuest
	 * @return self
	 */
	public function setPlayerGuest(\Dennis\Tournament\Domain\Model\Player1on1 $playerGuest) {
		$this->playerGuest = $playerGuest;

		return $this;
	}

}
