@if ($errors->any())
    <div class="alert-danger">
        <div class="link">
            @foreach($errors->all() as $error)
                <font color="red"><li>{{ $error }}</li></font>
            @endforeach
        </div>
    </div>
@endif
