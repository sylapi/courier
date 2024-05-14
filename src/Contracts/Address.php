<?php

declare(strict_types=1);

namespace Sylapi\Courier\Contracts;

interface Address extends Validatable
{
    public function setFirstName(string $firstName): self;

    public function getFirstName(): ?string;

    public function setSurname(string $surname): self;

    public function getSurname(): ?string;

    public function setFullName(string $fullName): self;

    public function getFullName(): ?string;

    public function setAddress(string $address): self;

    public function getAddress(): ?string;

    public function setStreet(string $street): self;

    public function getStreet(): ?string;

    public function setHouseNumber(string $houseNumber): self;

    public function getHouseNumber(): ?string;

    public function setApartmentNumber(string $apartmentNumber): self;

    public function getApartmentNumber(): ?string;

    public function setCity(string $city): self;

    public function getCity(): ?string;

    public function setZipCode(string $zipCode): self;

    public function getZipCode(): ?string;

    public function setProvince(string $province): self;

    public function getProvince(): ?string;

    public function setCountry(string $country): self;

    public function getCountry(): ?string;

    public function setCountryCode(string $countryCode): self;

    public function getCountryCode(): ?string;

    public function setContactPerson(string $contactPerson): self;

    public function getContactPerson(): ?string;

    public function setEmail(string $email): self;

    public function getEmail(): ?string;

    public function setPhone(string $phone): self;

    public function getPhone(): ?string;

    public function toArray(): array;
}
