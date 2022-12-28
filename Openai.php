<?php

  


class Openai{

    private function secret_key(){
        return $secret_key = 'Bearer ';
    }

    public function request($engine, $prompt, $max_tokens){ 

        $request_body = [
        "model" =>"text-davinci-003",
        "prompt" => $prompt,
        "temperature" => 0.7,
        "max_tokens" => 256,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0
        
        ];
       

        $postfields = json_encode($request_body);
        $curl = curl_init();
        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.openai.com/v1/completions ",
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Authorization: ' . $this->secret_key()
        ],
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postfields,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       
        
        ]);
       
        $response = curl_exec($curl);
        //echo $response;
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "Error #:" . $err;
        } else {
             return json_decode($response)->choices[0]->text;
        }

    }

}