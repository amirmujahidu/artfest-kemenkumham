function send(url,jsonData, is_sweetalert=true, callback){
     $.ajax({
        url : url,
        type: "POST",
        data: jsonData,
        dataType: 'json',
        headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        dataType: "JSON",
        success: function(response) {
            if(callback!=null){
                callback(response);
            }
            if(is_sweetalert)
                sweetalert('success',response.title,response.message)
        },
         error: function (request, response, error) {
            if(is_sweetalert)
                sweetalert('error',response.title,response.message)
        }
    });
}

function get(url, is_sweetalert=true, callback){
     $.ajax({
        url : url,
        type: "GET",
        dataType: "JSON",
        success: function(response) {
            if(callback!=null){
                callback(response);
            }
            if(is_sweetalert) 
                sweetalert('success',response.title,response.message)
        },
         error: function (request, response, error) {
            if(is_sweetalert)
                sweetalert('error',response.title,response.message)
        }
    });
}

function sweetalert(type,title,text) {
    Swal.fire({
        type: type,
        title: title,
        text: text,
    });
}