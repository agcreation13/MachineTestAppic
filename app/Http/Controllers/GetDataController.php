<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetDataController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function productList(Request $request)
    {
          $apiResponseProductslist = $this->client->request('GET', 'https://dummyjson.com/products?skip=0&limit=100');
        //   $apiResponseProductslist = $this->client->request('GET', 'https://dummyjson.com/products/');
        $dataProductslist = $apiResponseProductslist->getBody();
        $product = json_decode($dataProductslist);
        $productslist = $product->products;
         $apiResponseCategorylist = $this->client->request('GET', 'https://dummyjson.com/products/categories');
        $dataCategorylist = $apiResponseCategorylist->getBody();
        $categorylist = json_decode($dataCategorylist);

        return view('show', [
            'productslist' => $productslist,
            'categorylist' => $categorylist
        ]);
    }
               // searching category wise products  //
    public function categoryWiseProduct(Request $request){
            $apiResponseProductslist = $this->client->request('GET', 'https://dummyjson.com/products/category/'.$request->category);
            $dataProductslist = $apiResponseProductslist->getBody();
            $product = json_decode($dataProductslist);
            $productslist = $product->products;
            $apiResponseCategorylist = $this->client->request('GET', 'https://dummyjson.com/products/categories');
            $dataCategorylist = $apiResponseCategorylist->getBody();
            $categorylist = json_decode($dataCategorylist);
            return view('categoryData', [
                'productslist' => $productslist,
                'categorylist' => $categorylist,'selectcategory'=>$request->category]);
    }
           // searching products  //
    public function search(Request $request){
            $apiResponseProductslist = $this->client->request('GET', 'https://dummyjson.com/products/search?q='.$request->q);
            $dataProductslist = $apiResponseProductslist->getBody();
            $product = json_decode($dataProductslist);
            $productslist = $product->products;
            $apiResponseCategorylist = $this->client->request('GET', 'https://dummyjson.com/products/categories');
            $dataCategorylist = $apiResponseCategorylist->getBody();
            $categorylist = json_decode($dataCategorylist);
            return view('searchData', [
                'productslist' => $productslist,
                'categorylist' => $categorylist,'q'=>$request->q]);
    }
}