<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Retailers;
use DB;
use Session;
use Redirect;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
    
    public function index()
    {
        
        $products = Products::from("products as p")->select(DB::raw("p.image_path,
                                                            p.name,
                                                            p.slug,
                                                            p.description,
                                                            p.price,
                                                            r.slug as slugR,
                                                            r.name as nameR"))
                                                            ->join("retailers as r", "r.idretailer", "=", "p.idretailer")
                                                            ->whereRaw("p.status = 1 AND r.status = 1")->get();
        
        return view('site.product-list', compact('products'));
    }
    
    public function product($slug)
    {
        
        $product = Products::whereRaw("slug = '" . $slug . "'")->first();
        
        $othersProducts = Products::from("products as p")->select(DB::raw("p.image_path,
                                                                            p.name,
                                                                            p.slug"))
                                                                            ->join("retailers as r", "r.idretailer", "=", "p.idretailer")
                                                                            ->whereRaw("p.status = 1 AND r.status = 1 AND p.idretailer = " . $product->idretailer . " AND p.status = 1 AND r.status = 1 AND p.idproduct <> " . $product->idproduct)->limit(4)->get();
        
        return view('site.product', compact('product', 'othersProducts'));
    }
    
    public function retailer($slug)
    {
        
        $retailer = Retailers::whereRaw("slug = '" . $slug . "'")->first();
        
        $products = Products::from("products as p")->select(DB::raw("p.image_path,
                                                            p.name,
                                                            p.slug,
                                                            p.description,
                                                            p.price,
                                                            r.slug as slugR,
                                                            r.name as nameR"))
                                                            ->join("retailers as r", "r.idretailer", "=", "p.idretailer")
                                                            ->whereRaw("p.status = 1 AND r.status = 1 AND p.idretailer = " . $retailer->idretailer)->get();
        
        return view("site.retailers", compact("retailer", "products"));
        
    }

    public function sendProduct($slug, Request $request){
        
        $email = $request->all();       
        
        $html =  view('site.product-email')->render();

        
        $mail = new PHPMailer(true);
      
        $mail->IsSMTP(); 
        
        try {
            $mail->Host = 'email-ssl.com.br';
            $mail->SMTPAuth   = true;  
            $mail->Port       = 465; 
            $mail->SMTPDebug  = 0; 
            $mail->SMTPSecure = 'ssl';
            $mail->Username = 'teste_envio@freelanceria.com.br'; 
            $mail->Password = 'testeEnvio@2018'; 
        
            
            $mail->SetFrom('teste_envio@freelanceria.com.br', 'Gustavo Cassoto'); 
            $mail->AddReplyTo('teste_envio@freelanceria.com.br', 'Gustavo Cassoto'); 
            $mail->Subject = 'Teste de envio de e-mail';
        
            $mail->AddAddress($email['email'], $email['email']);
        
        
            $html = str_replace("[[EMAIL]]", $email['email'], $html);
            
            $html = str_replace("[[LINK]]", url('/').'/'.$slug, $html);
            
        
            $mail->MsgHTML(utf8_decode($html)); 
       
        
            $mail->Send();
            Session::flash('success', 'The product was successfully sent.');

            return Redirect::back();
        
        
        }catch (phpmailerException $e) {
            echo $e->errorMessage(); 
        }        
    }    
}