
@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <strong> <i class="fa-solid fa-circle-xmark"></i>{{ $error }}</strong><br>
        @endforeach
    </div>
@endif
