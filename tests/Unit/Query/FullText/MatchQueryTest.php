<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit\Query\FullText;

use Keboola\ElasticsearchDSL\Query\FullText\MatchQuery;

class MatchQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray().
     */
    public function testToArray()
    {
        $query = new MatchQuery('message', 'this is a test');
        $expected = [
            'match' => [
                'message' => [
                    'query' => 'this is a test',
                ],
            ],
        ];

        $this->assertEquals($expected, $query->toArray());
    }
}
