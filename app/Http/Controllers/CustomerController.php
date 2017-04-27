<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function MongoDB\BSON\fromJSON;
use function MongoDB\BSON\toJSON;

class CustomerController extends Controller
{

    /**
     * Método para listar todos os Clientes cadastrados.
     *
     * @author Paulo Cesar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findAllCustomers () {
       $size_zero = 0;
       $customers = \App\Customers::all();

       if (count($customers) == $size_zero) {
           return response()->json([
               'statusCode' => 404,
               'message' => 'Not found',
               'data'   => 'Nenhum cliente cadastrado ainda...',
           ], 404);
       } else {
           $list = array('customers' => $customers);
           return response()->json([
               'statusCode' => 200,
               'message' => 'success',
               'data'   => $list,
           ], 200);
       }
    }

    /**
     * Método para buscar o cliente pelo ID.
     *
     * @author Paulo Cesar
     *
     * @param $id o identificador do cliente
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findCustomerById($id) {
        $customer = \App\Customers::find($id);

        if (!$customer || $id == null || !is_numeric($id)) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Cliente com idenficador informado não foi encontrado!',
            ], 404);
        } else {
            $customerRetorno = array('customer'=> $customer);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $customerRetorno,
            ], 200);
        }

    }

    /**
     * Método para buscar o cliente pelo email informado.
     *
     * @author Paulo Cesar
     *
     * @param $email o email do cliente para buscar
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function findCustomerByEmail($email) {
        $customer = \App\Customers::where('email',$email)->first();

        if (!$customer || $email == null) {
            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Cliente com email informado não foi encontrado!',
            ], 404);
        } else {
            $customerRetorno = array('customer'=> $customer);
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => $customerRetorno,
            ], 200);
        }
    }

    /**
     * Método para inserir um novo cliente.
     *
     * @author Paulo Cesar
     *
     * @param Request $request requisição com os dados do cliente para inserção
     */
    public function saveCustomer(Request $request) {
        $customer = new \App\Customers();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->dd = $request->dd;
        $customer->numero = $request->numero;
        $customer->senha = md5($request->senha);
        $customer->receber_notificacao_email = $request->receber_notificacao_email;
        $customer->receber_notificacao_celular = $request->receber_notificacao_celular;
        $customer->status_cliente = $request->status_cliente;

        if ($request->email     == "" ||
            $request->name      == "" ||
            $request->dd        == "" ||
            $request->numero    == "" ||
            $request->senha     == "") {

            return response()->json([
                'statusCode' => 404,
                'message' => 'Not found',
                'data'   => 'Parametros obrigatórios: Nome, E-mail, DD, Número e Senha, informe-os corretamente.',
            ], 404);
        } else {
            $customer->save();
            return response()->json([
                'statusCode' => 200,
                'message' => 'success',
                'data'   => 'Cadastro realizado com sucesso!',
            ], 200);
        }
    }
}
