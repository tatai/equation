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
class EquationTest extends PHPUnit_Framework_TestCase {
	/**
	 * 
	 * @var Equation
	 */
	private $_equation = null;

	/**
	 * 
	 * @var array
	 */
	private $_coeffs = null;

	public function setUp() {
		$this->_coeffs = array(4, 3, 2, 1);
		$this->_equation = new Equation($this->_coeffs);
	}

	/**
	 * @test
	 */
	public function returnsDegree() {
		$this->assertEquals(3, $this->_equation->getDegree());
	}

	/**
	 * @test
	 */
	public function whenGivenPositiveVariableReturnsCorrectValue() {
		$this->assertEquals(142, $this->_equation->evaluate(3));
	}

	/**
	 * @test
	 */
	public function whenGivenNegativeVariableReturnsCorrectValue() {
		$this->assertEquals(-86, $this->_equation->evaluate(-3));
	}
	
	/**
	 * @test
	 */
	public function whenGivenZeroAsVaribleReturnIndependentCoeff() {
		$this->assertEquals(1, $this->_equation->evaluate(0));
	}
	
	/**
	 * @test
	 */
	public function coeffsAreStoredInInverseOrder() {
		$degree = $this->_equation->getDegree();
		foreach($this->_coeffs AS $i => $coeff) {
			$this->assertEquals($this->_coeffs[$degree - $i], $this->_equation->coeff($i));
		}
	}
	
	/**
	 * @test
	 */
	public function whenAskingForANonExistingCoefficientReturnsZero() {
		$this->assertEquals(0, $this->_equation->coeff($this->_equation->getDegree() + 1));
	}
}