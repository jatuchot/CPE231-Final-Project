@extends('layouts.app')

@section('title', 'Data Importer')

@section('content')
<div class="card-header">
    @include('components.title', [
        "title" => "CSV File Data Importer",
        "desc" => "For importing .csv file into MySQL table"
    ])
</div>
<div class="card-body">
    <h5>Finished!</h5>
    <p>Affected Rows: {{ count($keys) }}</p>
    <h6>Data:</h6>
    <div class="table-responsive-sm">
        <table class="table">
            <tr>
                <?php $cols = array_keys($keys[0]); ?>
                @foreach( $cols as $col )
                    <th>{{ $col }}</th>
                @endforeach
            </tr>
            @for( $i = 0; $i < count($keys); $i++ )
                <tr>
                    @for( $j = 0; $j < count($cols); $j++ )
                        <td>{{ $keys[$i][$cols[$j]] }}</td>
                    @endfor
                </tr>
            @endfor
        </table>
    </div>
</div>
@endsection

