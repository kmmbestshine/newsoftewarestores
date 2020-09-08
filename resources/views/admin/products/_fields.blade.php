<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('product_name', 'Product Name') }}
    {{ Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Enter name']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
    {{ Form::label('price', 'Price') }}
    {{ Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'Rs2500']) }}
    <span class="text-danger">{{ $errors->has('price') ? $errors->first('price') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('descript', 'Cover Description') }}
    {{ Form::textarea('descript',$product->descript,['class'=>'form-control border-input','placeholder'=>'Enter Cover Description']) }}
    <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Description','id'=>'mytextarea']) }}
    <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('studentprice', 'Student Price') }}
    {{ Form::text('studentprice',$product->studentprice,['class'=>'form-control border-input','placeholder'=>'Enter studentprice']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','Cover Image') }}
    {{ Form::file('image', ['class'=>'form-control border-input', 'id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('description') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
    {{ Form::label('file','Multiple Images') }}
    {{ Form::file('images[]', ['class'=>'form-control border-input', 'id' => 'images' ,'multiple']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image') ? $errors->first('description') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('website', 'Website') }}
    {{ Form::text('website',$product->website,['class'=>'form-control border-input','placeholder'=>'Website']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    {{ Form::label('youtube', 'Youtube Link') }}
    {{ Form::text('youtube',$product->youtube,['class'=>'form-control border-input','placeholder'=>'Youtube Link']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
