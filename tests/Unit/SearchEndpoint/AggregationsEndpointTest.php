<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit\Unit\SearchEndpoint;

use Keboola\ElasticsearchDSL\Aggregation\Bucketing\MissingAggregation;
use Keboola\ElasticsearchDSL\SearchEndpoint\AggregationsEndpoint;

/**
 * Class AggregationsEndpointTest.
 */
class AggregationsEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests constructor.
     */
    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf(
            'Keboola\ElasticsearchDSL\SearchEndpoint\AggregationsEndpoint',
            new AggregationsEndpoint()
        );
    }

    /**
     * Tests if endpoint returns builders.
     */
    public function testEndpointGetter()
    {
        $aggName = 'acme_agg';
        $agg = new MissingAggregation('acme');
        $endpoint = new AggregationsEndpoint();
        $endpoint->add($agg, $aggName);
        $builders = $endpoint->getAll();

        $this->assertCount(1, $builders);
        $this->assertSame($agg, $builders[$aggName]);
    }
}
