@extends('layouts.app')

@section('content')
    <div>
        <div>
            <a href="{{ route('gear.create') }}" style="padding: 4px; border: 1px solid black;">Add Gear</a>
        </div>

        @if ($gears)
            <table style="margin-top: 20px;">
                @foreach ($gears as $gear)
                    <tr>
                        <td style="padding-right: 20px;">{{ $gear->id }}</td>
                        <td style="padding-right: 20px;">{{ $gear->user->email }}</td>
                        <td style="padding-right: 20px;">{{ $gear->name }}</td>
                        <td style="padding-right: 20px;">{{ $gear->description }}</td>
                        <td>
                            <a href="/gear/{{ $gear->id }}/update"
                                style="padding: 4px; border: 1px solid black;"
                            >
                                Update
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    </div>
@endsection
