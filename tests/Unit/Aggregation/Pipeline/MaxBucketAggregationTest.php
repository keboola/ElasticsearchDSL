<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit\Aggregation\Pipeline;

use Keboola\ElasticsearchDSL\Aggregation\Pipeline\MaxBucketAggregation;

/**
 * Unit test for max bucket aggregation.
 */
class MaxBucketAggregationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests toArray method.
     */
    public function testToArray()
    {
        $aggregation = new MaxBucketAggregation('acme', 'test');

        $expected = [
            'max_bucket' => [
                'buckets_path' => 'test',
            ],
        ];

        $this->assertEquals($expected, $aggregation->toArray());
    }
}
