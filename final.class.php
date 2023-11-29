<?php 
class final_rest
{



	/**
	 * @api  /api/v1/setTemp/
	 * @apiName setTemp
	 * @apiDescription Add remote temperature measurement
	 *
	 * @apiParam {string} location
	 * @apiParam {String} sensor
	 * @apiParam {double} value
	 *
	 * @apiSuccess {Integer} status
	 * @apiSuccess {string} message
	 *
	 * @apiSuccessExample Success-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *              "status":0,
	 *              "message": ""
	 *     }
	 *
	 * @apiError Invalid data types
	 *
	 * @apiErrorExample Error-Response:
	 *     HTTP/1.1 200 OK
	 *     {
	 *              "status":1,
	 *              "message":"Error Message"
	 *     }
	 *
	 */
	public static function getProduct($category, $subcategory, $id) {
		try {
			$retData["result"] = GET_SQL("select * from product where category like ? and subcategory like ? and (product_id = ? or ? = '0') order by description", $category, $subcategory, $id, $id);
			$retData["status"]=0;
			$retData["message"]="insert of '$id' for category: '$category' and subcategory '$subcategory' accepted";
		} catch (Exception $e) {
			$retData["status"]=1;
			$retData["message"]=$e->getMessage();
		}
		return json_encode ($retData);
	}
}
