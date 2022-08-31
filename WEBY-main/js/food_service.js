var FoodsService = {

  list: function(){
      $.get("rest/foods", function(data) {
        $("#daylie_foods").html("");
        var html = "";
        for(let i = 0; i < 6; i++){
          let value = Math.floor(Math.random()*(data.length-1-1+1)+1)
          html += `
          <div class="col-lg-6 col-sm-12 col-xs-6">
          <div class="row">
              <div class="image col-sm-5" style="float:left;">
                <img src="img/`+data[value].image_url+`" alt="Description for image" width="250" height="250"; style="border-radius:50%">
              </div>
              <div class="col-sm-7" style="float:right;">
                  <div class="ze"><h3>TEST`+data[value].name+`</h3>
                  <p">`+data[value].type+`</p>
                  <p class="price">`+data[value].price+`</p>
                  </div>
              </div>
              </div><br/>
          </div>
          `;
        }
        //console.log(html);
        $("#daylie_foods").html(html);

      });
    },


    list_all: function(){
        $.get("rest/foods", function(data) {
          $("#menus").html("");
          var html = "";
          for(let i = 0; i < data.length; i++){
            html += `
            <div class="col-lg-6 col-sm-12 col-xs-6">
            <div class="row">
                <div class="image col-sm-5" style="float:left;">
                  <img src="img/`+data[i].image_url+`" alt="Description for image" width="250" height="250"; style="border-radius:50%">
                </div>
                <div class="col-sm-7" style="float:right;">
                    <div class="ze"><h3>TEST`+data[i].name+`</h3>
                    <p>`+data[i].type+`</p>
                    <p class="price">`+data[i].price+`</p>
                    </div>
                </div>
                </div><br/>
            </div>
            `;
          }
          //console.log(html);
          $("#menus").html(html);

        });
      },
}
