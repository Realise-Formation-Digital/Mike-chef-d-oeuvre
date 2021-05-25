@extends('layouts.app')

@section('content')
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset($gear)
            <form method="POST" action="{{ route('gear.patch', $gear->id) }}">

            {{ method_field('PATCH') }}
        @else
            <form method="POST" action="{{ route('gear.store') }}">
        @endisset
            @csrf

            <p>{{ isset($gear) ? 'Update gear' : 'Add gear' }}</p>

            <div>
                <input type="text"
                    placeholder="Gear name"
                    id="name"
                    name="name"
                    value="{{ $gear->name ?? '' }}"
                >
            </div>

            <div>
                <textarea placeholder="Gear description"
                    id="description"
                    name="description"
                >{{ $gear->description ?? '' }}</textarea>
            </div>

            <div>
                <button>Submit</button>
            </div>
        </form>
    </form>
@endsection
