<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit\Query\Compound;

use Keboola\ElasticsearchDSL\Query\Compound\BoostingQuery;

class BoostingQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray().
     */
    public function testToArray()
    {
        $mock = $this->getMockBuilder('Keboola\ElasticsearchDSL\BuilderInterface')->getMock();
        $mock
            ->expects($this->any())
            ->method('toArray')
            ->willReturn(['term' => ['foo' => 'bar']]);

        $query = new BoostingQuery($mock, $mock, 0.2);
        $expected = [
            'boosting' => [
                'positive' => ['term' => ['foo' => 'bar']],
                'negative' => ['term' => ['foo' => 'bar']],
                'negative_boost' => 0.2,
            ],
        ];

        $this->assertEquals($expected, $query->toArray());
    }
}
