<?php
namespace LeanCodeKataProject\Test;

use LeanCodeKataProject\CashMachine;

class CashMachineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function the_total_cost_when_empty_is_0()
    {
        $cashMachine = new CashMachine();
        $this->assertEquals(0, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_an_apple_then_totalcost_is_100()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('apple');
        $this->assertEquals(100, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_two_cherrys_has_a_20_cents_of_discount()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('cherry');
        $cashMachine->add('cherry');
        $this->assertEquals(130, $cashMachine->total());

    }
    /**
     * @test
     */
    public function when_two_cherrys_and_other_product_name_has_a_20_cents_of_discount()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('cherry');
        $cashMachine->add('apple');
        $cashMachine->add('cherry');
        $this->assertEquals(230, $cashMachine->total());

    }

    /**
     * @test
     */
    public function when_two_banana_has_a_banana_free()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('banana');
        $cashMachine->add('banana');
        $this->assertEquals(150, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_apple_or_sinonym_result_is_the_same()
    {
        $this->markTestSkipped('ya no es necesario');
        $cashMachine = new CashMachine();
        $cashMachine->add('apple');
        $cashMachine->add('manzana');
        $this->assertEquals(200, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_two_apples_total_150()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('apfel');
        $cashMachine->add('apfel');
        $this->assertEquals(50, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_three_manzanas_total_150()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('manzana');
        $cashMachine->add('manzana');
        $cashMachine->add('manzana');
        $this->assertEquals(200, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_four_manzanas_or_any_kind()
    {
        $cashMachine = new CashMachine();
        $cashMachine->add('apfel');
        $cashMachine->add('manzana');
        $cashMachine->add('manzana');
        $cashMachine->add('apple');
        $this->assertEquals(300, $cashMachine->total());
    }

    /**
     * @test
     */
    public function when_add_five_fruits_discount_two_euros()
    {
        $this->markTestIncomplete('Finalizada la kata');
        $cashMachine = new CashMachine();
        $cashMachine->add('apple');
        $cashMachine->add('apfel');
        $cashMachine->add('manzana');
        $cashMachine->add('manzana');
        $cashMachine->add('apfel');
        $this->assertEquals(150, $cashMachine->total());
    }



}
