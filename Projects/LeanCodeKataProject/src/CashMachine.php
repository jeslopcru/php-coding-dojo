<?php
namespace LeanCodeKataProject;

class CashMachine
{
    protected $productPrices = [
        'apple' => 100,
        'cherry' => 75,
        'banana' => 150,
        'manzana' => 100,
        'apfel' => 100,

    ];

    protected $alternativeNames = [
    ];

    protected $productList = [];

    public function add($name)
    {
        $this->productList[] = $name;

    }

    public function total()
    {
        $total = 0;
        foreach ($this->productList as $productName) {
            $total += $this->productPrices[$productName];
        }
        $discout = $this->discount();
        return $total - $discout;
    }

    /**
     * @param $lastItemWas
     * @param $productName
     * @param $discout
     * @return int
     */
    private function discount()
    {
        return $this->cherryDiscount() +
            $this->bananaDiscount() +
            $this->apfelDiscount() +
            $this->manzanaDiscount()+
        $this->anyKindOfAppleDiscount();
    }

    /**
     * @param $product
     * @return int
     */
    private function numOf($product)
    {
        $numOfCherry = 0;
        foreach ($this->productList as $productName) {
            if ($productName == $product) {
                $numOfCherry++;
            }
        }
        return $numOfCherry;
    }

    /**
     * @return float
     */
    private function cherryDiscount()
    {
        $numOfCherry = $this->numOf('cherry');

        $discount = floor($numOfCherry / 2) * 20;
        return $discount;
    }

    private function bananaDiscount()
    {
        $numBananas = $this->numOf('banana');
        $discount = floor($numBananas / 2) * $this->productPrices['banana'];
        return $discount;
    }

    private function normalize($name)
    {
        return isset($this->alternativeNames[$name]) ? $this->alternativeNames[$name] : $name;
    }

    private function apfelDiscount()
    {
        $numOfManzanas = $this->numOf('apfel');
        $discount = floor($numOfManzanas / 2) * 150;
        return $discount;
    }

    private function manzanaDiscount()
    {
        $name = 'manzana';
        $discountProduct = 100;
        $numberOfSameItems = 3;
        $numOfManzanas = $this->numOf($name);
        $discount = floor($numOfManzanas / $numberOfSameItems) * $discountProduct;
        return $discount;
    }

    private function anyKindOfAppleDiscount()
    {
        $numOfManzanas = $this->numOf('manzana') + $this->numOf('apple') + $this->numOf('apfel');
        $discount = floor($numOfManzanas / 4) * 100;
        return $discount;

    }
}
