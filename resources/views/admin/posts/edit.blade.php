@extends('admin.layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post</h1>                
    </div>
    <!-- End of Page Heading -->
    
   <div class="col-md-12">
        <form action="/admin/posts/update" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $posts->id }}">
            <table style="width: 100%">
                <tr>
                    <th>Judul</th>
                    <td>
                        <input type="text" id="title" maxlength="140" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ (old('title') != null) ? old('title') : $posts->title }}" autofocus>
                        @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>                    
                </tr>
                <tr style="margin-top : 10px">
                    <th>Slug</th>
                    <td>
                        <input type="text" id="slug" name="slug" class="form-control mt-3 @error('slug') is-invalid @enderror" value="{{ (old('slug') != null) ? old('slug') : $posts->slug }}">
                        @error('slug')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <th>Thumbnail</th>
                    <td>
                        <div class="form-check mt-3">
                            <input class="form-check-input" name="c_thumbn" type="checkbox" value="" id="check">
                            <label class="form-check-label" for="check">
                                Change Thumbnail
                            </label>
                        </div>                                        
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control mb-3 @error('thumbnail') is-invalid @enderror" disabled>   

                        @error('thumbnail')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </td>
                </tr>        

                <tr>
                    <th style="vertical-align: top">Body</th>
                    <td>                                                                
                        @error('body')                            
                            <div class="alert alert-danger">{{ $message }}</div>                            
                        @enderror
                        <textarea class="ckeditor" class="" name="body" id="ckeditor" cols="30" rows="10">{{ (old('body') != null) ? old('body') : $posts->body }}</textarea>                           
                    </td>
                </tr>
            </table>     
            
            <div class="text-center">
                <input type="submit" class="btn btn-lg btn-primary mt-3" name="" id="" value="POST">
            </div>
        </form>        
   </div>

    <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");
        const check = document.querySelector("#check");
        const thumbn = document.querySelector("#thumbnail");

        check.addEventListener("click", function(){
            if ((check.checked)){
                thumbn.removeAttribute('disabled', 'disabled');
            }else{
                thumbn.setAttribute('disabled', '');
            }        
        });
        
        title.addEventListener("keyup", function() {
            let preslug = title.value;                               
            let preslug2 = preslug.replace(/ /g,"-");;                
            let hasil = preslug2.replace(/[&\/\\#,+()$~%.'":*?!<>{}]/g,"");                
            slug.value = hasil.toLowerCase();
        });          
    </script>
@endsection