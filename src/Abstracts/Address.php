<?php

declare(strict_types=1);

namespace Sylapi\Courier\Abstracts;

use Sylapi\Courier\Contracts\Address as AddressContract;
use Sylapi\Courier\Traits\Validatable;

abstract class Address implements AddressContract
{
    use Validatable;
    
    private $firstName;
    private $surname;
    private $fullName;
    private $address;
    private $street;
    private $houseNumber;
    private $apartmentNumber;
    private $city;
    private $zipCode;
    private $country;
    private $countryCode;
    private $contactPerson;
    private $email;
    private $phone;

    public function setFromArray(array $address = []): AddressContract
    {
        foreach ($address as $key => $value) {
            if (property_exists(__CLASS__, $key)) {
                $this->{$key} = $value;
            }
        }

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): AddressContract
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): AddressContract
    {
        $this->surname = $surname;

        return $this;
    }

    public function setFullName(string $fullName): AddressContract
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName ?? (($this->firstName && $this->surname) ? ($this->firstName.' '.$this->surname) : '');
    }

    public function getAddress(): ?string
    {
        return $this->address ??
            trim($this->street.' '.$this->houseNumber.' '.$this->apartmentNumber);
    }

    public function setAddress(string $address): AddressContract
    {
        $this->address = $address;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): AddressContract
    {
        $this->street = $street;

        return $this;
    }

    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber): AddressContract
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    public function getApartmentNumber(): ?string
    {
        return $this->apartmentNumber;
    }

    public function setApartmentNumber(string $apartmentNumber): AddressContract
    {
        $this->apartmentNumber = $apartmentNumber;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): AddressContract
    {
        $this->city = $city;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): AddressContract
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): AddressContract
    {
        $this->country = $country;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): AddressContract
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getContactPerson(): ?string
    {
        return $this->contactPerson;
    }

    public function setContactPerson(string $contactPerson): AddressContract
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): AddressContract
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): AddressContract
    {
        $this->phone = $phone;

        return $this;
    }

    public function toArray(): array
    {
        $arr = get_object_vars($this);
        $arr['fullName'] = $this->getFullName();
        $arr['address'] = $this->getAddress();
        unset($arr['errors']);
        return $arr;
    }
}
