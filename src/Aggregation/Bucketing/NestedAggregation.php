<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Aggregation\Bucketing;

use Keboola\ElasticsearchDSL\Aggregation\AbstractAggregation;
use Keboola\ElasticsearchDSL\Aggregation\Type\BucketingTrait;

/**
 * Class representing NestedAggregation.
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/search-aggregations-bucket-nested-aggregation.html
 */
class NestedAggregation extends AbstractAggregation
{
    use BucketingTrait;

    /**
     * @var string
     */
    private $path;

    /**
     * Inner aggregations container init.
     *
     * @param string $name
     * @param string $path
     */
    public function __construct($name, $path = null)
    {
        parent::__construct($name);

        $this->setPath($path);
    }

    /**
     * Return path.
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Sets path.
     *
     * @param string $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'nested';
    }

    /**
     * {@inheritdoc}
     */
    public function getArray()
    {
        return ['path' => $this->getPath()];
    }
}
