<?php
namespace Sylapi\Courier\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\Parcel;

class ParcelTest extends PHPUnitTestCase
{
    private $parcelArray = [
        'weight' => 10.5,
        'width' => 100,
        'height' => 200,
        'length' => 50,
    ];

    private function getParcelMock()
    {
        return $this->getMockForAbstractClass(
            Parcel::class
        );
    }
    public function testParcel()
    {
        $parcel = $this->getParcelMock();
        $parcelArray = $this->parcelArray;
        $parcel->setWeight($parcelArray['weight'])
            ->setWidth($parcelArray['width'])
            ->setHeight($parcelArray['height'])
            ->setLength($parcelArray['length']);
        
        $this->assertEquals($parcelArray['weight'], $parcel->getWeight());
        $this->assertEquals($parcelArray['width'], $parcel->getWidth());
        $this->assertEquals($parcelArray['height'], $parcel->getHeight());
        $this->assertEquals($parcelArray['length'], $parcel->getLength());
    }

}