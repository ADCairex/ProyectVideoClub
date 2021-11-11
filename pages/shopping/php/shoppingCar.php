<?php
    include '../../base/utils/sqlFunctions.php';
    include '../../base/utils/utils.php';

    try {
        //Request a idProduct parameter in POST
        $idProduct = $_POST['idProduct'];
        //Request a quantity parameter in POST
        $quantity = intval($_POST['quantity']);
        //Call Array with the parameters with idProduct
        $productData = getProductData($idProduct);
        //Call the author with getUserData
        $author = getUserData($productData['idAuthor']);
        
        if (!isset($_COOKIE['shopCar'])) {
            $totalPrice = $quantity * $productData['price'];
            $shopCarArray = [
                'lines' => [
                    [
                        'idProduct' => $productData['idProduct'],
                        'name' => $productData['name'],
                        'author' => $author['username'],
                        'price' => floatval($productData['price']),
                        'routProduct' => $productData['routProduct'],
                        'quantity' => $quantity,
                        'linePrice' => $quantity * $productData['price']
                    ]
                ],
                'totalPrice' => $totalPrice
            ];

            setcookie('shopCar', json_encode($shopCarArray, true), time() + 3600);
        } else {
            $shopCarArray = json_decode($_COOKIE['shopCar']);

            $found = false;

            foreach ($shopCarArray->lines as $i) {
                if (strcmp($i->idProduct, $idProduct) === 0) {
                    $i->quantity += $quantity;
                    $shopCarArray->totalPrice += $quantity * $i->price;
                    $i->linePrice = $i->quantity * $i->price;
                    

                    $found = true;
                    break;
                }
            }

            if (!$found) {

                $newProduct = [
                    'idProduct' => $productData['idProduct'],
                    'name' => $productData['name'],
                    'author' => $author['username'],
                    'price' => $productData['price'],
                    'routProduct' => $productData['routProduct'],
                    'quantity' => $quantity,
                    'linePrice' => $quantity * $productData['price']
                ];

                array_push($shopCarArray->lines, $newProduct);
                $shopCarArray->totalPrice += $newProduct['price'] * $newProduct['quantity'];
            }

            setcookie('shopCar', json_encode($shopCarArray, true), time() + 3600);
        }

        echo getResponse('OK', 'Agregado correctamente');
    } catch (Exception $e) {
        echo getResponse('KO', 'Error no se ha añadido la cookie');
    }
?>