var IngredientsService = {

    list_all: function(){
        $.get("rest/ingredients", function(data) {
          $("#alergies").html("");
          var html = "";
          for(let i = 0; i < data.length; i++){
            html += `
            <div class="col-lg-6 col-sm-12 col-xs-6">
            <div class="row">
                <div class="image col-sm-5" style="float:left;">
                  <img src="img/`+data[i].image+`" alt="Description for image" width="250" height="250"; style="border-radius:50%">
                </div>
                </div><br/>
            </div>
            `;
          }
          //console.log(html);
          $("#alergies").html(html);

        });
      },
}
