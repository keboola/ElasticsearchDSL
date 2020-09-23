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

use Keboola\ElasticsearchDSL\Query\Compound\DisMaxQuery;

class DisMaxQueryTest extends \PHPUnit_Framework_TestCase
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

        $query = new DisMaxQuery(['boost' => 1.2]);
        $query->addQuery($mock);
        $query->addQuery($mock);
        $expected = [
            'dis_max' => [
                'queries' => [
                    ['term' => ['foo' => 'bar']],
                    ['term' => ['foo' => 'bar']],
                ],
                'boost' => 1.2,
            ],
        ];

        $this->assertEquals($expected, $query->toArray());
    }
}
