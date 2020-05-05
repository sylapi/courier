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


## Utworzenie obiektu i autoryzacja

```php

$courier = new Courier('GLS');

$courier->sandbox(true);
$courier->setLogin('123456');
$courier->setPassword('abc12345def');

```

## Wybór dostawdy w przypadku pośrednika przesyłek
Gdy korzystamy z pośrednika np. Olza, należy przekazać nazwę przewoźnika, który ma dostarczyć przesyłkę.
W innych wypadakch poniższy parametr nie jest wymagany.
```php

$courier->setProvider('GLS');

```

## Adres wysyłkowy, dostawy oraz parametry przesyłki

```php

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

## Walidacja danych
Istnieje możliwość weryfikacji poprawności wczytanych adresów.

```php

$courier->validateAddress('sender')
$courier->validateAddress('receiver');
$validateData = $courier->validateData();

```

## Podanie danych o przesyłce oraz opcje dodatkowe
Wszystkie wymiary paczki podawane są w centymetrach, waga w kilogramach.
Paramtery "custom", są niestandardowymi danymi, które są potrzebne do obsługi wybranego dostawcy.

```php

$courier->setOptions([
        'weight' => 3.00,
        'width' => 30.00,
        'height' => 50.00,
        'depth' => 10.00,
        'amount' => 2390.10,
        'cod' => true,
        'custom' => [
            'parcel_cost' => 8,
        ],
        'references' => 'order #4567',
        'note' => 'Note'
    ]);
    
    
$courier->setParcelShop('ZGO01N');

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
