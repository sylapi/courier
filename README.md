# Sylapi/Courier

**Courier library**

## Installation

Courier to install, simply add it to your `composer.json` file:

```json
{
    "require": {
        "sylapi/courier": "~1.0"
    }
}
```


## Wstępne sprawdzanie adresów przesyłki:
```php

$courier = new Courier('GLS');

$courier->sandbox(true);
$courier->setLogin('123456');
$courier->setPassword('abc12345def');

$address = [
    'name' => 'Name Lastname',
    'company' => 'Company Name',
    'street' => 'Street 123/2A',
    'postcode' => '12-123',
    'city' => 'Warszawa',
    'country' => 'PL',
    'phone' => '602602602',
    'email' => 'name@example.com'
];

$courier->setSender($address);
$courier->setReceiver($address);

$courier->setOptions([
        'weight' => 3.00,
        'width' => 30.00,
        'height' => 50.00,
        'depth' => 10.00,
        'amount' => 2390.10,
        'cod' => true,
        'saturday' => false,
        'custom' => [
            'parcel_cost' => 8,
        ],
        'references' => 'order #4567',
        'note' => 'Note'
    ]);
```

## Walidacja danych

```php

$courier->validateAddress('sender')
$courier->validateAddress('receiver');
$validateData = $courier->validateData();

```

## Dane do przesyłki i generowanie etykiery:
```php

if ($validateData->isSuccess()) {
    $package = $courier->CreatePackage();
    if ($package->isSuccess()) {
    
        $result = $package->getResponse();
    }
}
    
```

## Pobranie etykiety
```php

$label = $courier->getLabel([
    'tracking_id' => $result['tracking_id'],
    'custom_id' => $result['custom_id'],
    'format' => 'A6'
]);

$tracking_label = $label->getResponse();

```
