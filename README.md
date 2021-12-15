# Ean Validator #

Simple validator to check for correctly formatted EAN barcodes. Will pass for EAN8 and EAN13 codes

### Installation ###

`composer require joe-pritchard/laravel-ean-validator`

### Usage ###

In a controller you can use the class as a validator rule like this: 

```
$this->validate($request, [
	'ean' => ['required', new JoePritchard\LaravelEanValidator\Rules\EanValidatorRule],
])
```

Or just call validate directly:

`JoePritchard\LaravelEanValidator\LaravelEanValidator::validate($value)`