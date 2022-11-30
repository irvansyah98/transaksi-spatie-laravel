<?php

namespace App\Helpers;

use Edujugon\PushNotification\PushNotification;

class Helper{
    
	public static function send_notification($title='', $msg='', $token=[], $isPush=true, $save=true){
		$pushResponse = false;
		$saveResponse = '';
		if($isPush && $token){
			$payload = [
				'notification' => [
					'title'=>$title,
					'body'=>$msg,
					'sound' => 'default'
				]
			 ];
			
			// if(!empty($additionalPushData)){
			// 	$payload['data'] = $additionalPushData;
			// }
			$push = new PushNotification('fcm');
			$push->setMessage($payload);
			
			if(!empty($token)){
				$push->setDevicesToken($token);
				$push->send();
			}
			$pushResponse = $push->getFeedback();
		}
		return ['saveResponse'=>$saveResponse,'pushResponse'=>$pushResponse];
	}
}
