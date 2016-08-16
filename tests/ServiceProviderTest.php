<?php


class ServiceProviderTest extends TestCase
{
    public function testDefaultConfig()
    {
        $this->assertEquals(['menus' => ['main' => []]], config('menu'));
    }
}