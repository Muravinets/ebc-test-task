<?php

use Codeception\Util\HttpCode;

class TestTaskApiCest
{
	public function _before(ApiTester $I)
	{
		$I->haveHttpHeader('Content-Type', 'application/json');
	}

	/**
	 * Send valid request
	 *
	 * @param ApiTester $I
	 */
    public function validRequest(ApiTester $I)
    {
        $I->amHttpAuthenticated('admin', 'admin');
        $I->sendPOST('', [
	        	'N' => 5,
		        'arr' => [5, 2, 3]
	        ]
        );

        $I->seeResponseCodeIs(HttpCode::OK); // 200
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson(['result' => 2]);
    }

	/**
	 * Send request with invalid credentials
	 *
	 * Response must contain such JSON:
	 * {
	 *  "name":"Unauthorized",
	 *  "message":"Your request was made with invalid credentials.",
	 *  "code":0,
	 *  "status":401,
	 *  "type":"yii\\web\\UnauthorizedHttpException"
	 * }
	 *
	 * @param ApiTester $I
	 */
    public function invalidCredentials(ApiTester $I)
    {
        $I->amHttpAuthenticated('admin', 'invalid password');
        $I->sendPOST('');

        $I->seeResponseCodeIs(HttpCode::UNAUTHORIZED); // 401
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
        	"name" => "Unauthorized",
	        "message" => "Your request was made with invalid credentials.",
			"code" => 0,
			"status" => HttpCode::UNAUTHORIZED,
			"type" => "yii\\web\\UnauthorizedHttpException"
        ]);
    }

    public function invalidParams(ApiTester $I)
    {
	    $I->amHttpAuthenticated('admin', 'admin');
	    $I->sendPOST('', [
	    	    'N'     => 'd',
			    'arr'   => 5,
		    ]
	    );

	    $I->seeResponseCodeIs(HttpCode::BAD_REQUEST); // 400
	    $I->seeResponseIsJson();
	    $I->seeResponseContainsJson([
		    "name" => "Bad Request",
		    "message" => "N must be an integer. Arr is invalid.",
		    "code" => 0,
		    "status" => HttpCode::BAD_REQUEST,
		    "type" => "yii\\web\\BadRequestHttpException",
	    ]);
    }
}
