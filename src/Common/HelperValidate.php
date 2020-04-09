<?php

namespace Sylapi\Courier\Common;

class HelperValidate
{
    static function validateAddress($data)
    {
        $errors = [];

        if (!empty($data)) {
            if (!self::validateName($data['name'])) {
                $errors[] = 'Name is not valid';
            }
            if (!self::validateCompany($data['company'])) {
                $errors[] = 'Company is not valid';
            }
            if (!self::validateStreet($data['street'])) {
                $errors[] = 'Street is not valid';
            }
            if (!self::validatePostcode($data['postcode'])) {
                $errors[] = 'Postcode is not valid';
            }
            if (!self::validatePostcode($data['city'])) {
                $errors[] = 'City is not valid';
            }
            if (!self::validateCountry($data['country'])) {
                $errors[] = 'Country is not ISO';
            }
            if (!self::validatePhone($data['phone'])) {
                $errors[] = 'Phone is not valid';
            }
            if (!self::validateEmail($data['email'])) {
                $errors[] = 'Email is not valid';
            }
        }
        else {
            $errors[] = 'Address is empty';
        }

        if (!empty($errors)) {
            return $errors;
        }
        else {
            return true;
        }
    }

    static function validateName($name) {

        $explode = explode(' ', trim($name));

        if (!empty($name) && strlen($name) >= 3 && count($explode) >= 2) {
            return true;
        }
        return false;
    }

    static function validateCompany($company) {

        if (!empty($company)) {
            if (strlen($company) >= 3) {
                return true;
            }
            return false;
        }
        return true;
    }

    static function validateStreet($street) {

        preg_match('!\d+!', $street, $is_number);
        $explode = explode(' ', trim($street));

        if (!empty($street) && strlen($street) >= 3 && !empty($is_number) && count($explode) >= 2) {
            return true;
        }
        return false;
    }

    static function validatePostcode($postcode) {

        if (!empty($postcode) && strlen($postcode) >= 5) {
            return true;
        }
        return false;
    }

    static function validateCountry($country) {

        if (!empty($country) && strlen($country) == 2) {
            return true;
        }
        return false;
    }

    static function validatePhone($phone) {

        if (!empty($phone) && (int)$phone >= 5) {
            return true;
        }
        return false;
    }

    static function validateEmail($email) {

        if (!empty($email) && strlen($email) >= 3 && strstr($email, '@') && strstr($email,'.')) {
            return true;
        }
        return false;
    }
}