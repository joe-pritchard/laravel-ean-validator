# Ean Validator #

Simple validator to check for correctly formatted EAN barcodes. Will pass for EAN8 and EAN13 codes

### Installation ###

`composer require joepritchard/laravel-ean-validator`

### Usage ###

In a controller you can use the class as a validator rule like this: 

```
$this->validate($request, [
	'ean' => ['required', new JoePritchard\LaraveEanValidator],
])
```