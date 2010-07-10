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
class EquationRenderer {
	/**
	 * Render given equation with given helpers
	 *
	 * @param $eq Equation object
	 * @param $formatter INumberFormatter number formatter
	 * @param $unknownRenderer IUnknownRenderer unknown renderer
	 * @return string with equation rendered. If error, returns null
	 */
	public function render(Equation $eq, INumberFormatter $formatter, IUnknownRenderer $unknownRenderer) {
		$result = null;
		for($i = $eq->getDegree(); $i >= 0; $i--) {
			$coeff = $eq->coeff($i);
			if(is_null($coeff) || $coeff == 0) {
				continue;
			}

			
			$value = $formatter->format($coeff);
			if($coeff > 0 && $i != $eq->getDegree()) {
				$value = ' + ' . $value;
			}
			else {
				$value = preg_replace('/^-/', ' - ', $value);
			}

			$unknown = $unknownRenderer->render($i);

			$result .= preg_replace('/ +/', ' ', $value . ' ' . $unknown);
		}

		if(!is_null($result)) {
			$result = 'y = '. $result;
		}

		return $result;
	}
}
