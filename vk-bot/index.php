<?php
	$locale_name = setlocale(LC_ALL, "ru_RU.CP1251");
	
	function get_item(){
		$res = "";
		
		$handle = fopen("items.txt", "r");
		if($handle){
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				$str_cnt++;
			}
			fclose($handle);
			$handle = fopen("items.txt", "r");
			$rand_n = rand(0, $str_cnt);
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				if($str_cnt == $rand_n){
					//echo $buffer;
					$res = $buffer;
					break;
				}
				$str_cnt++;
			}
			fclose($handle);
		}
		
		$res = substr($res, 0, strlen($res)-1);
		
		
		return $res;
	}

	function get_name(){
		$res = "";

		$handle = fopen("names.txt", "r");
		if($handle){
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				$str_cnt++;
			}
			fclose($handle);
			$handle = fopen("names.txt", "r");
			$rand_n = rand(0, $str_cnt);
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				if($str_cnt == $rand_n){
					//echo $buffer;
					$res = $buffer;
					break;
				}
				$str_cnt++;
			}
			fclose($handle);
		}
		
		$res = substr($res, 0, strlen($res)-1);
		
		
		return $res;
	}

	function get_verb(){
		$res = "";

		$handle = fopen("verbs.txt", "r");
		if($handle){
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				$str_cnt++;
			}
			fclose($handle);
			$handle = fopen("verbs.txt", "r");
			$rand_n = rand(0, $str_cnt);
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				if($str_cnt == $rand_n){
					//echo $buffer;
					$res = $buffer;
					break;
				}
				$str_cnt++;
			}
			fclose($handle);
		}
		
		$res = substr($res, 0, strlen($res)-1);
		
		return $res;
	}

	function get_narech(){
		$res = "";

		$handle = fopen("narech.txt", "r");
		if($handle){
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				$str_cnt++;
			}
			fclose($handle);
			$handle = fopen("narech.txt", "r");
			$rand_n = rand(0, $str_cnt);
			$str_cnt = 0;
			while (($buffer = fgets($handle, 4096)) !== false) {
				if($str_cnt == $rand_n){
					//echo $buffer;
					$res = $buffer;
					break;
				}
				$str_cnt++;
			}
			fclose($handle);
		}
		
		$res = substr($res, 0, strlen($res)-1);
		
		return $res;
	}

	function female($name){
		if(substr($name, strlen($res)-2, strlen($res)-1) == "а" || substr($name, strlen($res)-2, strlen($res)-1) == "я"){
			return 1;
		}
		return 0;
	}
	
	function make_sentence(){
		$YES = 1;

		$sentence = "";
		$w1 = ucfirst(get_name());
		$w2 = get_narech();
		$w3 = strtolower(get_verb());
		$w4 = get_item();
		
		if(female($w1) == $YES){
			if(substr($w3, strlen($w3)-3, 2) == "ть")
				$w3 = substr($w3, 0, (strlen($w3)-3))."ла";
			else if(substr($w3, (strlen($w3)-5), 4) == "ться")
				$w3 = substr($w3, 0, (strlen($w3)-5))."ла";
		}
		else{
			if(substr($w3, strlen($w3)-3, 2) == "ть")
				$w3 = substr($w3, 0, (strlen($w3)-3))."л";
			else if(substr($w3, (strlen($w3)-5), 4) == "ться")
				$w3 = substr($w3, 0, (strlen($w3)-5))."л";
		}
		
		if(substr($w4, strlen($w4)-2, 1) == "с")
			$w4 = substr($w4, 0, (strlen($w4)-2))."л";
		else if(substr($w4, strlen($w4)-2, 1) == "а")
			$w4 = substr($w4, 0, (strlen($w4)-2))."у";
		else if(substr($w4, strlen($w4)-2, 1) == "й")
			$w4 = substr($w4, 0, (strlen($w4)-2))."я";
		else if(substr($w4, strlen($w4)-2, 1) == "я")
			$w4 = substr($w4, 0, (strlen($w4)-2))."ю";
		else if(substr($w4, strlen($w4)-2, 1) == "ь")
			$w4 = substr($w4, 0, (strlen($w4)-2))."я";
		else if(substr($w4, strlen($w4)-2, 1) == "т" || substr($w4, strlen($w4)-2, 1) == "н")
			$w4 = substr($w4, 0, (strlen($w4)-1))."а";
			
		return $w1." ".$w2." ".$w3." ".$w4;
	}
	
	if (!isset($_REQUEST)) {
		return; 
	} 
	
	//Строка для подтверждения адреса сервера из настроек Callback API 
	$confirmation_token = ''; 
	
	//Ключ доступа сообщества 
	$token = ''; 
	
	//Получаем и декодируем уведомление 
	$data = json_decode(file_get_contents('php://input')); 
	
	//Проверяем, что находится в поле "type" 
	switch ($data->type) { 
		//Если это уведомление для подтверждения адреса сервера... 
		case 'confirmation': 
			//...отправляем строку для подтверждения адреса 
			echo $confirmation_token; 
			break; 
		
		//Вступление в группу
		case 'group_join': 

			//...получаем id его автора 
			$user_id = $data->object->user_id; 
			//затем с помощью users.get получаем данные об авторе 
			$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0")); 
			
			//и извлекаем из ответа его имя 
			$user_name = $user_info->response[0]->first_name." ".$user_info->response[0]->last_name; 
			
			//С помощью messages.send и токена сообщества отпр сообщение 
			$request_params = array( 
				'message' => iconv("windows-1251", "utf-8", "Новый участник в группе X: ").$user_name, 
				'domain' => "your_id",
				'access_token' => $token, 
				'v' => '5.0' 
			); 
			
			//Сформировать сообщение
			$get_params = http_build_query($request_params); 
			
			//Отправить VK message
			$r = file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 
			
			//Отправить E-Mail
			$mail_header = "Content-Type: text/html; charset=UTF-8";
			$mail_subj = iconv("windows-1251", "utf-8", "Новичек в X");
			$mail_body = $user_name;
			mail('your_mail@domain', $mail_subj, $mail_body, $mail_header);
			
			//Возвращаем "ok" серверу Callback API 
			echo('ok'); 
			
			break; 
		//Сообщение в группу
		case 'message_new': 
			//...получаем id его автора 
			$user_id = $data->object->user_id; 
			//затем с помощью users.get получаем данные об авторе 
			$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0")); 
			
			//и извлекаем из ответа его имя 
			$user_name = $user_info->response[0]->first_name." ".$user_info->response[0]->last_name; 
			
			$sentence = make_sentence();
			
			//С помощью messages.send и токена сообщества отпр сообщение 
			$request_params = array( 
				'message' => iconv('windows-1251', 'utf-8', $sentence), 
				'user_id' => $user_id, 
				'access_token' => $token, 
				'v' => '5.0' 
			); 			
			
			//Сформировать сообщение
			$get_params = http_build_query($request_params); 
			
			//Отправить VK message
			$r = file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 
			
			//Отправить E-Mail
			$mail_header = "Content-Type: text/html; charset=UTF-8";
			$mail_body = "- ".$data->object->body." (".$user_name.")<br>- ".iconv('windows-1251', 'utf-8', $sentence)." (T-X)<br>";
			$mail_subj = iconv("windows-1251", "utf-8", "Сообщение T-X");
			mail('your_mail@domain', $mail_subj,  $mail_body, $mail_header);
			
			//Возвращаем "ok" серверу Callback API 
			echo('ok'); 
			
			break; 
		//Разрешение сообщений
		case 'message_allow': 
			//...получаем id его автора 
			$user_id = $data->object->user_id; 
			//затем с помощью users.get получаем данные об авторе 
			$user_info = json_decode(file_get_contents("https://api.vk.com/method/users.get?user_ids={$user_id}&v=5.0")); 
			
			//и извлекаем из ответа его имя 
			$user_name = $user_info->response[0]->first_name." ".$user_info->response[0]->last_name; 
			
			//С помощью messages.send и токена сообщества отпр сообщение 
			$request_params = array( 
				'message' => iconv("windows-1251", "utf-8", "Привет. Будем чатится, ").$user_info->response[0]->first_name.iconv("windows-1251", "utf-8", "?"), 
				'user_id' => $user_id, 
				'access_token' => $token, 
				'v' => '5.0' 
			); 			
			
			//Сформировать сообщение
			$get_params = http_build_query($request_params); 
			
			//Отправить VK message
			$r = file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 
			
			//Отправить E-Mail
			$mail_header = "Content-Type: text/html; charset=UTF-8";
			$mail_subj = iconv("windows-1251", "utf-8", "Разрешение в X");
			$mail_body = iconv("windows-1251", "utf-8", "Разрешил ").$user_name;
			mail('your_mail@domain', $mail_subj,  $mail_body, $mail_header);
			
			//Возвращаем "ok" серверу Callback API 
			echo('ok'); 
			
			break; 
		//Комментарий на стене
		case 'wall_reply_new': 
			
			//...получаем text комментария
			$text = $data->object->text; 
			
			//С помощью messages.send и токена сообщества отпр сообщение 
			$request_params = array( 
				'message' => "Новый комментарий на стене X: {$text}", 
				'domain' => "your_id",
				'access_token' => $token, 
				'v' => '5.0' 
			); 
			
			//Сформировать сообщение
			$get_params = http_build_query($request_params); 
			
			//Отправить VK message
			$r = file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 
			
			//Отправить E-Mail
			$mail_header = "Content-Type: text/html; charset=UTF-8";
			mail('your_mail@domain', 'Комментарий в группе X', "<b>".$text."</b><br><br>Код ответа API:<br>".$r."<br><br>", $mail_header);
			
			//Возвращаем "ok" серверу Callback API 
			echo('ok'); 
			
			break; 
	}
