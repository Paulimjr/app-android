<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneController extends Controller
{

    /**
     * Método para listar todos os Telefones cadastrados.
     *
     * @author Paulo Cesar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAllPhones() {
        $size_zero = 0;
        $phones = \App\Phones::all();

        if (count($phones) == $size_zero) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Nenhum telefone cadastrado ainda!',
            ], 404);
        } else {
            $list = array('phones' => $phones);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $list,
            ], 200);
        }
    }


    /**
     * Método para buscar o telefone pelo numero informado.
     *
     * @author Paulo Cesar
     *
     * @param $numero o numero do telefone para buscar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findPhoneByNumero($numero) {
        $phone = \App\Phones::where('numero',$numero);

        if (!$phone || $numero == null || !is_numeric($numero)) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Número informado não foi encontrado!',
            ], 404);
        } else {
            $phoneRetorno = array('phone'=> $phone);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $phoneRetorno,
            ], 200);
        }
    }

    /**
     * Método para inserir um novo número.
     *
     * @author Paulo Cesar
     *
     * @param Request $request requisição com os dados do número para inserção
     */
    public function savePhone(Request $request) {
        $phone = new \App\Phones();
        if ($request->dd        == "" ||
            $request->numero    == "") {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Parametros obrigatórios: DD e Número, informe-os corretamente.',
            ], 404);

        } else {
            $phone->dd = $request->dd;
            $phone->numero = $request->numero;
            $phone->save();
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => 'Número cadastrado com sucesso!',
            ], 200);
        }
    }


}
