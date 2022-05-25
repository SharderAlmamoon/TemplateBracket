jQuery(document).ready(function(){
    forShowCateGory();

    jQuery(".addCategory").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var name=jQuery(".name").val();
        var description=jQuery(".description").val();
        var tag=jQuery(".tag").val();
        var status=jQuery(".status").val();
        // alert(status);
        $.ajax({
            url:'catstore',
            type:'POST',
            dataType:'json',
            data:{
                'name':name,
                'description':description,
                'tag':tag,
                'status':status,
            },
            success:function(result){
                if(result.faild == "404"){
                    jQuery(".nameError").text(result.errors.name);
                    jQuery(".descriptionError").text(result.errors.description);
                    jQuery(".tagError").text(result.errors.tag);
                    jQuery(".statusError").text(result.errors.status);
                }
                else{
                 jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
                 jQuery(".msg").fadeOut(5000);
                 jQuery("#AddCategory").modal('hide');
                 jQuery("#AddCategory").find('input').val('');
                 jQuery("#AddCategory").find('textarea').val('');
                 forShowCateGory();
                }
            }
        });
    });

function forShowCateGory(){
    $.ajax({
        url:'forshow',
        type:'GET',
        dataType:'json',
        success:function(result){
            var sl = 1;
            jQuery('.tbody').html('');
            $.each(result.data,function(key,category){
                if(category.status =='1'){
                    var statuss='<div class="badge badge-success">Active</div>';
                }else{
                    var statuss='<div class="badge badge-warning">Inactiv</div>';
                }
                jQuery('.tbody').append('<tr>\
                <td>'+sl+'</td>\
                <td>'+category.name+'</td>\
                <td>'+category.description+'</td>\
                <td>'+category.tag+'</td>\
                <td>'+statuss+'</td>\
                <td>\
                  <button class="btn btn-sm btn-success UpdateId" data-target="#EditCategory" data-toggle="modal" value="'+category.id+'"><i class="fa fa-edit"></i></button>\
                  <button class="btn btn-sm btn-danger deleteId" data-toggle="modal" data-target="#DELETEcategoryModal" value="'+category.id+'"><i class="fa fa-trash"></i></button>\
                </td>\
              </tr>')
              sl++;  });
        }
    });
}
jQuery(document).on('click','.UpdateId',function(e){
    e.preventDefault();
    var id = jQuery(this).val();
    // var name=jQuery("#name").val();
    // var description=jQuery("#description").val();
    // var tag=jQuery("#tag").val();
    // var status=jQuery("#status").val();
    $.ajax({
        url:'catedit/'+id,
        type:'GET',
        dataType:'json',
        success:function(result){
            jQuery("#name").val(result.data.name);
            jQuery("#description").val(result.data.description);
            jQuery("#tag").val(result.data.tag);
            jQuery("#status").val(result.data.status);
            jQuery("#id").val(result.data.id);
        }
    });
});
jQuery('.UpdateCategory').click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var name = jQuery("#name").val();
    var description = jQuery("#description").val();
    var tag = jQuery("#tag").val();
    var status = jQuery("#status").val();
    var id = jQuery("#id").val();
    $.ajax({
        url:'update/'+id,
        type:'POST',
        dataType:'json',
        data:{
            'name':name,
            'description':description,
            'tag':tag,
            'status':status,
            'name':name,
        },
        success:function(result){
            if(result.error){
                jQuery(".nameError").text(result.error.name);
                jQuery(".descriptionError").text(result.error.description);
                jQuery(".tagError").text(result.error.tag);
                jQuery(".statusError").text(result.error.status);
            }
            else{
                jQuery(".msg").append('<div class="alert alert-success">'+result.message+'</div>');
                 jQuery(".msg").fadeOut(5000);
                 jQuery("#EditCategory").modal('hide');
                 forShowCateGory();

            }
        }
    });
});

jQuery(document).on('click','.deleteId',function(e){
     e.preventDefault();
    var did = jQuery(this).val();
     jQuery("#iddddddd").val(did);
    // jQuery('#id').val(did);
});

    jQuery(".Dcategory").click(function(){
        var did = jQuery("#iddddddd").val();
        $.ajax({
            url:'delete/'+did,
            type:'GET',
            dataType:'json',
            success:function(result){
                jQuery(".msg").append('<div class="alert alert-danger">'+result.message+'</div>');
                jQuery(".msg").fadeOut(5000);
                jQuery("#DELETEcategoryModal").modal('hide');
                forShowCateGory();
            }
        });

    });





});