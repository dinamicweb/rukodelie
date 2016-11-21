<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use DB;
use Storage;


class CartController extends Controller
{


    public function addProductCart(Request $request)
    {

        $product_id = $request->product_id;
        $count_product = $request->count_products;
        if (isset($request->units)) {
            $units_id = $request->units;
        } else {
            $units_id = $request->units_list;

        }

        $price = $request->price;
        $compare_price = $request->compare_price;
//        dd($request->colors_id);
        if (isset($request->colors_list)) {
            if ($request->colors_list == 0) {
                return response()->json(['success' => '0', 'error' => 'Выбирете цвет']);
            }
            $colors_id = $request->colors_list;
        } else {

            $colors_id = 0;

        }

//Если колличество 0 то ошибка
        if ($count_product == 0) {
            return response()->json(['success' => '0', 'error' => 'Вы не можете добавить 0 товаров']);
        }
//        Если единица изм. пуста то ошибка
        if (empty($units_id)) {
            return response()->json(['success' => '0', 'error' => 'Выбирете единицу измерения']);
        }


        if (Session::has('cart')) {

            if ($colors_id == 0) {
//                Ищем и проверяем товары по ед. измерения
                $cart = Session::get('cart');


//           проверим существует ли товар в корзине

                $product = $this->checkProductCart($product_id, $cart);

                if (count($product) == 0) {

                    $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);
                } else {


                    if (count($product) == 1) {
                        if ($product[0]['units_id'] == $units_id) {

//                    Выясняем номер в массиве товаров
                            $count = $this->PositionProductCartArray($product_id, $units_id, $cart);

                            $this->UpdateCountProductCart($count, $product_id, $units_id, $colors_id, $count_product);


                        } else {

                            $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);

                        }
                    } else {


                        $product = $this->ClearProductArray($product, $units_id);
                        if ($product[0]['units_id'] == $units_id) {

//                    Выясняем номер в массиве товаров
                            $count = $this->PositionProductCartArray($product_id, $units_id, $cart);

                            $this->UpdateCountProductCart($count, $product_id, $units_id, $colors_id, $count_product);


                        } else {

                            $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);

                        }

                    }

                }
            } else {
//            Если есть цвет то ед. измерения одна, а цветов может быть много ищем и проверяем по значению colors_id
//                проверим существует ли товар с таким цветом и ед. изм.

                $cart = Session::get('cart');
                $product = $this->checkProductCart($product_id, $cart);

                if (count($product) == 0) {

                    $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);

                } else {


                    if (count($product) == 1) {

                        if ($product[0]['colors_id'] == $colors_id) {

//                    Выясняем номер в массиве товаров
                            $count = $this->PositionProductCartArrayColors($product_id, $colors_id, $cart);

                            $this->UpdateCountProductCart($count, $product_id, $units_id, $colors_id, $count_product);


                        } else {

                            $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);

                        }
                    } else {


                        $product = $this->ClearProductArrayColors($product, $colors_id);
                        if ($product[0]['colors_id'] == $colors_id) {

//                    Выясняем номер в массиве товаров
                            $count = $this->PositionProductCartArrayColors($product_id, $colors_id, $cart);

                            $this->UpdateCountProductCart($count, $product_id, $units_id, $colors_id, $count_product);


                        } else {

                            $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);

                        }

                    }
                }


            }
        } else {
            $this->addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price);
        }

    }


    protected function ClearProductArray($product, $units_id)
    {

        $product_arr = [];
        $count = 0;
        foreach ($product as $p) {

            if ($p['units_id'] == $units_id) {

                array_push($product_arr, $product[$count]);
            }

            $count++;

        }

        return $product_arr;
    }


    protected function ClearProductArrayColors($product, $colors_id)
    {

        $product_arr = [];
        $count = 0;
        foreach ($product as $p) {

            if ($p['colors_id'] == $colors_id) {

                array_push($product_arr, $product[$count]);
            }

            $count++;

        }

        return $product_arr;
    }


    protected function PositionProductCartArray($id, $units_id, $cart)
    {
        $i = 0;
        $count = 0;
        foreach ($cart['products'] as $p) {
            if ($p['product_id'] == $id) {
                if ($p['units_id'] == $units_id) {
                    $count = $i;
                } else {

                }
            } else {

            }
            $i++;
        }
        return $count;
    }

    protected function PositionProductCartArrayColors($id, $colors_id, $cart)
    {
        $i = 0;
        $count = 0;
        foreach ($cart['products'] as $p) {
            if ($p['product_id'] == $id) {
                if ($p['colors_id'] == $colors_id) {
                    $count = $i;
                } else {

                }
            } else {

            }
            $i++;
        }
        return $count;

    }


    protected function checkProductCart($product_id, $cart)
    {
        $product = [];
        foreach ($cart['products'] as $p) {
            if ($p['product_id'] == $product_id) {
                array_push($product, $p);
            } else {

            }
        }


        return $product;
    }


    protected function UpdateCountProductCart($count, $product_id, $units_id, $colors_id, $count_product)
    {

        $cart = Session::get('cart');

//            Обновляем колличество товара, пересчитываем total товара, пересчитываем общее кол-во товаров, пересчитываем итого.
        $product_cart = $cart['products'][$count];
        $product_cart['count_product'] = $product_cart['count_product'] + $count_product; //новое кол-во
        $product_cart['total_product_price'] = $product_cart['price'] * $product_cart['count_product']; //новая цена итого за товар
        $cart['products'][$count] = $product_cart;
        $cart['count_products'] = $this->countProductsCart($cart['count_products'], $cart['products']);
        $cart['total_price_cart'] = $this->totalPriceProductsCart($cart['total_price_cart'], $cart['products']);
        $discont = $this->getDiscount();

        $cart['discont'] = $this->getTotalDiscount($discont, $cart);
        Session::put('cart', $cart);

    }

