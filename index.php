<?php include('db.php'); ?>


<?php
// $sales = all('sales');
// dd($sales);
// $items = all('items');
// dd($items);
// $salesquantity = all('sales', "where quantity >= 2");
// dd($salesquantity);

// $salesid2 = find('sales', "2");
// dd($salesid2);
// $item1 = find('items', ['name'=>'紅茶','price'=>15 ]);
// dd($item1);
// $all = q("SELECT name, price FROM items ORDER BY price");
// dd($all);

// $row=find('items',5);
// dd($row);
// var_dump($row);
// $row['cost']=15;
// $row['price']=45;
// dd($row);
// $update1 = update("items", $row);

$data = [
    // 'id' => 9,
    'name' => '青醬雞肉可頌',
    'cost' => 50,
    'stock' => 500,
    'price' => 65
];
save('items', $data);
?>

