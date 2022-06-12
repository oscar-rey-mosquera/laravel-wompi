<?php

namespace LaravelWompi\Tests;

use Bancolombia\Wompi;
use Illuminate\Http\Request;
use LaravelWompi\Http\Middleware\CheckWompiWebHookMiddleware;

class LaravelWompiTest extends TestCase
{

    /**
     * @test
     */
    public function verify_class_wompi()
    {
        $response = Wompi::acceptance_token();

        dd(Wompi::getTokens());
 
        $this->assertObjectHasAttribute('data', $response);
    }

    /**
     * @test
     */
    public function check_middlewar()
    {
        $request = new Request();

        list($webHookFake, $webHookBadFake) = $this->webHookFake();


         /**
        * respuesta mala con metodo post  
        */
        $request->merge($webHookBadFake);
     
        $request->setMethod('post');

        $response = (new CheckWompiWebHookMiddleware())->handle($request, function ($request) {});

        $this->assertFalse($response);



        $request->merge($webHookFake);

        $request->setMethod('post');

        (new CheckWompiWebHookMiddleware())->handle($request, function ($request) use ($webHookFake) {
            $this->assertEquals($request->getMethod(), 'POST');
            $this->assertEquals($request->all()['data']['transaction']['id'], $webHookFake['data']['transaction']['id']);

            return true;
        });


        $request->merge($webHookBadFake);

        $request->setMethod('post');

       $response = (new CheckWompiWebHookMiddleware())->handle($request, function ($request) {});

       $this->assertFalse($response);


       /**
        * respuesta con metodo get  
        */
         $request->merge($webHookFake);
     
         $request->setMethod('get');

        $response = (new CheckWompiWebHookMiddleware())->handle($request, function ($request) {});

        $this->assertFalse($response);



       /**
        * respuesta con metodo get  
        */

        $request = new Request();
     
        $request->setMethod('post');

       $response = (new CheckWompiWebHookMiddleware())->handle($request, function ($request) {});

       $this->assertFalse($response);





    }

    public function webHookFake()
    {

        return  [
            [
                "event" => "transaction.updated",
                "data" => [
                    "transaction" => [
                        "id" => "114167-1654990057-62612",
                        "created_at" => "2022-06-11T23:27:37.623Z",
                        "finalized_at" => "2022-06-11T23:27:37.000Z",
                        "amount_in_cents" => 30300000,
                        "reference" => "ybrekke@gmail.com",
                        "customer_email" => "finn.schulist@sanford.com",
                        "currency" => "COP",
                        "payment_method_type" => "BANCOLOMBIA_TRANSFER",
                        "payment_method" => [
                            "type" => "BANCOLOMBIA_TRANSFER",
                            "extra" => [
                                "async_payment_url" => "https://sandbox.wompi.co/v1/payment_methods/redirect/bancolombia_transfer?transferCode=BkjOZiceeCYwi8oY-approved",
                                "external_identifier" => "BkjOZiceeCYwi8oY-approved"
                            ],
                            "user_type" => "PERSON",
                            "sandbox_status" => "APPROVED",
                            "payment_description" => "Eaque iusto exercitationem maiores aspernatur. Et et sint doloribus ullam veniam molestiae dicta ipsa. Error velit qui voluptas in."
                        ],
                        "status" => "APPROVED",
                        "status_message" => null,
                        "shipping_address" => null,
                        "redirect_url" => null,
                        "payment_source_id" => null,
                        "payment_link_id" => null,
                        "customer_data" => null,
                        "billing_data" => null
                    ]
                ],
                "sent_at" => "2022-06-11T23:27:37.810Z",
                "timestamp" => 1654990057,
                "signature" => [
                    "checksum" => "aa2512232048f87233123110a742fb8dab5d99e1bd7d6f9572751c35210f0542",
                    "properties" => [
                        "transaction.id",
                        "transaction.status",
                        "transaction.amount_in_cents"
                    ]
                ],
                "environment" => "test"
            ],
            [
                "event" => "transaction.updated",
                "data" => [
                    "transaction" => [
                        "id" => "114167-1654990057-62612",
                        "created_at" => "2022-06-11T23:27:37.623Z",
                        "finalized_at" => "2022-06-11T23:27:37.000Z",
                        "amount_in_cents" => 30300000,
                        "reference" => "ybrekke@gmail.com",
                        "customer_email" => "finn.schulist@sanford.com",
                        "currency" => "COP",
                        "payment_method_type" => "BANCOLOMBIA_TRANSFER",
                        "payment_method" => [
                            "type" => "BANCOLOMBIA_TRANSFER",
                            "extra" => [
                                "async_payment_url" => "https://sandbox.wompi.co/v1/payment_methods/redirect/bancolombia_transfer?transferCode=BkjOZiceeCYwi8oY-approved",
                                "external_identifier" => "BkjOZiceeCYwi8oY-approved"
                            ],
                            "user_type" => "PERSON",
                            "sandbox_status" => "APPROVED",
                            "payment_description" => "Eaque iusto exercitationem maiores aspernatur. Et et sint doloribus ullam veniam molestiae dicta ipsa. Error velit qui voluptas in."
                        ],
                        "status" => "APPROVED",
                        "status_message" => null,
                        "shipping_address" => null,
                        "redirect_url" => null,
                        "payment_source_id" => null,
                        "payment_link_id" => null,
                        "customer_data" => null,
                        "billing_data" => null
                    ]
                ],
                "sent_at" => "2022-06-11T23:27:37.810Z",
                "timestamp" => 1658991057,
                "signature" => [
                    "checksum" => "aa2512232048f87233123110a744fb8dab5d99e1bd7d6f9572751c35210f0542",
                    "properties" => [
                        "transaction.id",
                        "transaction.status",
                        "transaction.amount_in_cents"
                    ]
                ],
                "environment" => "test"
            ]
        ];
    }
}