//    Создание новой корзины
    protected function createNewCart($product_id, $product_cart, $units_id)
    {
        $cart = [];
        $cart['products'] = [];
        array_push($cart['products'], $product_cart);

//        Вычислим сколько всего товаров в корзине
//        Раз корзины в сессии не существует значит колличество равно 0
        $count = 0;
        $cart['count_products'] = $this->countProductsCart($count, $cart['products']);

//      Тоже самое что и с колличеством делаем и Суммой итого
        $total_price = 0;
        $cart['total_price_cart'] = $this->totalPriceProductsCart($total_price, $cart['products']);
        $discont = $this->getDiscount();

        $cart['discont'] = $this->getTotalDiscount($discont, $cart);

        Session::put('cart', $cart);

        if (Session::has('cart')) {
            return response()->json(['success' => '1', 'message' => 'Корзина создана']);
        } else {
            return response()->json(['success' => '0', 'error' => 'Ошибка попробуйте позже']);
        }
    }

//Сумма итого за все товары в корзине
    protected function totalPriceProductsCart($total_price, $products)
    {
        $total_price = 0;
        foreach ($products as $p) {
            $total_price = $total_price + $p['total_product_price'];
        }
        return $total_price;
    }

//    Получение массива сумм для скидок

    protected function getDiscount()
    {
        $discount = DB::table('discount')->get();
        return $discount;
    }

    protected function getTotalDiscount($discount, $cart)
    {

        if (isset($cart['discont'])) {

            $discont = $cart['discont'];

        } else {
            $discont = [];
        }

        $min_discont = min($discount);
        $max_discont = max($discount);

        for ($i = 0; $i < count($discount); $i++) {
            $n = $i + 1;
            if ($cart['total_price_cart'] < $min_discont->discount) {
                $discont['total_discont'] = $min_discont->discount - $cart['total_price_cart']; //Осталось до скидки
                $discont['messages'] = 'Еще ' . $discont['total_discont'] . ' рублей до скидки ' . $discount[$i]->percelles . '%'; //сообщение  сколько осталось до скидки
                $discont['messages_basket'] = 'Еще ' . $discont['total_discont'] . ' рублей <br> до скидки ' . $discount[$i]->percelles . '%'; //сообщение  сколько осталось до скидки
                $discont['total_price_discont'] = $cart['total_price_cart']; //цена с учетом скидки
                $discont['message'] = ''; //сообщение;';

                break;
            } elseif ($cart['total_price_cart'] >= $max_discont->discount) {
                $discont['total_discont'] = 0; //Осталось до скидки
                $discont['messages'] = ''; //сообщение  сколько осталось до скидки
                $discont['messages_basket'] = ''; //сообщение  сколько осталось до скидки
                $discont['total_price_discont'] = $cart['total_price_cart'] - ($cart['total_price_cart'] * $max_discont->percelles / 100); //цена с учетом скидки
                $discont['message'] = '<span class="discount_cash">' . $discont['total_price_discont'] . ' рублей </span> с учётом скидки ' . $max_discont->percelles . '%'; //сообщение;';
                break;

            } elseif (($cart['total_price_cart'] >= $discount[$i]->discount) && ($discount[$n]->discount >= $cart['total_price_cart'])) {

                $discont['total_discont'] = $discount[$n]->discount - $cart['total_price_cart']; //Осталось до скидки

                if ($discont['total_discont'] == 0) {
                    $f = $n + 1;
                    $discont['total_discont'] = $discount[$f]->discount - $cart['total_price_cart']; //Осталось до скидки
                    $discont['messages'] = 'Еще ' . $discont['total_discont'] . ' рублей до скидки ' . $discount[$f]->percelles . '%'; //сообщение  сколько осталось до скидки
                    $discont['messages_basket'] = 'Еще ' . $discont['total_discont'] . ' рублей <br> до скидки ' . $discount[$f]->percelles . '%'; //сообщение  сколько осталось до скидки
                    $discont['total_price_discont'] = $cart['total_price_cart'] - ($cart['total_price_cart'] * $discount[$f]->percelles / 100); //цена с учетом скидки
                    $discont['message'] = '<span class="discount_cash">' . $discont['total_price_discont'] . ' рублей </span> с учётом скидки ' . $discount[$f]->percelles . '%'; //сообщение;';
                    break;
                } else {
                    $discont['total_discont'] = $discount[$n]->discount - $cart['total_price_cart']; //Осталось до скидки
                    $discont['messages'] = 'Еще ' . $discont['total_discont'] . ' рублей до скидки ' . $discount[$n]->percelles . '%'; //сообщение  сколько осталось до скидки
                    $discont['messages_basket'] = 'Еще ' . $discont['total_discont'] . ' рублей <br> до скидки ' . $discount[$n]->percelles . '%'; //сообщение  сколько осталось до скидки
                    $discont['total_price_discont'] = $cart['total_price_cart'] - ($cart['total_price_cart'] * $discount[$i]->percelles / 100); //цена с учетом скидки
                    $discont['message'] = '<span class="discount_cash">' . $discont['total_price_discont'] . ' рублей </span> с учётом скидки ' . $discount[$i]->percelles . '%'; //сообщение;';
                    break;
                }


            }


        }

        return $discont;
    }

    static function declension ($number, $one, $two, $five)
    {
        if (($number - $number % 10) % 100 != 10) {
            if ($number % 10 == 1) {
                $result = $one;
            } elseif ($number % 10 >= 2 && $number % 10 <= 4) {
                $result = $two;
            } else {
                $result = $five;
            }
        } else {
            $result = $five;
        }
        return $result;
    }

    public function DeleteProductCart(Request $request){

        $index_arr=$request->id;


        $cart=Session::get('cart');

        unset($cart['products'][$index_arr]);
        if(count($cart['products'])==0){

            Session::forget('cart');

            return response()->json(["success"=>2]);

        }else {
        $cart['count_products'] = $this->countProductsCart($cart['count_products'], $cart['products']);
        $cart['total_price_cart'] = $this->totalPriceProductsCart($cart['total_price_cart'], $cart['products']);
        $discont = $this->getDiscount();
        $cart['discont'] = $this->getTotalDiscount($discont, $cart);

            Session::put('cart', $cart);
        }
        return response()->json(["success"=>1, "cart"=>$cart, "id"=>$index_arr]);

    }



    protected function UpdateTotalPriceDiscount($total_price)
    {

        $discont = DB::table('discount')->where('discount', '>', $total_price)->orderBy('discount', 'asc')->get();

        dd($discont);
        $new_price = $total_price - ($total_price * $discont->percelles / 100);

        return $new_price;

    }

