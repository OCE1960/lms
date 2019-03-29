@extends('layouts.app')
<script type="text/javascript">
var total_seconds = 60*10;
var C_minutes = parseInt(total_seconds/60);
var C_seconds = parseInt(total_seconds % 60);
function checkTime() {
        document.getElementById('quiz-time-left').innerHTML =  'Time Left: ' + C_minutes + '  Minutes ' +
        C_seconds + '  Seconds ';
        if(total_seconds <= 0){
              setTimeout('document.quiz.submit()',1);  
        }else{
                total_seconds = total_seconds - 1;
                C_minutes = parseInt(total_seconds/60);
                C_seconds = parseInt(total_seconds % 60);
                 setTimeout("checkTime()", 1000);
        }
}

setTimeout("checkTime()", 1000);


</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz Question for {{ Auth::user()->name }}</div>
                <div style="font-weight:bold" id="quiz-time-left"></div>

                <div class="card-body">
                    @if(count($questions) > 0)
                    <?php $x = 0; ?>
                    <form method="POST" name="quiz" id="quiz" action="/quiz">

                        @csrf
                    @foreach ($questions as $question)
                     <?php $x++; ?>
                     <div class="row list-group-item">
                    <div class="row form-group">
                    <?php echo $x.". ". $question -> question ?>
                    </div>

                    <div class="row form-group">
                    <label>
                    <input type="radio" name="{{ $x }}" value="{{$question -> option1  }}">A:  {{$question -> option1  }}
                            </label>
                    </div>
                    <div class="row form-group">
                    <label>
                    <input type="radio" name="{{ $x }}" value="{{$question -> option2  }}">B:  {{$question -> option2  }}
                            </label>
                    </div>
                    <div class="row form-group">
                            <label>
                            <input type="radio" name="{{ $x }}" value="{{$question -> option3  }}">C:  {{$question -> option3  }}
                                    </label>
                            </div>
                    <div class="row form-group">
                            <label>
                            <input type="radio" name="{{ $x }}" value="{{$question -> option4  }}">D:  {{$question -> option4  }}
                                    </label>
                            </div>

                    <div class="row form-group">
                            <label>
                            <input type="hidden" name="correct_answer[{{ $x }}]" value="{{$question -> answer  }}">
                                    </label>
                                    <label>
                            <input type="hidden" name="question[{{ $x }}]" value="{{$question -> question  }}">
                                    </label>
                            <label>
                                    <input type="hidden" name="subject[{{ $x }}]" value="{{$question -> subject  }}">
                                            </label>
                            
                            </div>

                    


                     </div>

                    <div>


                    </div>
                        
                    @endforeach

                    <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                </form>

               

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
