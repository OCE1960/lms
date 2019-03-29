@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Quiz Question</div>

                <div class="card-body">
                        <form method="POST" action="/createquiz">
                            @csrf

                            <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <select class="form-control" id="subject" name="subject">
                                      <option>PHP</option>
                                      <option>Python</option>
                                      <option>JAVA</option>
                                      <option>C++</option>
                                      <option>C#</option>
                                    </select>
                                  </div>
                        
                            <div class="form-group">
                            <label for="question">Question</label>
                            <textarea placeholder="Question" class="form-control" id="question" name="question" required > </textarea>
                                  </div>
                            <div class="form-group">
                                <label for="option1">Option1</label>
                                <textarea placeholder="Option1" class="form-control" id="option1" name="option1" required > </textarea>
                                        </div>
                            <div class="form-group">
                                <label for="option2">Option2</label>
                                <textarea placeholder="Option2" class="form-control" id="option2" name="option2" required > </textarea>
                                        </div>
                            <div class="form-group">
                                <label for="option3">Option3</label>
                                <textarea placeholder="Option3" class="form-control" id="option3" name="option3" required > </textarea>
                                        </div>
                        <div class="form-group">
                                <label for="option4">Option4</label>
                                <textarea placeholder="Option4" class="form-control" id="option4" name="option4" required > </textarea>
                                </div>
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea placeholder="answer" class="form-control" id="answer" name="answer" required > </textarea>
                            </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