//Общее колличество товара в корзине
    protected function countProductsCart($count, $products)
    {
        $count = 0;
        foreach ($products as $p) {
            $count = $count + $p['count_product'];
        }
        return $count;
    }


//Добавление нового товара
    protected function addNewProductCart($product_id, $units_id, $count_product, $colors_id, $price, $compare_price)
    {
        $product_cart['product_id'] = $product_id;  //id товара
        $product_cart['units_id'] = $units_id; //ед. изм товара
        $product_cart['count_product'] = $count_product; //колличество товара
        $product_cart['colors_id'] = $colors_id; //колличество товара
        $product_cart['price'] = $price; //цена
        $product_cart['compare_price'] = $compare_price; //старая цена
        $product_cart['total_product_price'] = $price * $count_product; //Итого за данный товар
//        Проверяем существует ли корзина в сессии
        if (Session::has('cart')) {
//            если корзина есть в сессии то добавляем в массив новый товар  или обновляем колличество существующего
            $cart = Session::get('cart');
            array_push($cart['products'], $product_cart);

            $cart['count_products'] = $this->countProductsCart($cart['count_products'], $cart['products']);
            $cart['total_price_cart'] = $this->totalPriceProductsCart($cart['total_price_cart'], $cart['products']);

            $discont = $this->getDiscount();

            $cart['discont'] = $this->getTotalDiscount($discont, $cart);


            Session::put('cart', $cart);


        } else {
// Если корзина в сессии отсутствует то пользователь добавляет 1й раз и мы создаем для него корзину
            $this->createNewCart($product_id, $product_cart, $units_id);
        }
    }


