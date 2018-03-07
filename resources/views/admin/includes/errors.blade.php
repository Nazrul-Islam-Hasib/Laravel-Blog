<!--Checking errors while save post starts-->
  @if(count($errors) > 0)

    <ul class="list-group">
      @foreach($errors->all() as $error)

        <li class="list-group-item text-danger">
          {{ $error }}
        </li>

      @endforeach
    </ul>

  @endif

<!--Checking errors while save post ends-->