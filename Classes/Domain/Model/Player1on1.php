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
 * Class Player1on1
 *
 * @package Dennis\Tournament\Domain\Model
 */
class Player1on1 extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * shortName
	 *
	 * @var string
	 */
	protected $shortName = '';

	/**
	 * icon
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 */
	protected $icon = NULL;

	/**
	 * @var string
	 */
	protected $countGames;

	/**
	 * @var string
	 */
	protected $victories;

	/**
	 * @var string
	 */
	protected $draws;

	/**
	 * @var string
	 */
	protected $defeats;

	/**
	 * @var string
	 */
	protected $goals;

	/**
	 * @var string
	 */
	protected $goalsAgainst;

	/**
	 * @var string
	 */
	protected $goalsDifference;

	/**
	 * @var string
	 */
	protected $points;

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
	 * Returns the shortName
	 *
	 * @return string $shortName
	 */
	public function getShortName() {
		return $this->shortName;
	}

	/**
	 * Sets the shortName
	 *
	 * @param string $shortName
	 * @return self
	 */
	public function setShortName($shortName) {
		$this->shortName = $shortName;

		return $this;
	}

	/**
	 * Returns the icon
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	* @return array
	*/
	public function getIconfile() {
		/** @var \TYPO3\CMS\Extbase\Domain\Model\FileReference $image */
		$icon = $this->getIcon();
		if ($icon) {
			$iconFile = $icon->getOriginalResource()->toArray();
			return $iconFile;
		}

		return FALSE;
	}

	/**
	 * Sets the icon
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $icon
	 * @return self
	 */
	public function setIcon(\TYPO3\CMS\Extbase\Domain\Model\FileReference $icon) {
		$this->icon = $icon;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getCountGames() {
		return $this->countGames;
	}

	/**
	 * @param string $countGames
	 * @return self
	 */
	public function setCountGames($countGames) {
		$this->countGames = $countGames;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDefeats() {
		return $this->defeats;
	}

	/**
	 * @param string $defeats
	 * @return self
	 */
	public function setDefeats($defeats) {
		$this->defeats = $defeats;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getDraws() {
		return $this->draws;
	}

	/**
	 * @param string $draws
	 * @return self
	 */
	public function setDraws($draws) {
		$this->draws = $draws;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getGoals() {
		return $this->goals;
	}

	/**
	 * @param string $goals
	 * @return self
	 */
	public function setGoals($goals) {
		$this->goals = $goals;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getGoalsAgainst() {
		return $this->goalsAgainst;
	}

	/**
	 * @param string $goalsAgainst
	 * @return self
	 */
	public function setGoalsAgainst($goalsAgainst) {
		$this->goalsAgainst = $goalsAgainst;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getGoalsDifference() {
		return $this->goalsDifference;
	}

	/**
	 * @param string $goalsDifference
	 * @return self
	 */
	public function setGoalsDifference($goalsDifference) {
		$this->goalsDifference = $goalsDifference;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getPoints() {
		return $this->points;
	}

	/**
	 * @param string $points
	 * @return self
	 */
	public function setPoints($points) {
		$this->points = $points;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getVictories() {
		return $this->victories;
	}

	/**
	 * @param string $victories
	 * @return self
	 */
	public function setVictories($victories) {
		$this->victories = $victories;

		return $this;
	}

}
