var ReservationsService = {
  init: function(){
       $('#reservation_form').validate({
         submitHandler: function(form) {
           var entity = Object.fromEntries((new FormData(form)).entries());
             ReservationsService.add(entity);
         }
       });
     },
     add: function(todo){
       $.ajax({
         url: 'rest/reservations',
         type: 'POST',
         data: JSON.stringify(todo),
         contentType: "application/json",
         dataType: "json",
         success: function(result) {
            console.log(result);
         }
       });
  },

  list_all: function(){
    $.ajax({
       url: "rest/reservations",
       type: "GET",
       dataType: "json",
        success:function(data) {
        $("#daylie_foods").html("");
        $("#1").html("");
        $("#2").html("");
        $("#3").html("");
        $("#4").html("");
        $("#reservations").html("");
        $("#emails_thingy").html("");
        var html = "";
        for(let i = 0; i < data.length; i++){
          html += `
          <div class="col-lg-6 col-sm-12 col-xs-6">
            <div class="left thingy" style="float: left;">
                <h4>Name: `+data[i].name+`</h4>
                <p>Date: `+data[i].date+`</p>
                <p>Time: `+data[i].time+`</p>
                <p>Email: `+data[i].email+`</p>
                <p>Phone: `+data[i].phone+`</p>
                <p>People: `+data[i].number_of_people+`</p>
            </div>
            <div class="right thingy" style="float: right;">
              <button class= "del_button" style="background:blue;" onclick="ReservationsService.delete(`+ data[i].id +`)">Delete Reservation
              </button>
            </div>
        </div>
          `;
        }
        $("#daylie_foods").html(html);
        }
      });
    },

delete: function(id){
      $('#del_button').attr('disabled', true);
      $.ajax({
        url: 'rest/reservations/'+id,
        type: 'DELETE',
        success: function(result) {
            $("#reservation_form").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            ReservationsService.list_all();
            toastr.success("Note deleted!");
        }
      });
    },
}
