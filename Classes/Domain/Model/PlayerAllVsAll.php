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
 * Class PlayerAllVsAll
 *
 * @package Dennis\Tournament\Domain\Model
 */
class PlayerAllVsAll extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name = '';

	/**
	 * country
	 *
	 * @var \Dennis\Tournament\Domain\Model\CountryAllVsAll
	 */
	protected $country = NULL;

	/**
	 * teams
	 *
	 * @var \Dennis\Tournament\Domain\Model\TeamAllVsAll
	 */
	protected $teams = NULL;

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
	 * Returns the country
	 *
	 * @return \Dennis\Tournament\Domain\Model\CountryAllVsAll $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 *
	 * @param \Dennis\Tournament\Domain\Model\CountryAllVsAll $country
	 * @return self
	 */
	public function setCountry(\Dennis\Tournament\Domain\Model\CountryAllVsAll $country) {
		$this->country = $country;

		return $this;
	}

	/**
	 * Returns the teams
	 *
	 * @return \Dennis\Tournament\Domain\Model\TeamAllVsAll $teams
	 */
	public function getTeams() {
		return $this->teams;
	}

	/**
	 * Sets the teams
	 *
	 * @param \Dennis\Tournament\Domain\Model\TeamAllVsAll $teams
	 * @return self
	 */
	public function setTeams(\Dennis\Tournament\Domain\Model\TeamAllVsAll $teams) {
		$this->teams = $teams;

		return $this;
	}

}
