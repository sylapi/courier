<?php

namespace Sylapi\Courier\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Abstracts\Address;

class AddressTest extends PHPUnitTestCase
{
    private $addressArray = [
        'firstName'       => 'Jan',
        'surname'         => 'Kowalski',
        'fullName'        => 'dr. Jan Kowalski',
        'address'         => 'Ulica 11a/2',
        'street'          => 'Ulica',
        'houseNumber'     => '11a',
        'apartmentNumber' => '2',
        'city'            => 'Miasto',
        'zipCode'         => '11000',
        'country'         => 'Poland',
        'countryCode'     => 'pl',
        'contactPerson'   => 'Piotr Nowak',
        'email'           => 'email@email.test',
        'phone'           => '+48500400300',
    ];

    private function getAddressMock()
    {
        return $this->getMockForAbstractClass(
            Address::class
        );
    }

    public function testAddressToArray()
    {
        $address = $this->getAddressMock();
        $addressArray = $this->addressArray;
        $address->setFromArray($addressArray);
        ksort($addressArray);
        $ata = $address->toArray();
        $this->assertEquals($addressArray, $ata);
    }

    public function testGenereteFullNameProperty()
    {
        $address = $this->getAddressMock();
        $addressArray = $this->addressArray;
        $address->setFirstName($addressArray['firstName'])
            ->setSurname($addressArray['surname']);

        $fullNameString = trim(
            $addressArray['firstName']
            .' '.$addressArray['surname']
        );

        $this->assertEquals($fullNameString, $address->getFullName());
    }

    public function testGenereteAddressProperty()
    {
        $address = $this->getAddressMock();
        $addressArray = $this->addressArray;
        $address->setStreet($addressArray['street'])
            ->setHouseNumber($addressArray['houseNumber'])
            ->setApartmentNumber($addressArray['apartmentNumber']);

        $addressString = trim(
            $addressArray['street']
            .' '.$addressArray['houseNumber']
            .' '.$addressArray['apartmentNumber']
        );

        $this->assertEquals($addressString, $address->getAddress());
    }

    public function testAddressSetters()
    {
        $address = $this->getAddressMock();
        $addressArray = $this->addressArray;

        $address->setFirstName($addressArray['firstName'])
            ->setSurname($addressArray['surname'])
            ->setFullName($addressArray['fullName'])
            ->setAddress($addressArray['address'])
            ->setStreet($addressArray['street'])
            ->setHouseNumber($addressArray['houseNumber'])
            ->setApartmentNumber($addressArray['apartmentNumber'])
            ->setCity($addressArray['city'])
            ->setZipCode($addressArray['zipCode'])
            ->setCountry($addressArray['country'])
            ->setCountryCode($addressArray['countryCode'])
            ->setContactPerson($addressArray['contactPerson'])
            ->setEmail($addressArray['email'])
            ->setPhone($addressArray['phone']);

        $this->assertEquals(
            $addressArray['firstName'],
            $address->getFirstName()
        );
        $this->assertEquals(
            $addressArray['surname'],
            $address->getSurname()
        );
        $this->assertEquals(
            $addressArray['fullName'],
            $address->getFullName()
        );
        $this->assertEquals(
            $addressArray['address'],
            $address->getAddress()
        );
        $this->assertEquals(
            $addressArray['street'],
            $address->getStreet()
        );
        $this->assertEquals(
            $addressArray['houseNumber'],
            $address->getHouseNumber()
        );
        $this->assertEquals(
            $addressArray['apartmentNumber'],
            $address->getApartmentNumber()
        );
        $this->assertEquals(
            $addressArray['city'],
            $address->getCity()
        );
        $this->assertEquals(
            $addressArray['zipCode'],
            $address->getZipCode()
        );

        $this->assertEquals(
            $addressArray['country'],
            $address->getCountry()
        );

        $this->assertEquals(
            $addressArray['countryCode'],
            $address->getCountryCode()
        );

        $this->assertEquals(
            $addressArray['contactPerson'],
            $address->getContactPerson()
        );

        $this->assertEquals(
            $addressArray['email'],
            $address->getEmail()
        );

        $this->assertEquals(
            $addressArray['phone'],
            $address->getPhone()
        );
    }

    public function testAddressFromArray()
    {
        $address = $this->getAddressMock();
        $addressArray = $this->addressArray;

        $address->setFromArray($addressArray);
        $this->assertEquals(
            $addressArray['firstName'],
            $address->getFirstName()
        );
        $this->assertEquals(
            $addressArray['surname'],
            $address->getSurname()
        );
        $this->assertEquals(
            $addressArray['fullName'],
            $address->getFullName()
        );
        $this->assertEquals(
            $addressArray['address'],
            $address->getAddress()
        );
        $this->assertEquals(
            $addressArray['street'],
            $address->getStreet()
        );
        $this->assertEquals(
            $addressArray['houseNumber'],
            $address->getHouseNumber()
        );
        $this->assertEquals(
            $addressArray['apartmentNumber'],
            $address->getApartmentNumber()
        );
        $this->assertEquals(
            $addressArray['city'],
            $address->getCity()
        );
        $this->assertEquals(
            $addressArray['zipCode'],
            $address->getZipCode()
        );

        $this->assertEquals(
            $addressArray['country'],
            $address->getCountry()
        );

        $this->assertEquals(
            $addressArray['countryCode'],
            $address->getCountryCode()
        );

        $this->assertEquals(
            $addressArray['contactPerson'],
            $address->getContactPerson()
        );

        $this->assertEquals(
            $addressArray['email'],
            $address->getEmail()
        );

        $this->assertEquals(
            $addressArray['phone'],
            $address->getPhone()
        );
    }
}
