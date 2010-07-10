<?php
/* 
 * Equation http://www.tatai.es
 * Copyright (C) 2010 Francisco José Naranjo <fran.naranjo@gmail.com>
 * 
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 * 
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
class Equation {
	private $_coeffs = null;

	public function __construct(Array $coeffs) {
		$this->_coeffs = $coeffs;
	}
	
	public function getDegree() {
		return count($this->_coeffs) - 1;
	}
	
	public function evaluate($x) {
		$value = (float)$x;

		// Effient when 0 given
		if($value == 0) {
			return $this->_coeffs[$this->getDegree()];
		}

		$result = 0;
		foreach($this->_coeffs AS $coeff) {
			$result = $result * $value + $coeff;
		}
		
		return $result;
	}

	public function coeff($degree) {
		return $this->_coeffs[$this->getDegree() - $degree];
	}
}
