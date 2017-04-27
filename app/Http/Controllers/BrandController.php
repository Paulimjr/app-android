<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandController extends Controller
{

    /**
     * Método para listar todas as bandeiras cadastrados.
     *
     * @author Paulo Cesar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAllBrands() {
        $size_zero = 0;
        $brands = \App\Brands::all();

        if (count($brands) == $size_zero) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Nenhuma bandeira cadastrada ainda!',
            ], 404);
        } else {
            $list = array('brands' => $brands);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $list,
            ], 200);
        }
    }

    /**
     * Método para buscar a bandeira pelo ID.
     *
     * @author Paulo Cesar
     *
     * @param $id o identificador da bandeira
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findBrandById($id) {
        $brand = \App\Brands::find($id);

        if (!$brand || $id == null || !is_numeric($id)) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Bandeira com idenficador informado não foi encontrado!',
            ], 404);
        } else {
            $brandRetorno = array('brand'=> $brand);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $brandRetorno,
            ], 200);
        }

    }

}
