@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home Page</div>

                <div class="card-body">
                    
                        @if(count($scores) > 0 )
                        <?php $x = 0; ?>
                        <div class="row">
                        <div class="col-md-2">S/N</div>
                        <div class="col-md-3">Name</div>
                        <div class="col-md-2">Subject</div>
                        <div class="col-md-4">Test Score</div>
                        </div>
                        @foreach ($scores as $item)
                        <?php $x++; ?>
                        <div class="row">
                    <div class="col-md-2">{{  $x }}</div>
                        <div class="col-md-3">{{ $item -> quiz_name }} </div>
                        <div class="col-md-2">{{ $item -> subject }}</div>
                    <div class="col-md-4">{{ $item -> score }} / {{  $item -> total }}</div>
                        </div>
                            
                        @endforeach

                        @else

                        <h2>
                            NO TEST TAKEN SO FAR


                        </h2>
                        
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
