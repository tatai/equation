<?php
include_once(dirname(__FILE__) . '/../classes/Equation.class.php');

/*
 * Aim
 * 
 * Define an equation object and play with all the different methods that
 * has the object
 */

/*
 * Assuming equation
 * 
 * y = 2x4 + 3x2 - 2x + 10
 * 
 * defined coefficients will be
 */
$coeffs = array(
	2,  //  2x4
	0,  //  0x3
	3,  //  2x
	-2, // -2x
	10  // 10
);

/*
 * And then, equation object can be instanced
 */
$equation = new Equation($coeffs);

/*
 * Get equation degree
 */
// Prints 4
print $equation->getDegree() . "\n";

/*
 * Get some coefficients
 */
// Second order: prints 3
print $equation->coeff(2) . "\n";

// Independent: prints 10
print $equation->coeff(0) . "\n";

/*
 * Evaluate equation
 */
// If x=2 gives 50
print $equation->evaluate(2) . "\n";
?>