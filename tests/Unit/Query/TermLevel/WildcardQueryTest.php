<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit\Query\TermLevel;

use Keboola\ElasticsearchDSL\Query\TermLevel\WildcardQuery;

class WildcardQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for query toArray() method.
     */
    public function testToArray()
    {
        $query = new WildcardQuery('user', 'ki*y');
        $expectedResult = [
            'wildcard' => [
                'user' => [
                    'value' => 'ki*y',
                ],
            ],
        ];

        $this->assertEquals($expectedResult, $query->toArray());
    }
}
