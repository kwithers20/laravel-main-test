@if (session('success'))
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <div class="p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        <span class="font-bold">Success!</span><br> {{ session('success') }}
    </div>
</div>
@endif

@if (session('error'))
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <span class="font-bold">Error!</span><br> {{ session('error') }}
    </div>
</div>
@endif

@if ($errors->any())
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
    <div class="p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li class="font-bold">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
    