<?php

namespace Tests\Unit;

use App\Libs\Services\Tools;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ToolsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
//        $this->assertTrue(Tools::compare(1,1));
        $this->assertEquals(true, Tools::compare(1,1));
    }
}
