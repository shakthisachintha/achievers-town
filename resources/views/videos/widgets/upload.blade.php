<div class="clearfix"></div>
<script>
    function previewVideoName(x){
        name=x.value;
        f = name.replace(/.*[\/\\]/, '');
        var uploadField = document.getElementById("video-upload");
        if(uploadField.files[0].size > 83886080){
            f="File Is Too Big! Maximum File Size Is 80MB";
            uploadField.value = "";
        };
        $("#video-name").text(f);
}


function UploadVideo(){
    var uploadField = document.getElementById("video-upload");
    if( uploadField.value == ""){
        $('#errorMessageModal').modal('show');
        $('#errorMessageModal #errors').html('Select a Video To Upload!');
        return
    }
    var form_name = '#form-new-post';

    $(form_name + ' .loading-post').show();

    var data = new FormData();
    data.append('data', JSON.stringify(makeSerializable(form_name).serializeJSON()));

    var file_inputs = document.querySelectorAll('.image-input');
    $(file_inputs).each(function(index, input) {
        data.append('video', input.files[0]);
    });

    data.append('content',$('#video-disc').val());

    $.ajax({
        url: BASE_URL+'/videos/upload',
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        headers: {'X-CSRF-TOKEN': CSRF},
        success: function(response){
            console.log(response);
            if (response.code == 200){
                $(form_name + ' .loading-post').hide();
                $('.post-list-top-loading').show();
                window.location.href = "{{route('home')}}";
            }else{
                $('#errorMessageModal').modal('show');
                $('#errorMessageModal #errors').html(response.message);
                $(form_name + ' .loading-post').hide();
            }
        },
        error: function(response){
            console.log(response);
            $('#errorMessageModal').modal('show');
            $('#errorMessageModal #errors').html('Something went wrong!');
            $(form_name + ' .loading-post').hide();
        }
    });

}

</script>
@if($user->id == Auth::user()->id)
<div class="panel panel-default new-post-box">
    <div class="panel-body">
        <form enctype="multipart/form-data" id="form-new-post">
            {{ csrf_field() }}
            <input type="hidden" name="group_id" value="">
            <textarea name="content" id="video-disc" placeholder="Have Any Educational Videos?"></textarea>
            <hr />

            <div class="row">
                <div class="col-xs-4">
                    <button type="button" class="btn btn-default btn-add-image btn-sm" onclick="uploadPostImage()">
                        <i class="fa fa-image"></i> Add Video
                    </button>
                    <div class="clearfix"></div>
                    
                    <input id="video-upload" type="file" accept="video/*" class="image-input" name="video"
                        onchange="previewVideoName(this)">
                </div>
                <div class="col-xs-4">
                    <div class="loading-post">
                        <img src="{{ asset('images/rolling.gif') }}" alt="">
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="button" onclick="UploadVideo()" class="btn btn-primary btn-submit pull-right">
                        Share
                    </button>
                </div>
                <div class="col-xs-12 mt-4 pl-4 pr-4" id="video-name"></div>
            </div>
        </form>
    </div>
</div>
@endif