<div class="row mb-3">
    <div class="col-md-6 col-sm-6 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('name') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Name
            <sup class="text-danger">*</sup>
        </label>
        <div class="form-group">
            {{ Form::text('name', null, ['class' => $error_class.'form-control', 'id' => 'name', 'required' => true]) }}
            @if ($errors->has('name'))
                <p class="text-danger">{{$errors->first('name')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-6 col-sm-6 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('category') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Category
            <sup class="text-danger">*</sup>
        </label>
        <div class="form-group">
            {{ Form::text('category', null, ['class' => $error_class.'form-control', 'id' => 'category', 'required' => true]) }}
            @if ($errors->has('category'))
                <p class="text-danger">{{$errors->first('category')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('slug') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Slug
            <sup class="text-danger">*</sup>
        </label>
        <div class="form-group">
            {{ Form::text('slug', null, ['class' => $error_class.'form-control', 'id' => 'slug', 'required' => true]) }}
            @if ($errors->has('slug'))
                <p class="text-danger">{{$errors->first('slug')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('tag') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Tag
            <sup class="text-danger">*</sup>
        </label>
        <div class="form-group">
            {{ Form::text('tag', null, ['class' => $error_class.'form-control', 'id' => 'tag', 'required' => true]) }}
            @if ($errors->has('tag'))
                <p class="text-danger">{{$errors->first('tag')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('banner') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Banner
            @if(!file_exists('storage/'.@$blog->image))<sup class="text-danger">*</sup>@endif
        </label>
        <div class="form-group">
            {{ Form::file('banner', ['class' => $error_class.'form-control', 'id' => 'banner', 'required' =>  file_exists('storage/'.@$blog->image) ? false : true]) }}
            @if(@$blog->image && file_exists('storage/'.@$blog->image))
                <img src="{{asset('storage/'.$blog->image)}}" alt="banner" width="200">
            @endif
            @if ($errors->has('banner'))
                <p class="text-danger">{{$errors->first('banner')}}</p>
            @endif
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12 my-2">
        @php /** @var string $errors */
            $error_class = $errors->has('description') ? 'parsley-error ' : ''; @endphp
        <label for="name" class="form-label">Description
            <sup class="text-danger">*</sup>
        </label>
        <div class="form-group">
            {{ Form::textarea('description',null, ['class' => $error_class.'form-control editor', 'id' => 'description']) }}
            @if ($errors->has('description'))
                <p class="text-danger">{{$errors->first('description')}}</p>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button type="submit" class="btn btn-primary waves-effect waves-light">
            <i class="fa fa-save"></i> Save
        </button>
    </div>
</div>
