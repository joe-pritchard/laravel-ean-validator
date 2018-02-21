<?php
declare(strict_types=1);
/**
 * EanValidatorRuleRule.php
 *
 * @project  LaravelEanValidator
 * @category JoePritchard\LaravelEanValidator
 * @author   Joe Pritchard <joe@joe-pritchard.uk>
 *
 * Created:  21/02/2018 11:19
 *
 */

namespace JoePritchard\LaravelEanValidator;

use Illuminate\Support\Str;
use JoePritchard\LaravelEanValidator\Exceptions\EanValidatorException;


/**
 * Class EanValidator
 *
 * @package JoePritchard\LaravelEanValidator
 */
class EanValidator
{
    /**
     * Determine if the value is a valid EAN
     * @static function validate
     *
     * @param $value
     *
     * @return bool
     * @throws EanValidatorException
     */
    public static function validate($value): bool
    {

        // EANs are either eight or thirteen chars long and only contain numbers
        if (!preg_match('/^[0-9]{8}$|^[0-9]{13}$/', $value)) {
            return false;
        }

        $length = Str::length($value);

        // Okay its the right length, pop off the check digit so we can look only at the data portion separately
        $data        = Str::substr($value, 0, $length - 1);
        $check_digit = (int)Str::substr($value, $length - 1);

        // if the check digit is correct, we can accept the value :)
        return self::calculateCheckDigit($data) === $check_digit;
    }

    /**
     * Calculate an EAN check digit given a 7 or 12 character string of digits
     *
     * @static function calculateCheckDigit
     *
     * @param string $data
     *
     * @return int
     * @throws EanValidatorException
     */
    private static function calculateCheckDigit(string $data): int
    {
        if (!preg_match('/^[0-9]{7}$|^[0-9]{12}$/', $data)) {
            throw new EanValidatorException('Invalid data format, unable to calculate check digit for \'' . $data . '\'');
        }

        // build a sum by adding digit * 3 if in odd position, or just the value of digit if in even position
        $check_sum = 0;
        foreach (str_split($data) as $index => $digit) {
            if ((int)$digit > 0) {
                $check_sum += $index % 2 === 0 ? (int)$digit : (int)$digit * 3;
            }
        }

        // subtract this sum from the next multiple of ten and that's your check digit!
        return ((int)ceil($check_sum / 10) * 10) - $check_sum;
    }
}