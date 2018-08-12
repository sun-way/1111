<?php
namespace example;

class Order extends Basket
{
    public function __construct ($a)
    {
        $this->productInBasket=$a;
    }

    public function getOrder()
    {
        $p1=[];
        foreach ($this->productInBasket as $i=>$val)
        {
            if ($val!=0)
            {
                if ($this->productInBasket[$i]["quantity"]>0)
                   {
                        $p1[$i]=$this->productInBasket[$i]['product'];
                        echo'<br>---------------------------<br>';
                        echo "__Вы заказали " .$p1[$i]->getName();
                        echo " в количестве " . $this->productInBasket[$i]["quantity"] . " единиц.<br>";
                        echo "Итого: " . $p1[$i]->getPrice()*$this->productInBasket[$i]["quantity"]." р."."<br>";
                        echo " (при цене " . $p1[$i]->getPrice()." рублеи за штуку)";
                   }
                else
                  //  if ($this->productInBasket[$i]["quantity"]<=0)
                    {
                        echo " плохая сумма заказа. мы не  сделаем заказ<br>";
                        die();
                    }
            }

        }
        echo'<br>---------------------------<br>';
        echo ' Итого:<br>';
        echo $this->getPriceFromBasket();
        echo '<br><br>!!!!!Ожидайте, с вами свяжется наш менеджер чуть позже для уточнения деталей заказа!!!!!';
    }
}