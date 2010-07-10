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
class NumberFormatterNDecimalsTest extends PHPUnit_Framework_TestCase {
	/**
	 * 
	 * @var NumberFormatterNDecimals
	 */
	private $_formatter = null;

	public function setUp() {
		$this->_formatter = new NumberFormatterNDecimals(4);
	}
	
	/**
	 * @test
	 */
	public function padsDecimals() {
		$this->assertEquals('0.0324', (string)$this->_formatter->format('0.032423'));
	}
	
	/**
	 * @test
	 */
	public function doNotUseThousandsSeparator() {
		$this->assertEquals('12340.0324', (string)$this->_formatter->format('12340.032423'));
	}
}