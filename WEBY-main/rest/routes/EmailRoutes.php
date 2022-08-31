<?php
/**
 * @OA\Get(path="/email", tags={"email"},
 *         summary="Return all emails from the API. ",
 *         @OA\Response( response=200, description="List of emails.")
 * )
 */
Flight::route('GET /email', function(){
  Flight::json(Flight::emailsService()->get_all());
});

/**
* @OA\Post(
*     path="/email",
*     description="Add email",
*     tags={"email"},
*     @OA\RequestBody(description="Basic email info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="text", type="string", example="Bob",	description="Name of sender"),
*    				@OA\Property(property="name", type="string", example="Very good Restaurant",	description="Short message" ),
*           @OA\Property(property="email", type="string", example="user.thingy@gamil.com",	description="Email of the sender" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Email that has been created"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('POST /email', function(){
  Flight::json(Flight::emailsService()->add(Flight::request()->data->getData()));
});

/**
* @OA\Delete(
*     path="/email/{id}",
*     description="Soft delete email",
*     tags={"email"},
*     @OA\Parameter(in="path", name="id", example=1, description="Note ID"),
*     @OA\Response(
*         response=200,
*         description="Email deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /email/@id', function($id){
  Flight::emailsService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
