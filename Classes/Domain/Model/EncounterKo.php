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
 * Class EncounterKo
 *
 * @package Dennis\Tournament\Domain\Model
 */
class EncounterKo extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * pointsPlayerHome
	 *
	 * @var integer
	 */
	protected $pointsPlayerHome = 0;

	/**
	 * pointsPlayerGuest
	 *
	 * @var integer
	 */
	protected $pointsPlayerGuest = 0;

	/**
	 * playerHome
	 *
	 * @var \Dennis\Tournament\Domain\Model\PlayerKo
	 */
	protected $playerHome = NULL;

	/**
	 * playerGuest
	 *
	 * @var \Dennis\Tournament\Domain\Model\PlayerKo
	 */
	protected $playerGuest = NULL;

	/**
	 * Returns the pointsPlayerHome
	 *
	 * @return integer $pointsPlayerHome
	 */
	public function getPointsPlayerHome() {
		return $this->pointsPlayerHome;
	}

	/**
	 * Sets the pointsPlayerHome
	 *
	 * @param integer $pointsPlayerHome
	 * @return self
	 */
	public function setPointsPlayerHome($pointsPlayerHome) {
		$this->pointsPlayerHome = $pointsPlayerHome;

		return $this;
	}

	/**
	 * Returns the pointsPlayerGuest
	 *
	 * @return integer $pointsPlayerGuest
	 */
	public function getPointsPlayerGuest() {
		return $this->pointsPlayerGuest;
	}

	/**
	 * Sets the pointsPlayerGuest
	 *
	 * @param integer $pointsPlayerGuest
	 * @return self
	 */
	public function setPointsPlayerGuest($pointsPlayerGuest) {
		$this->pointsPlayerGuest = $pointsPlayerGuest;

		return $this;
	}

	/**
	 * Returns the playerHome
	 *
	 * @return \Dennis\Tournament\Domain\Model\PlayerKo $playerHome
	 */
	public function getPlayerHome() {
		return $this->playerHome;
	}

	/**
	 * Sets the playerHome
	 *
	 * @param \Dennis\Tournament\Domain\Model\PlayerKo $playerHome
	 * @return self
	 */
	public function setPlayerHome(\Dennis\Tournament\Domain\Model\PlayerKo $playerHome) {
		$this->playerHome = $playerHome;

		return $this;
	}

	/**
	 * Returns the playerGuest
	 *
	 * @return \Dennis\Tournament\Domain\Model\PlayerKo $playerGuest
	 */
	public function getPlayerGuest() {
		return $this->playerGuest;
	}

	/**
	 * Sets the playerGuest
	 *
	 * @param \Dennis\Tournament\Domain\Model\PlayerKo $playerGuest
	 * @return self
	 */
	public function setPlayerGuest(\Dennis\Tournament\Domain\Model\PlayerKo $playerGuest) {
		$this->playerGuest = $playerGuest;

		return $this;
	}

}
