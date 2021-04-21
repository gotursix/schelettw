<?php

$e = array(
    "Orange",
    "apple",
    "Banana",
    "Blueberry",
    "Carrot",
    "Cherry",
    "Corn",
    "Cucumber",
    "Grapefruit",
    "Lemon",
    "Mandarin",
    "strawberry",
    "Mushrooms",
    "Nuts",
    "Olive",
    "Onion",
    "Peach",
    "Pear",
    "Peanut",
    "Peas",
    "Peppers",
    "Plum",
    "Pineapple",
    "Potato",
    "Pumpkin",
    "Raspberries",
    "Tomato",
    "Watermelon",
    "Kiwi",
    "Grapes",
    "Lime",
    "Coffee",
    "Nectarine"
    );
$m = array(
    "Avocado",
    "Asparagus",
    "Barberry",
    "Broccoli",
    "Cabbage",
    "Coconuts",
    "Cashew",
    "Clementine",
    "Dates",
    "Eggplant",
    "Garlic",
    "Ginger",
    "Jalapeno",
    "Lettuce",
    "Raisin",
    "Raspberries",
    "Spinach",
    "Tangerines",
    "Beets",
    "Mango",
    "Iceberg Lettuce",
    "Hazelnut",
    "Pepino",
    "Walnut",
    "Guacamole",
    "Lime",
    "Coffee",
    "Kale"
);
$h = array(
    "Apricots",
    "Basil",
    "Cacao",
    "Cranberry",
    "Dragon fruit",
    "Guava",
    "Kale",
    "Mango",
    "Mint",
    "Passion fruit",
    "Pomelo",
    "Papaya",
    "Quinoa",
    "Radish",
    "Sweet potato",
    "Vanilla",
    "Zucchini",
    "Parsnips",
    "Cauliflower",
    "Wasabi",
    "Guavas",
    "Rhubarb",
    "Turnips",
    "Cactus fruit",
    "Kaki",
    "Fig",
    "Breadfruit",
    "Mustard"
);



$xml = new SimpleXMLElement('<xml/>');

$easy = $xml->addChild('easy');
foreach ($e as $fruit){
    $easy->addChild('element', $fruit);
}

$medium = $xml->addChild('medium');
foreach ($m as $fruit){
    $medium->addChild('element', $fruit);
}

$hard = $xml->addChild('hard');
foreach ($h as $fruit){
    $hard->addChild('element', $fruit);
}

//Header('Content-type: text/xml');
print($xml);
$xml->saveXML("fruitsAndVegies.xml");