<?php

namespace App\Services;

use App\Models\Sale;
use Exception;
use GuzzleHttp\Client;

class DataBaseService {
	public function insert($request, $modelName) {
		try {
            $modelClass = 'App\\Models\\' . $modelName;

            $from = $request->input('dateFrom', null);
            $to = $request->input('dateTo', null);
            $page = $request->input('page', 1);
            $limit = $request->input('limit', 500);
            $token = env('APP_TOKEN');

            $action = strtolower($modelName) . 's';

            $client = new Client();
            $res = $client->request('GET', "http://109.73.206.144:6969/api/$action?dateFrom=$from&dateTo=$to&page=$page&key=$token&limit=$limit");

            $bodyRes = (array) json_decode($res->getBody()->getContents(), true);

            for($i = 0; $i <= count($bodyRes['data']) - 1; $i++) {
				foreach($bodyRes['data'][$i] as $key => $value) {
					$data[$key] = $value;
				}
				$modelClass::insert($data);
        	}

            return ['message' => 'Данные успешно сохранены'];
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}