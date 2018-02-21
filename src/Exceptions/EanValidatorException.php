<?php
declare(strict_types=1);
/**
 * EanValidatorException
 *
 * @project  LaravelEanValidator
 * @category JoePritchard\LaravelEanValidator
 * @author   Joe Pritchard <joe@joe-pritchard.uk>
 *
 * Created:  21/02/2018 11:44
 *
 */

namespace JoePritchard\LaravelEanValidator\Exceptions;


/**
 * Class EanValidatorException
 *
 * @package JoePritchard\LaravelEanValidator\Exceptions
 */
class EanValidatorException extends \Exception
{

    /**
     * EanValidatorException constructor.
     */
    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}