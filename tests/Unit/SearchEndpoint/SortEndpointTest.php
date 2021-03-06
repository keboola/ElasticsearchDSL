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

use Keboola\ElasticsearchDSL\SearchEndpoint\SortEndpoint;
use Keboola\ElasticsearchDSL\Sort\FieldSort;
use PHPUnit_Framework_MockObject_MockObject as MockObject;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * Class SortEndpointTest.
 */
class SortEndpointTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Tests constructor.
     */
    public function testItCanBeInstantiated()
    {
        $this->assertInstanceOf('Keboola\ElasticsearchDSL\SearchEndpoint\SortEndpoint', new SortEndpoint());
    }

    /**
     * Tests endpoint normalization.
     */
    public function testNormalize()
    {
        $instance = new SortEndpoint();

        /** @var NormalizerInterface|MockObject $normalizerInterface */
        $normalizerInterface = $this->getMockForAbstractClass(
            'Symfony\Component\Serializer\Normalizer\NormalizerInterface'
        );

        $sort = new FieldSort('acme', ['order' => FieldSort::ASC]);
        $instance->add($sort);

        $this->assertEquals(
            [$sort->toArray()],
            $instance->normalize($normalizerInterface)
        );
    }

    /**
     * Tests if endpoint returns builders.
     */
    public function testEndpointGetter()
    {
        $sortName = 'acme_sort';
        $sort = new FieldSort('acme');
        $endpoint = new SortEndpoint();
        $endpoint->add($sort, $sortName);
        $builders = $endpoint->getAll();

        $this->assertCount(1, $builders);
        $this->assertSame($sort, $builders[$sortName]);
    }
}
