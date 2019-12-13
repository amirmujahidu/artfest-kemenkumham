<script>
  $(function () {
    $("#successflash").hide();
    $("#failflash").hide();
  });
    var table = $("#example1").DataTable({
        responsive:true
    });
    $('#schedule').datepicker({
       format: 'yyyy-m-d',
       defaultDate: "{{date('Y-m-d')}}"
    });
    
    /* Ajax Start */
    var url = "{{URL::Route('admin.streaming.index')}}";

    //display modal form for task editing
    $("#datalist").on('click', '.editModal', function(){
        var id = $(this).val();
        $.get(url + '/' + id, function (data) {
            //success data
            console.log(data);
            $('#id').val(data.id);
            $('#title').val(data.title);
            CKEDITOR.instances.description.setData(data.description);
            $('#schedule').val(data.schedule);
            $('#link_embed').val(data.link_embed);
            $('#is_live').val(data.is_live);
            $('#is_headline').val(data.is_headline);
            
            $('#btn-save').val("update");
        }) 
    });

    //display modal form for creating new task
    $('#btn-add').click(function(){
        $('#form').trigger("reset");
        CKEDITOR.instances.description.setData("");
        $('#btn-save').val("add");
    });

    //delete task and remove it from list
     $("#datalist").on('click', '.deleteModal', function(){
        var id = $(this).val();
        $('#btndelete').val(id);
    });

    //create new task / update existing task
    $("#btn-save").click(function (e) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        e.preventDefault(); 

        var $myForm = $('#form')
        if (!$myForm[0].checkValidity()) {
          $myForm.find(':submit').click()
          return;
        }

        var formData = {
            title : $('#title').val(),
            description:CKEDITOR.instances['description'].getData(),
            link_embed : $('#link_embed').val(),
            schedule : $('#schedule').val(),
            is_headline : $('#is_headline').val(),
            is_live : $('#is_live').val(),
        }

        //used to determine the http verb to use [add=POST], [update=PUT]
        var state = $('#btn-save').val();
        var type = "POST"; //for creating new resource
        var id = $('#id').val();
        var my_url = url;
        if (state == "update"){
            type = "PUT"; //for updating existing resource
            my_url = url+'/' + id;
        }

        console.log(formData);
        $.ajax({
            type: type,
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                if(data.is_live == 1){
                    data.is_live = 'YES';
                }
                else{
                    data.is_live='NO';
                }
                if(data.is_headline == 1){
                    data.is_headline = 'YES';
                }
                else{
                    data.is_headline = 'NO';
                }
                var newData = [
                   
                    data.title,
                    data.schedule,
                    data.link_embed,
                    data.is_live,
                    data.is_headline,
                   
                    '<button type="button" class="btn btn-info editModal" data-toggle="modal" data-target="#editModal" value="'+data.id+'">Edit</button><button type="button" class="btn btn-danger deleteModal" data-toggle="modal" data-target="#deleteModal" value="'+data.id+'">Delete</button>'
                    ];

                if (state == "add"){ //if user added a new record
                    var newRow = table.row.add(newData).draw().node();
                    $(newRow).attr("id","row"+data.id);
                }else{ //if user updated an existing record

                    table.row("#row" + id).data(newData).draw(false);
                }

                $('#form').trigger("reset");
                $('#editModal').modal('hide');
                $('#flash').html($('#successflash').html());
                
            },
            error: function (data) {
                $('#editModal').modal('hide');
                var msgError = ""
                if (data.responseJSON.error)
                    msgError = data.responseJSON.error;
                $("#failerror").text("Terjadi Kesalahan "+msgError)
                $('#flash').html($('#failflash').html());
                console.log('Error:', data);

            }
        });
        
    });

    //delete task and remove it from list
    $('#btndelete').click(function(){
        var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({

            type: "DELETE",
            url: url + '/' + id,
            success: function (data) {
                console.log(data);
                table.row("#row" + data.id).remove().draw(false);
                 $('#flash').html($('#successflash').html());
                $('#deleteModal').modal("hide");
            },
            error: function (data) {
                console.log('Error:', data);
                $("#failerror").text("Terjadi Kesalahan");
                $('#flash').html($('#failflash').html());
                $('#deleteModal').modal("hide");
            }
        });
    });

/* Ajax End */
</script>