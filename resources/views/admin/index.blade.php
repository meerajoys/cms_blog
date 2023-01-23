<x-admin-master>

    @section('content')

        {{-- for giving permissions --}}
        {{-- @if (auth()->user()->userHasRole('admin')) --}}


        <?php $name = Str::ucfirst(auth()->user()->name)?>

        <h1 class="font-weight-bold text-primary">Welcome {{$name}} </h1>

        {{-- @endif --}}

    @endsection

</x-admin-master>
