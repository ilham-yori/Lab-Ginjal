@extends('admin.layout.main')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Post</h1>                
    </div>
    <!-- End of Page Heading -->
    
   <div class="col-md-12">
        <form action="store" method="POST" enctype="multipart/form-data">
            @csrf
            <table style="width: 100%">
                <tr>
                    <th>Judul</th>
                    <td>
                        <input type="text" id="title" maxlength="140" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" autofocus>
                        <label for="" id="judulMax"></label>
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
                        <input type="text" id="slug" name="slug" class="form-control mt-3 @error('slug') is-invalid @enderror" value="{{ old('slug') }}">
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
                        <input type="file" name="thumbnail" class="form-control my-3 @error('thumbnail') is-invalid @enderror">   

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
                        <textarea class="ckeditor" class="" name="body" id="ckeditor" cols="30" rows="10">{{ old('body') }}</textarea>                           
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
            const judulMax = document.querySelector("#judulMax");          
            
            title.addEventListener("keyup", function() {
                let preslug = title.value;                               
                let preslug2 = preslug.replace(/ /g,"-");;                
                let hasil = preslug2.replace(/[&\/\\#,+()$~%.'":*?!<>{}]/g,"");                
                slug.value = hasil.toLowerCase();
                judulMax.innerHTML = title.value.length + '/140';
            });
    </script>
@endsection