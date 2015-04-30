<?php
namespace OmekaTest\Api\Adapter\Entity;

use Omeka\Test\TestCase;

class AbstractResourceEntityAdapterTest extends TestCase
{
    public function testBuildQuery()
    {
        $queryBuilder = $this->getMockBuilder('Doctrine\ORM\QueryBuilder')
            ->disableOriginalConstructor()
            ->getMock();
        $query = array('foo', 'bar');
        $adapter = $this->getMockForAbstractClass(
            'Omeka\Api\Adapter\AbstractResourceEntityAdapter',
            array(), '', true, true, true,
            array('buildValueQuery', 'buildPropertyQuery', 'buildHasPropertyQuery')
        );
        $adapter->expects($this->once())
            ->method('buildValueQuery')
            ->with($this->equalTo($queryBuilder), $this->equalTo($query));
        $adapter->expects($this->once())
            ->method('buildPropertyQuery')
            ->with($this->equalTo($queryBuilder), $this->equalTo($query));
        $adapter->expects($this->once())
            ->method('buildHasPropertyQuery')
            ->with($this->equalTo($queryBuilder), $this->equalTo($query));
        $adapter->buildQuery($queryBuilder, $query);
    }
}
