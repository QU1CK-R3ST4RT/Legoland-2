<div class="m-5 bg-gray-200  shadow-lg">
    <div class="flex justify-center">
        <img src="{{ $src }}" class="rounded-md">
    </div>
    <div class="flex flex-col p-5 text-lg">
        <p class="text-2xl mb-5"><b> {{ $name }} </b></p>
        <p><b>{{$name}}</b> heeft plek voor <b>{{ $cap }}</b> personen.</p>
        <p>en heeft een hoogte van <b>{{ $height }}</b> meter!</p>
        <p>beschrijving: {{ $desc }} </p>
        @if(\Illuminate\Support\Facades\Auth::user())
            {!! $html !!}
        @endif
    </div>
</div>
