<?php

$e = array(
    "Orange",
    "apple",
    "Banana",
    "Blackberries",
    "bean",
    "Blueberry",
    "Carrot",
    "Cherry",
    "Corn",
    "Cucumber",
    "cinnamon",
    "cauliflower",
    "Grapefruit",
    "Lemon",
    "Mandarin",
    "strawberry",
    "Mushrooms",
    "Nuts",
    "Olive",
    "Onion",
    "Olives",
    "Peach",
    "Pear",
    "peas",
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
    "Nectarine",
    "kiwi"
    );
$m = array(
    "Avocado",
    "Asparagus",
    "Barberry",
    "Blackberries",
    "Blueberries",
    "Broccoli",
    "Cabbage",
    "Coconuts",
    "Cranberries",
    "coriander",
    "cauliflower",
    "Cashew",
    "Clementine",
    "cinnamon",
    "Dates",
    "Eggplant",
    "Garlic",
    "Ginger",
    "Jalapeno",
    "Lettuce",
    "lentil",
    "oregano",
    "Olives",
    "Raisin",
    "Raspberries",
    "rosemary",
    "Spinach",
    "Tangerines",
    "Beets",
    "Mango",
    "Mulberries",
    "Iceberg Lettuce",
    "Hazelnut",
    "Pepino",
    "peas",
    "Walnut",
    "Guacamole",
    "Grapefruit",
    "Lime",
    "leek",
    "Coffee",
    "Kale",
    "kiwi"
);
$h = array(
    "Asparagus",
    "Apricots",
    "Basil",
    "Cacao",
    "coriander",
    "Cranberry",
    "Guava",
    "Kale",
    "Mango",
    "Mint",
    "Mulberries",
    "Pomelo",
    "rosemary",
    "oregano",
    "Papaya",
    "Quinoa",
    "Radish",
    "Raspberries",
    "Vanilla",
    "Zucchini",
    "Parsnips",
    "Cauliflower",
    "Wasabi",
    "Rhubarb",
    "Turnips",
    "Kaki",
    "Fig",
    "Mustard",
    "lentil",
    "leek",
    "kiwi"
);

$xml = new SimpleXMLElement('<xml/>');

$easy = $xml->addChild('easy');
foreach ($e as $fruit){
    $easy->addChild('element', strtolower($fruit));
}

$medium = $xml->addChild('medium');
foreach ($m as $fruit){
    $medium->addChild('element', strtolower($fruit));
}

$hard = $xml->addChild('hard');
foreach ($h as $fruit){
    $hard->addChild('element', strtolower($fruit));
}

//Header('Content-type: text/xml');
print($xml);
$xml->saveXML("fruitsAndVeggies.xml");