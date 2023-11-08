<?php


namespace App\Services\Notifications;


use Carbon\Carbon;

class PushNotificationService 
{


    

    public function execute($data,$token)
    {
        
        $message = $data['title'];
        $date = Carbon::now();
        $header = [
            'Authorization: key= AAAAFpvl-sk:APA91bEWg58Fdufk3e3m_8NwlFcqilDmoGEbl8t7YqlDMlJq60E7LdJ_NiZqqppQiSf0Wo96eSjQFwQoR5KNudOejvnCf6Vh9XXtIifEaZy7ULRMA1q1W26AYDG5Z5qOlOF6Ley5b-hY',
            'Content-Type: Application/json'
        ];
        $notification = [
            'title' => 'Boat Basin Lightening',
            'body' =>  $message,
            'icon' => '',
            'image' => '',
            'sound' => 'default',
            'date' => $date->diffForHumans(),
            'content_available' => true,
            "priority" => "high",
            'badge' =>0
        ];
        if (gettype($token) == 'array') {
            $payload = [
                'registration_ids' => $token,
                'data' => (object)$data,
                'notification' => (object)$notification
            ];
        } else {
            $payload = [
                'to' => $token,
                'data' => (object)$data,
                'notification' => (object)$notification
            ];
        }
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => $header
        ));
        // return true;
        $response = curl_exec($curl);
        $d  =[ 'res'=>$response,'data'=>$data];
 
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

}
