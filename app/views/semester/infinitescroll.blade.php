@extends('layouts.home')

@section('container')
 <div class="container" style="margin-top: 70px; width:500px">

    <div class='row clearfix'>
    <div class='col-md-12'style="width:500px;background:#E7E7E7">
     <div class="scroll">
         <ul>
                 @foreach ($user as $data)
                 <p>
                     <li>
                         {{ $data->id }}
                         <p>&nbsp;</p>
                         {{ $data->seminame }}
                         <p>&nbsp;</p>
                         {{ $data->comments }}
                         <p>&nbsp;</p>
                         {{ $data->imagename }}
                     </li>
                 </p>

        
             @endforeach
         </ul>
               <!--  {{ $user->links() }} -->
                 <tr>
              <td colspan="5">{{ $user->links() }}</td>
            </tr>
      </div>
  </div>
</div>
</div>

      @stop