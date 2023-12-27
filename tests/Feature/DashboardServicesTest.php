<?php

namespace Tests\Feature;

use App\Services\DashboardServices;
use Database\Seeders\KegiatanSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardServicesTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    private DashboardServices $dashboardServices;
    public function setUp(): void
    {
        parent::setUp();
        $this->dashboardServices = $this->app->make(DashboardServices::class);
    }

    public function testDashboardService(): void
    {
        self::assertNotNull($this->dashboardServices);
    }

    public function testGetdata(): void
    {
            $this->seed([UserSeeder::class,KegiatanSeeder::class]);

            $datas = $this->dashboardServices->getDataKegitanList();

            self::assertEquals(10, count($datas));
    }
}
