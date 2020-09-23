<?php

namespace Keboola\ElasticsearchDSL\Tests\Unit\InnerHit;

use Keboola\ElasticsearchDSL\InnerHit\ParentInnerHit;
use Keboola\ElasticsearchDSL\Query\TermLevel\TermQuery;
use Keboola\ElasticsearchDSL\Search;

class ParentInnerHitTest extends \PHPUnit_Framework_TestCase
{
    public function testToArray()
    {
        $query = new TermQuery('foo', 'bar');
        $search = new Search();
        $search->addQuery($query);


        $hit = new ParentInnerHit('test', 'acme', $search);
        $expected = [
            'type' => [
                'acme' => [
                    'query' => $query->toArray(),
                ],
            ],
        ];
        $this->assertEquals($expected, $hit->toArray());
    }
}
