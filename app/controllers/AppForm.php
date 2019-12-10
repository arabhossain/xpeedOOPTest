<?php
/**
 * Created by PhpStorm.
 * User: arab
 * Date: 11/12/19
 * Time: 3:31 AM
 */

namespace App\controllers;


use App\models\Sales;
use Helpers\Validations;
use Xpeed\Controller;
use Xpeed\Request;


class AppForm extends Controller
{
use Validations;

    private $formModel;

    public function __construct()
    {
        $this->formModel = new Sales();
    }

    function index()
    {

        $this->title = 'XpeedTest';
        $this->view('form');
    }

    function store($request)
    {
        $postData = $request->getBody();

        //check validation
        $this->validate_mobile($postData['phone']);
        $this->validate_email($postData['buyer_email']);

        if($this->validation_run()){
            if(isset($_POST['items'])){
                $postData['items'] = json_encode($_POST['items']);
            }
            unset($postData['btn-save']);

            if (strpos($postData['phone'], '0') === 0) {
                $postData['phone'] = '88'.$postData['phone'];
            }

            $salt = substr(str_replace('+','.',base64_encode(md5(mt_rand(), true))),0,16);
            $postData['hash_key'] = crypt(time(), sprintf('$6$rounds=%d$%s$', 1000, $salt));

            $postData['buyer_ip'] = $_SERVER['REMOTE_ADDR'];
            $postData['entry_at'] = date("Y-m-d H:i:s");

            $this->formModel->insert($postData);

            setcookie("user-".$postData['entry_by'], true, time()+86400);
        }else{
            print_r($this->error_message());
        }

        die();
    }

    function viewSales()
    {
        $sales = $this->formModel->select()->asObject();

        $this->title = 'Views | XpeedTest';
        $this->view('list', compact('sales'));
    }
}
