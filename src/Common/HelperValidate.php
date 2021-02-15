<?php

namespace Sylapi\Courier\Common;

/**
 * Class HelperValidate.
 */
class HelperValidate
{
    /**
     * @param $data
     *
     * @return array|bool
     */
    public static function validateAddress($data)
    {
        $errors = [];

        if (!empty($data)) {
            if (!self::validateName($data['name'])) {
                $errors[] = 'Name is not valid';
            }
            if (isset($data['company']) && !self::validateCompany($data['company'])) {
                $errors[] = 'Company is not valid';
            }
            if (!self::validateStreet($data['street'])) {
                $errors[] = 'Street is not valid';
            }
            if (!self::validatePostcode($data['postcode'])) {
                $errors[] = 'Postcode is not valid';
            }
            if (!self::validateCity($data['city'])) {
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
        } else {
            $errors[] = 'Address is empty';
        }

        if (!empty($errors)) {
            return $errors;
        } else {
            return true;
        }
    }

    /**
     * @param $name
     *
     * @return bool
     */
    public static function validateName($name)
    {
        $explode = explode(' ', trim($name));

        if (!empty($name) && strlen($name) >= 3 && count($explode) >= 2) {
            return true;
        }

        return false;
    }

    /**
     * @param $company
     *
     * @return bool
     */
    public static function validateCompany($company)
    {
        if (!empty($company)) {
            if (strlen($company) >= 3) {
                return true;
            }

            return false;
        }

        return true;
    }

    /**
     * @param $street
     *
     * @return bool
     */
    public static function validateStreet($street)
    {
        preg_match('!\d+!', $street, $is_number);
        $explode = explode(' ', trim($street));

        if (!empty($street) && strlen($street) >= 3 && !empty($is_number) && count($explode) >= 2) {
            return true;
        }

        return false;
    }

    /**
     * @param $postcode
     *
     * @return bool
     */
    public static function validatePostcode($postcode)
    {
        if (!empty($postcode) && strlen($postcode) >= 5) {
            return true;
        }

        return false;
    }

    /**
     * @param $postcode
     *
     * @return bool
     */
    public static function validateCity($postcode)
    {
        if (!empty($postcode) && strlen($postcode) >= 3) {
            return true;
        }

        return false;
    }

    /**
     * @param $country
     *
     * @return bool
     */
    public static function validateCountry($country)
    {
        if (!empty($country) && strlen($country) == 2) {
            return true;
        }

        return false;
    }

    /**
     * @param $phone
     *
     * @return bool
     */
    public static function validatePhone($phone)
    {
        if (!empty($phone) && (int) $phone >= 5) {
            return true;
        }

        return false;
    }

    /**
     * @param $email
     *
     * @return bool
     */
    public static function validateEmail($email)
    {
        if (!empty($email) && strlen($email) >= 3 && strstr($email, '@') && strstr($email, '.')) {
            return true;
        }

        return false;
    }
}
