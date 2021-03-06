<?php

/*
 * This file is part of the ONGR package.
 *
 * (c) NFQ Technologies UAB <info@nfq.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Keboola\ElasticsearchDSL\Query\FullText;

use Keboola\ElasticsearchDSL\BuilderInterface;
use Keboola\ElasticsearchDSL\ParametersTrait;

/**
 * Represents Elasticsearch "simple_query_string" query.
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/reference/current/query-dsl-simple-query-string-query.html
 */
class SimpleQueryStringQuery implements BuilderInterface
{
    use ParametersTrait;

    /**
     * @var string The actual query to be parsed.
     */
    private $query;

    /**
     * @param string $query
     * @param array  $parameters
     */
    public function __construct($query, array $parameters = [])
    {
        $this->query = $query;
        $this->setParameters($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return 'simple_query_string';
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $query = [
            'query' => $this->query,
        ];

        $output = $this->processArray($query);

        return [$this->getType() => $output];
    }
}
