 @if ($errors->any())
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-5 mb-4">
                     <div class="alert alert-danger">
                         <ul>
                             @foreach ($errors->all() as $error)
                                 <p>{{ $error }}</p>
                             @endforeach
                         </ul>
                     </div>
             </div>
         </div>
    </div>
 @endif

