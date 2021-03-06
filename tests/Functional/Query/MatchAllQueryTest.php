<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Tests\Functional\Query;

use Keboola\ElasticsearchDSL\Query\MatchAllQuery;
use Keboola\ElasticsearchDSL\Search;
use Keboola\ElasticsearchDSL\Tests\Functional\AbstractElasticsearchTestCase;

class MatchAllQueryTest extends AbstractElasticsearchTestCase
{
    /**
     * {@inheritdoc}
     */
    protected function getDataArray()
    {
        return [
            'product' => [
                [
                    'title' => 'acme',
                ],
                [
                    'title' => 'foo',
                ],
            ]
        ];
    }

    /**
     * Match all test
     */
    public function testMatchAll()
    {
        $search = new Search();
        $matchAll = new MatchAllQuery();

        $search->addQuery($matchAll);

        $results = $this->executeSearch($search);

        $this->assertEquals($this->getDataArray()['product'], $results);
    }
}
