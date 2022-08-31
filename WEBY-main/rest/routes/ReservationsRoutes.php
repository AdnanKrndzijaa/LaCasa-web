<?php

/**
 * @OA\Get(path="/reservations", tags={"reservations"},
 *         summary="Return all reservations from the API. ",
 *         @OA\Parameter(in="query", name="search", description="Search critieri"),
 *         @OA\Response( response=200, description="List of notes.")
 * )
 */
Flight::route('GET /reservations', function(){
  Flight::json(Flight::reservationsService()->get_all());
});

/**
* @OA\Post(path="/reservations", tags={"reservations"}, description="Add reservations",
*         summary="Add new reservation.",
*     @OA\RequestBody(description="Basic reservations info", required=true,
*       @OA\MediaType(mediaType="application/json",
*    			@OA\Schema(
*    				@OA\Property(property="name", type="string", example="Banana",	description="Name of the person"),
*    				@OA\Property(property="number_of_people", type="int", example="4",	description="Number of people" ),
*           @OA\Property(property="date", type="date", example="2022-06-07",	description="Date of reservation" ),
*           @OA\Property(property="time", type="time", example="00:30:00",	description="Time of reservation" ),
*           @OA\Property(property="email", type="string", example="neko.nesta@gmail.com",	description="Email of the person" ),
*           @OA\Property(property="phone", type="string", example="(+387)644383671",	description="Number of the person" ),
*        )
*     )),
*     @OA\Response(
*         response=200,
*         description="Reservations has been added"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('POST /reservations', function(){
  Flight::json(Flight::reservationsService()->add(Flight::request()->data->getData()));
  Flight::json(["message"=>"updated"]);
});

/**
* @OA\Delete(
*     path="/reservations/{id}", security={{"ApiKeyAuth": {}}},
*     description="Soft delete reservations",
*     tags={"reservations"},
*     @OA\Parameter(in="path", name="id", example=1, description="Note ID"),
*     @OA\Response(
*         response=200,
*         description="reservations deleted"
*     ),
*     @OA\Response(
*         response=500,
*         description="Error"
*     )
* )
*/
Flight::route('DELETE /reservations/@id', function($id){
  Flight::reservationsService()->delete($id);
  Flight::json(["message" => "deleted"]);
});

?>
