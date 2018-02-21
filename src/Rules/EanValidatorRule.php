<?php
declare(strict_types=1);
/**
 * EanValidatorRuleRule.php
 *
 * @project  LaravelEanValidator
 * @category JoePritchard\LaravelEanValidator\Rules
 * @author   Joe Pritchard <joe@joe-pritchard.uk>
 *
 * Created:  21/02/2018 11:17
 *
 */

namespace JoePritchard\LaravelEanValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use JoePritchard\LaravelEanValidator\EanValidator;
use JoePritchard\LaravelEanValidator\Exceptions\EanValidatorException;


/**
 * Class EanValidatorRule
 *
 * @package JoePritchard\LaravelEanValidator\Rules
 */
class EanValidatorRule implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        try {
            return EanValidator::validate($value);
        } catch (EanValidatorException $exception) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute is not a valid EAN code';
    }
}