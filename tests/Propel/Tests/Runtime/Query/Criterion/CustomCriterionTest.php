<?php

/**
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Propel\Tests\Runtime\Query\Criterion;

use Propel\Tests\Helpers\BaseTestCase;

use Propel\Runtime\Query\Criteria;
use Propel\Runtime\Query\Criterion\CustomCriterion;

/**
 * Test class for CustomCriterion.
 *
 * @author François Zaninotto
 */
class CustomCriterionTest extends BaseTestCase
{
    public function testAppendPsToConcatenatesTheValue()
    {
        $cton = new CustomCriterion(new Criteria(), 'A.COL', 'date_part(\'YYYY\', A.COL) = \'2007\'');

        $params = array();
        $ps = '';
        $cton->appendPsTo($ps, $params);

        $expected = "date_part('YYYY', A.COL) = '2007'";
        $this->assertEquals($expected, $ps);
        $this->assertEquals(array(), $params);
    }
}