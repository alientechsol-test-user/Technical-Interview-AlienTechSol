@extends('layouts.app')



@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chat</div>
                <div class="panel-body">
                   @if($errors->any())
                       @foreach($errors->all() as $error)  
                         <div class="alert alert-danger">
                            {{ $error }}
                         </div>
                       @endforeach       
                   @endif
                  <form action="{{ route('message.store') }}" method="post" id="message-form">
                   <div class="form-group">
                        <label for="comment">Message:</label>
                          <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                        </div>
                     {{csrf_field()}}

                  <div class="g-recaptcha" data-sitekey="6Ldv6yEUAAAAAHbZlZl9pc8KRiuC-3B3VNbS_dSH"></div>

                      <input type="submit" value="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('Scripts')
   <!--  <script>
      $('#message-form').submit(function(){
   
      });
   </script> -->
@endsection
