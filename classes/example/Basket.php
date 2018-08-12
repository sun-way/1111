<?php
namespace example;
class Basket extends Product
{
    public $productInBasket = [];
    protected $totalPrice = 0;
    protected $totalProductPositions = 0;
    protected $totalProductQuantity = 0;
    public function putInBasket($product, $val,$i)
    {
        $this->productInBasket[$i]["product"]=$product;
        $this->productInBasket[$i]["quantity"]=$val;
    }

    public function getPriceFromBasket()
    {
        $p = [];
        foreach ($this->productInBasket as $i=>$val)
        {   $p[$i]=0;
            $p[$i]=$this->productInBasket[$i]['product'];
            $this->totalPrice =  $this->totalPrice +$p[$i]->getPrice() * $this->productInBasket[$i]['quantity'];
        }
        echo "Общая сумма заказа ".$this->totalPrice." рублей.";
    }
    public function getInfo()
    {
        $p1 = [];
        foreach ($this->productInBasket as $i=>$value)
        { $p1[$i]=$this->productInBasket[$i]['product'];
            echo " -- этот товар " . $p1[$i]->getName();
            echo " по цене " . $p1[$i]->getPrice() . " рублей за штуку";
            echo " в количестве " . $this->productInBasket[$i]['quantity'] . " единиц.<hr>";

        }
        $this->getPriceFromBasket();
    }
    public static function removeProduct()
    {
        setcookie('cook', "", time() - 3600);
        header("refresh:5; url=index.php");
        exit("Ваша корзина очищена, вы будете перенаправлены на главную страницу магазина через 5 секунд");
    }
}


