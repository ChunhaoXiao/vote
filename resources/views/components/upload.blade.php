@props(['name', 'multiple' => 0])


<input type="file" name="file" multiple>
<div id="uploads" class="pt-2 d-flex"></div>

<div class="progress" style="display:none">
  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>

<input type="hidden" name="{{$name??'path'}}">
<script type="module">
    $(document).ready(function(){
        $('input[type=file]').change(function(){
            $(this).simpleUpload("/admin/upload", {
                /*
                * Each of these callbacks are executed for each file.
                * To add callbacks that are executed only once, see init() and finish().
                *
                * "this" is an object that can carry data between callbacks for each file.
                * Data related to the upload is stored in this.upload.
                */

                start: function(file){
                    //upload started
                    //this.block = $('<div class="block thumb" style="border:1px solid red"></div>');
                    this.progressBar = $('<div class="progressBar"></div>');
                    $(".progress").show();
                    //this.block.append(this.progressBar);
                   // $('#uploads').append(this.block);
                },

                progress: function(progress){
                    //received progress
                    
                    $(".progress-bar").css("width", parseInt(progress)+'%')
                   // console.log(parseInt(progress));
                    this.progressBar.width(progress + "%");
                },

                success: function(data){
                    $(".progress").hide();
                    console.log(data)
                    //upload successful

                    //this.progressBar.remove();

                    /*
                    * Just because the success callback is called doesn't mean your
                    * application logic was successful, so check application success.
                    *
                    * Data as returned by the server on...
                    * success:	{"success":true,"format":"..."}
                    * error:	{"success":false,"error":{"code":1,"message":"..."}}
                    */

                    if (data.success) {
                        let name = "{{$name}}";
                        let multiple = "{{ $multiple }}"
                        $("input[name="+name+"]").val(data.path);
                        //now fill the block with the format of the uploaded file
                        var format = data.format;
                        let content = data.type == 'image' ? "<img src="+data.fullpath+" width=150 height=150 />" : 
                        "<video src="+data.fullpath+" controls width=250 height=200></video>";
                        var formatDiv = $('<div class="format pr-1"></div>').html(content);
                        console.log("multiple:", multiple)
                        if(multiple == 1) {
                            $("#uploads").append(formatDiv);
                        }else {
                            $("#uploads").html(formatDiv);
                        }
                        
                    } else {
                        //our application returned an error
                        var error = data.error.message;
                        var errorDiv = $('<div class="error"></div>').text(error);
                        this.block.append(errorDiv);
                    }

                },

                error: function(error){
                    //upload failed
                    this.progressBar.remove();
                    var error = error.message;
                    var errorDiv = $('<div class="error"></div>').text(error);
                    this.block.append(errorDiv);
                }

            });

        });

});
</script>