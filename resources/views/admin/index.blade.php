<x-admin-master>

    @section('content')

        {{-- for giving permissions --}}
        {{-- @if (auth()->user()->userHasRole('admin')) --}}



        <h1 class="font-weight-bold text-primary">Welcome {{auth()->user()->Str::upper}}</h1>

        {{-- @endif --}}

    @endsection

</x-admin-master>
