<?php
include_once(dirname(__FILE__) . '/../classes/Equation.class.php');
include_once(dirname(__FILE__) . '/../classes/EquationRenderer.class.php');
include_once(dirname(__FILE__) . '/../classes/NumberFormatter/NumberFormatterNDecimals.class.php');
include_once(dirname(__FILE__) . '/../classes/UnknownRenderer/UnknownRendererHtml.class.php');

/*
 * Aim
 * 
 * Based on an equation, creates a HTML readable string of it
 * Each coefficient have 2 decimals
 */

/*
 * Assuming equation
 * 
 * y = 2x4 + 3x2 - 2x + 10
 * 
 * defined coefficients will be
 */
$coeffs = array(2, 0, 3, -2, 10);

/*
 * And then, equation object can be instanced
 */
$equation = new Equation($coeffs);

/*
 * Define formatter: 2 decimals
 */
$coeffsFormatter = new NumberFormatterNDecimals(2);

/*
 * And now, the unknown renderer for HTML
 */
$unknownRenderer = new UnknownRendererHtml();

/*
 * We have everything we need, let's get the render
 * 
 * Result will be
 * y = 2.00 x<sup>4</sup> + 3.00 x<sup>2</sup> - 2.00 x + 10.00
 */
$renderer = new EquationRenderer();
print $renderer->render($equation, $coeffsFormatter, $unknownRenderer);
?>