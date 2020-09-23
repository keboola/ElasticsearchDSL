<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Unit;

use Keboola\ElasticsearchDSL\Query\TermLevel\ExistsQuery;
use Keboola\ElasticsearchDSL\Query\TermLevel\TermQuery;
use Keboola\ElasticsearchDSL\Search;
use Keboola\ElasticsearchDSL\Sort\FieldSort;
use Keboola\ElasticsearchDSL\Suggest\Suggest;

/**
 * Test for Search.
 */
class SearchTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests Search constructor.
     */
    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf('Keboola\ElasticsearchDSL\Search', new Search());
    }

    public function testScrollUriParameter()
    {
        $search = new Search();
        $search->setScroll('5m');

        $this->assertArrayHasKey('scroll', $search->getUriParams());
    }
}
