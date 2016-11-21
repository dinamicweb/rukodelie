<div class="container">
    <h1>Добавляем поддержку CKEditor</h1>
    <div class="row">
        <div class="col-md-12">
                           <textarea name="editor1" id="editor1">
                           </textarea>
        </div>
    </div>
</div>

<script src="/public/includes/js/ckeditor/ckeditor.js"  type="text/javascript" charset="utf-8" ></script>


<script>
    var editor = CKEDITOR.replace( 'editor1',{
        filebrowserBrowseUrl : '/elfinder/ckeditor'
    } );
</script>