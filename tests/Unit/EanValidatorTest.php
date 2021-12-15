<?php
declare(strict_types=1);
/**
 * EanValidatorTest.php
 *
 * @project  LaravelEanValidator
 * @category JoePritchard\LaravelEanValidator\tests\Unit
 * @author   joe
 *
 * Created:  21/02/2018 11:13
 *
 */

namespace JoePritchard\LaravelEanValidator\Tests\Unit;

use JoePritchard\LaravelEanValidator\EanValidator;
use PHPUnit\Framework\TestCase;


/**
 * Class EanValidatorTest
 *
 * @package JoePritchard\LaravelEanValidator\tests\Unit
 */
class EanValidatorTest extends TestCase
{
    /**
     * @testdox Valid EAN-13: $ean
     * @dataProvider validEan13
     */
    public function testValidEan13(string $ean)
    {
        $this->assertTrue(EanValidator::validate($ean));
    }

    /**
     * @testdox Invalid EAN-13: $ean
     * @dataProvider invalidEan13
     */
    public function testInvalidEan13(string $ean)
    {
        $this->assertFalse(EanValidator::validate($ean));
    }

    /**
     * @testdox Valid EAN-8: $ean
     * @dataProvider validEan8
     */
    public function testValidEan8(string $ean)
    {
        $this->assertTrue(EanValidator::validate($ean));
    }

    /**
     * @testdox Invalid EAN-8: $ean
     * @dataProvider invalidEan8
     */
    public function testInvalidEan8(string $ean)
    {
        $this->assertFalse(EanValidator::validate($ean));
    }

    public function validEan13(): array
    {
        return [
            ['0262114594480'],
            ['1443791962727'],
            ['2155853023244'],
            ['3422028796838'],
            ['4281526638717'],
            ['5485439445939'],
            ['6027209713962'],
            ['7461549610830'],
            ['8775277792775'],
            ['9506302285967'],
            ['0633211537470'],
            ['9822704616421'],
            ['8249384968182'],
            ['5922825212343'],
            ['1324281427394'],
            ['4996152430535'],
            ['8516683734016'],
            ['6339589482247'],
            ['5481730180388'],
            ['8734196106599']
        ];
    }

    public function invalidEan13(): array
    {
        return [
            ['1262114594480'],
            ['1543791962727'],
            ['2165853023244'],
            ['3423028796838'],
            ['4281626638717'],
            ['5485438445939'],
            ['6027209714962'],
            ['7461549610831'],
            ['8775277792785'],
            ['9506302275967'],
            ['063321153747'],
            ['98227046164210'],
            ['8249384968082'],
            ['6921825212343'],
            ['2324281427395'],
            ['4996152431535'],
            ['8516683744016'],
            ['6339599482247'],
            ['458173018038z'],
            ['a734196106599']
        ];
    }

    public function validEan8(): array
    {
        return [
            ['02529417'],
            ['11557524'],
            ['21183591'],
            ['39008503'],
            ['43853960'],
            ['51987145'],
            ['69798047'],
            ['73160847'],
            ['86376068'],
            ['91204103'],
            ['46298430'],
            ['02481531'],
            ['79643702'],
            ['85535503'],
            ['82640774'],
            ['93334655'],
            ['87003536'],
            ['92601437'],
            ['78078048'],
            ['66999669'],
        ];
    }

    public function invalidEan8(): array
    {
        return [
            ['02529427'],
            ['11558524'],
            ['21283591'],
            ['49008503'],
            ['43873950'],
            ['53986145'],
            ['59798247'],
            ['73160848'],
            ['86376067'],
            ['91204204'],
            ['4629843'],
            ['024815310'],
            ['a9643702'],
            ['85535604'],
            ['92640776'],
            ['90334654'],
            ['86013535'],
            ['92602437'],
            ['79078048'],
            ['66998669'],
        ];
    }

}

