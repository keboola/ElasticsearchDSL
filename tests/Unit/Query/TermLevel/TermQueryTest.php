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

use Keboola\ElasticsearchDSL\Query\TermLevel\TermQuery;

class TermQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray().
     */
    public function testToArray()
    {
        $query = new TermQuery('user', 'bob');
        $expected = [
            'term' => [
                'user' => 'bob',
            ],
        ];

        $this->assertEquals($expected, $query->toArray());
    }
}
