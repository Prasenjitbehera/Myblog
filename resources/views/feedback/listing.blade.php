<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Feedback</title>
<link rel="stylesheet" href="{{ asset('/css/style.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<body>
<div id="main">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h5>Add Feedback</h5>
  <form method="post" action="/insert" enctype="multipart/form-data">
        {{ csrf_field() }}
  <div class="col-md-6">
  <div class="form-group">
  <label>Select user</label>
  <select class="form-control" name="user_id">
  <option value="0" disabled="true" selected="true">Select user</option>
  @php($count=1) @foreach($users as $usr)
  <option value="{{$usr->id}}">{{ $usr->name}}</option>
  @endforeach
  </select>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
  <label>Write Feedback</label>
  <textarea name="feedback" class="form-control" rows="4"></textarea>
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
  <button type="submit" class="btn btn-info">Submit</button>
  </div>
  </div>
  </form>
  </div>
  <div class="col-md-12">
  
  <h5 class="mb-2">Feedback Listing</h5>

  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Feedback</th>
    </tr>
  </thead>
  <tbody>
  @php($count=1) @foreach($users as $usr)
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{ $usr->name}}</td>
      <td>
      <?php $roles =  App\Http\Controllers\UserController::getAllroles($usr->id)?>
       @foreach($roles as $rl)
       <span class="badge badge-light">{{$rl->name}}</span>
       @endforeach
      </td>
    </tr>
 @endforeach
  </tbody>
</table>


</div>
</div>

			</div>
		</div>
	</div>
                         
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
         function getMessage() {
            $.ajax({
                headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
               type:'POST',
               url:'/getmsg',
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>