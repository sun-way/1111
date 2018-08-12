<?php
namespace example;
// исключения ошибки заказа
class ControlException extends \Exception
{
    const NO_QUANTITY = 1;
    const OTR_QUANTITY = 1;
}