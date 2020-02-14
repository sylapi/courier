<?php

namespace Sylapi\Courier;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class ValidateDataTest extends PHPUnitTestCase
{
    public function testValidateAddressCorrect()
    {
        $address = [
            'name' => 'Name Username',
            'company' => '',
            'street' => 'Street 1',
            'postcode' => '12-123',
            'city' => 'Warszawa',
            'country' => 'PL',
            'phone' => '600600600',
            'email' => 'name@example.com'
        ];

        $courier = new Courier('GLS');
        $courier->setSender($address);
        $courier->setReceiver($address);

        $this->assertNull($courier->getError());

        $this->assertSame($address['name'], $courier->getParameter(['sender', 'name']));
        $this->assertSame($address['street'], $courier->getParameter(['sender', 'street']));
        $this->assertSame($address['postcode'], $courier->getParameter(['sender', 'postcode']));
        $this->assertSame($address['city'], $courier->getParameter(['sender', 'city']));

        $this->assertSame($address['name'], $courier->getParameter(['receiver', 'name']));
        $this->assertSame($address['street'], $courier->getParameter(['receiver', 'street']));
        $this->assertSame($address['postcode'], $courier->getParameter(['receiver', 'postcode']));
        $this->assertSame($address['city'], $courier->getParameter(['receiver', 'city']));
    }

    public function testValidateAddressNoCorrect()
    {
        $address = [
            'name' => 'Name',
        ];

        $courier = new Courier('GLS');
        $courier->setSender($address);
        $courier->setReceiver($address);

        $courier->validateAddress('sender');
        $courier->validateAddress('receiver');

        $this->assertSame($address['name'], $courier->getParameter(['sender', 'name']));
        $this->assertSame($address['name'], $courier->getParameter(['receiver', 'name']));

        $this->assertNotNull($courier->getError());
        $this->assertSame($courier->getError()[0], 'Name is not valid');
    }

    public function testValidateOptions()
    {
        $options = [
            'weight' => 3.00,
            'width' => 30.00,
            'height' => 50.00,
            'depth' => 10.00,
            'amount' => 2.10,
            'bank_number' => '29100010001000100010001000',
            'cod' => false,
            'saturday' => false,
            'custom' => [
                'parcel_cost' => 8,
                'label_format' => 'one_label_on_a4_lb_pdf',
            ],
            'references' => 'order #1234',
            'note' => 'Note'
        ];

        $courier = new Courier('GLS');
        $courier->setOptions($options);

        $this->assertNull($courier->getError());

        $this->assertSame($options['weight'], $courier->getParameter(['options', 'weight']));
        $this->assertSame($options['width'], $courier->getParameter(['options', 'width']));
        $this->assertSame($options['height'], $courier->getParameter(['options', 'height']));
        $this->assertSame($options['bank_number'], $courier->getParameter(['options', 'bank_number']));
        $this->assertSame($options['amount'], $courier->getParameter(['options', 'amount']));
        $this->assertSame($options['custom']['label_format'], $courier->getParameter(['options', 'custom', 'label_format']));
        $this->assertSame($options['references'], $courier->getParameter(['options', 'references']));
    }
}