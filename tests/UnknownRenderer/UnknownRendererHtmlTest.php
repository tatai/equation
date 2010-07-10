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
class UnknownRendererHtmlTest extends PHPUnit_Framework_TestCase {
	/**
	 * 
	 * @var UnknownRendererHtml
	 */
	private $_renderer = null;

	public function setUp() {
		$this->_renderer = new UnknownRendererHtml();
	}
	
	/**
	 * @test
	 */
	public function zeroDegreeReturnsEmptyString() {
		$this->assertEquals('', $this->_renderer->render(0));
	}
	
	/**
	 * @test
	 */
	public function firstDegreeReturnsOnlyUnknown() {
		$this->assertEquals('x', $this->_renderer->render(1));
	}
		
	/**
	 * @test
	 */
	public function secondDegreeReturnsUnknownAndDegreeWithSupTag() {
		$this->assertEquals('x<sup>2</sup>', $this->_renderer->render(2));
	}
}