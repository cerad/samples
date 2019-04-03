<?php
declare(strict_types=1);

// https://www.schmengler-se.de/en/2017/04/php-7-type-safe-arrays-of-objects/

class Item
{
    public $id;
    public $name;

    public function __construct($id,$name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
class Items extends ArrayIterator
{
    public function __construct(array $items = null)
    {
        parent::__construct($items);
    }
    public function current() : Item
    {
        return parent::current();
    }
    public function offsetGet($offset) : Item
    {
        return parent::offsetGet($offset);
    }
}
$itemArray = [
    new Item(10,"ten"),
    new Item(20, "twenty"),
    new Item(30, "thirty"),
];
$items = new Items($itemArray);
$items[] = new Item(40,"forty");
foreach($items as $item) {
    echo $item->id . '  ' . $item->name . "\n";
}
printf("Items Count %d\n",count($items));

$item = $items[2];
printf("Item %d %s\n",$item->id,$item->name);
