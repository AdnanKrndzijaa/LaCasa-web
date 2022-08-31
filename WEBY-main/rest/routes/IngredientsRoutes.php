<?php

/**
 * @OA\Get(path="/ingredients", tags={"ingredients"},
 *         summary="Return all ingredients from the API. ",
 *         @OA\Response( response=200, description="List of ingredients.")
 * )
 */
Flight::route('GET /ingredients', function(){
  Flight::json(Flight::ingredientsService()->get_all());
});

?>
