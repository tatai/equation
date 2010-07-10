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

	/**
	 * Constructor. Receives coefficient values in descent order: highest 
	 * order, first position
	 * 
	 * @param $coeffs array of float
	 */
	public function __construct(Array $coeffs) {
		$this->_coeffs = $coeffs;
	}
	
	/**
	 * Returns degree of the equation
	 * 
	 *  @return int
	 */
	public function getDegree() {
		return count($this->_coeffs) - 1;
	}
	
	/**
	 * Evaluates equation with given x value
	 *  
	 * @param $x float
	 * @return float result of the evaluation
	 */
	public function evaluate($x) {
		$value = (float)$x;

		// Efficient when 0 given
		if($value == 0) {
			return $this->_coeffs[$this->getDegree()];
		}

		// Horner evaluation
		$result = 0;
		foreach($this->_coeffs AS $coeff) {
			$result = $result * $value + $coeff;
		}
		
		return $result;
	}

	/**
	 * Returns coefficient of given degree
	 * 
	 * @param $degree int
	 * @return float coefficient value
	 */
	public function coeff($degree) {
		if($this->getDegree() < $degree) {
			return 0;
		}
		
		return $this->_coeffs[$this->getDegree() - $degree];
	}
}