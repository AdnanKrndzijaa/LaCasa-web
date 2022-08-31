<?php

/**
 * @OA\Get(path="/foods", tags={"WEBY"},
 *         summary="Return all food from the API. ",
 *         @OA\Parameter(in="query", name="search", description="Search critieri"),
 *         @OA\Response( response=200, description="List of foods.")
 * )
 */
Flight::route('GET /foods', function(){
  Flight::json(Flight::foodService()->get_all());
});

/**
 * @OA\Get(path="/foods/{id}", tags={"foods"},
 *         summary="Return food with the given ID.",
 *     @OA\Parameter(in="path", name="id", example=1, description="Id of food"),
 *     @OA\Response(response="200", description="Fetch individual food")
 * )
 */
Flight::route('GET /foods/@id', function($id){
  Flight::json(Flight::foodService()->get_by_id($id));
});

?>
