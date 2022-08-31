var EmailsService = {
  init: function(){
       $('#email_form').validate({
         submitHandler: function(form) {
           var entity = Object.fromEntries((new FormData(form)).entries());
             EmailsService.add(entity);
         }
       });
     },
     add: function(todo){
       $.ajax({
         url: 'rest/email',
         type: 'POST',
         data: JSON.stringify(todo),
         contentType: "application/json",
         dataType: "json",
         success: function(result) {
         }
       });
     },

     list_all: function(){
       $.ajax({
         url: 'rest/email',
         type: 'GET',
         dataType: "json",
         success: function(data) {
          $("#menus").html("");
          var html = "";
          for(let i = 0; i < data.length; i++){
            html += `
            <div>
              <div>
                <div>
                    <h4>Name: ` + data[i].name + `</h4>
                    <h3>Email: ` + data[i].email + `</h3>
                    <p>Text: ` + data[i].text + `</p>
                </div>
              </div>
            </div>
            `;
          }
          $("#menus").html(html);
        }
        });
      },


}
