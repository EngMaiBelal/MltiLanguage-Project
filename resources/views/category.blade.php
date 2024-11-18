<!DOCTYPE html>
@if (App::currentLocale() == 'en')
    <html lang="en" dir="ltr">
@else
    <html lang="ar" dir="rtl">
@endif
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success">
            {!! session('success') !!}
        </div>
    @endif
    <ul>
        <button class="btn btn-primary">
            @foreach (LaravelLocalization::getSupportedLocales() as $lang => $value)
                @if ($lang == App::currentLocale())
                    @continue
                @endif
                <a class="text-white" rel="alternate" hreflang="{{ $lang }}" href="{{ LaravelLocalization::getLocalizedURL($lang, null, [], true) }}"class="flex-c-m trans-04 p-lr-25">
                    {{ Str::upper($lang) }}
                </a>
            @endforeach
        </button>
    </ul>
    <div class="container">
        <h1>{{ __('frontend.cat-header')}}</h1>
        <form class="w-50 m-auto mt-5" action="{{route('category.store')}}"  method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">{{__('frontend.name_ar')}}</label>
                <input name="name[ar]" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name.ar') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">{{__('frontend.name_en')}}</label>
                <input name="name[en]" type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp">
                @error('name.en') <p class="text-danger">{{ $message }}</p> @enderror
            
            </div>
            <button type="submit" class="btn btn-primary">{{__('frontend.submit')}}</button>
        </form>

        <div class="mb-3">
            <h1 class="mt-5">{{__('frontend.name')}}</h1>
        

          <ol class="bg-dark text-white"> 
                @foreach($categories as $category)
                   <li> {{ $category->getTranslation('name', App::currentLocale()) }}</li>
                @endforeach
          </ol>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>