//    Обновление колличества 1 товара из корзины

    public function UpdateProductCart(Request $request)
    {


        $product_id = $request->product_id;
        $units_id = $request->units_id;
        $colors_id = $request->colors_id;
        $count_products = $request->count_product;

        $cart = Session::get('cart');
         $id='';
        foreach ($cart['products'] as $i =>$product) {
            if (($cart['products'][$i]['product_id'] == $product_id) && ($cart['products'][$i]['units_id'] == $units_id) && ($cart['products'][$i]['colors_id'] == $colors_id)) {
                $id=$i;
                $cart['products'][$i]['count_product'] = $count_products;
                $cart['products'][$i]['total_product_price'] = $cart['products'][$i]['price'] * $cart['products'][$i]['count_product'];
            }
        }

        $cart['count_products'] = $this->countProductsCart($cart['count_products'], $cart['products']);
        $cart['total_price_cart'] = $this->totalPriceProductsCart($cart['total_price_cart'], $cart['products']);
        $discont = $this->getDiscount();

        $cart['discont'] = $this->getTotalDiscount($discont, $cart);

        Session::put('cart', $cart);

        return response()->json(["success" => 1, "count"=>$id,  'cart' => $cart]);

    }


    static function getStockProduct($product_id, $colors_id, $units_id)
    {

        if ($colors_id == 0) {

            $product = DB::table('variants_units')->where('product_id', $product_id)
                ->where('units_id', $units_id)
                ->first();
            $stock = $product->stock;


        } else {
            $product = DB::table('variants')->where('products_id', $product_id)
                ->where('color_id', $colors_id)
                ->first();
            $stock = $product->stock;


        }

        return $stock;

    }


    public function cart()
    {
        if(Session::has('cart')) {
            $cart = Session::get('cart');
        }else{
            $cart='';
        }

//        dd($cart);


        return view('cart', ['cart' => $cart]);
    }


}
