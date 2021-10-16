<?php 

include_once ("../../db/db.php");
require ('config.php');
require ('razorpay-php/Razorpay.php');
session_start();
use Razorpay\Api\Api;

$api = new Api("rzp_test_dNYs2vEQKMjA1R", "Cmad9esZbPU5lUpgHQx8i014");
$api->order->create(
                    array(  'receipt' => '123', 
                            'amount' => 100, 
                            'currency' => 'INR', 
                             'notes'=> array(
                                                'key1'=> 'value3', 
                                                 'key2'=> 'value2')
                                                
                        )
                    );

                    $myJSON = json_encode($api);

                    echo $myJSON;
                 

?>