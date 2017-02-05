<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use LArtie\MagtuAPI\Core\API as Magtu;

class MagtuAPITest extends TestCase
{

    /**
     * Получение групп
     */
    public function testGetGroups()
    {
        $magtu = new Magtu();
        $data = $magtu->getGroups();

        $this->assertNotEmpty($data);
    }

    /**
     * Получение групп с валидным фильтром
     */
    public function testGetGroupsViaValidFilter()
    {
        $magtu = new Magtu();
        $data = $magtu->getGroups('А');

        $this->assertNotEmpty($data);
    }

    /**
     * Получение групп с невалидным фильтром
     */
    public function testGetGroupsViaFailFilter()
    {
        $magtu = new Magtu();
        $data = $magtu->getGroups('helloworld');

        $this->assertEmpty($data);
    }

    /**
     * Получение расписания с валидным идентификатором группы
     */
    public function testGetScheduleViaValidGroupID()
    {
        $magtu = new Magtu();
        $data = $magtu->getSchedule(1);

        $this->assertNotEmpty($data);
    }

    /**
     * Получение расписания с невалидным идентификатором группы
     */
    public function testGetScheduleViaFailGroupID()
    {
        $magtu = new Magtu();
        $data = $magtu->getSchedule(PHP_INT_MAX);

        $this->assertEmpty($data);
    }
}
