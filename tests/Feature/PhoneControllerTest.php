<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhoneControllerTest extends TestCase
{
    public function testDisplaysListOfPhones()
    {
        $response = $this->get('/api/phones');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                [
                    'id',
                    'name',
                    'age',
                    'imageUrl',
                    'snippet',
                ]
            ]);

    }

    public function testDisplaysPhone()
    {
        $response = $this->get('/api/phones/motorola-xoom-with-wi-fi');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'additionalFeatures',
                'android' => [
                    'os',
                    'ui',
                ],
                'availability',
                'battery' => [
                    'standbyTime',
                    'talkTime',
                    'type',
                ],
                'camera' => [
                    'features',
                    'primary',
                ],
                'connectivity' => [
                    'bluetooth',
                    'cell',
                    'gps',
                    'infrared',
                    'wifi',
                ],
                'description',
                'display' => [
                    'screenResolution',
                    'screenSize',
                    'touchScreen',
                ],
                'hardware' => [
                    'accelerometer',
                    'audioJack',
                    'cpu',
                    'fmRadio',
                    'physicalKeyboard',
                    'usb',
                ],
                'id',
                'images',
                'name',
                'sizeAndWeight' => [
                    'dimensions',
                    'weight',
                ],
                'storage' => [
                    'flash',
                    'ram',
                ]
            ]);

    }
}
