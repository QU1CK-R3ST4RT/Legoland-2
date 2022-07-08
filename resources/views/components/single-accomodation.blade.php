<div class="m-5 bg-gray-200 rounded-t-md shadow-lg">
    <div class="flex justify-center">
        <img src="{{ $src }}" class="rounded-md w-full">
    </div>
    <div class="flex flex-col p-5 text-lg">
        <p class="text-2xl mb-5"><b> {{ $name }} </b></p>
        {!! $taken !!}
        <p>kamer type <b>{{$room_type}}</b></p>
        <p>beschrijving: {{ $desc }} </p>
        @if(\Illuminate\Support\Facades\Auth::user())
            {!! $html !!}
        @endif
    </div>
</div>
