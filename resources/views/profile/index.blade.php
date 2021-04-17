<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<title>Relationship</title>
<link rel="stylesheet" href="{{ asset('/css/style.css')}}">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<body>
<div id="main">
  <div class="container">
  <div id = 'msg'>This message will be replaced using Ajax. 
         Click the button to replace the message.</div>
         <button type="button" class="btn btn-primary"  onClick="getMessage()">Replace Message</button>

<div class="row">
<div class="col-md-12">

<h3>Polymorphic Relationships</h3>
<div class="row">
<div class="col-md-2 card card-body mr-2 bg-light">
<h6>posts_table</h6>
  <p> id </p>
  <p>title</p>
  <p>content</p>
</div>
<div class="col-md-2 card card-body mr-2 bg-light">
<h6>pages_table</h6>
  <p> id </p>
  <p>body</p>
</div>
<div class="col-md-2 card card-body mr-2 bg-light">
<h6>videos_table</h6>
  <p> id </p>
  <p>video</p>
</div>

<div class="col-md-2 card card-body mr-2 bg-light">
<h6>morphic_comments_table</h6>
  <p>id</p>
  <p>commentable_id</p>
  <p>commentable_type</p>
 <p> date</p>
 <p> body</p>
</div>
</div>
</div>
</div>
  <div class="row">
  <div class="col-md-12">
  <h5 class="mb-2">Many To Many Relatonship(belongsToMany) Example</h5>
  <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">User</th>
      <th scope="col">Roles</th>
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

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Users</th>
    </tr>
  </thead>
  <tbody>
  @php($count=1) @foreach($disRoles as $rl)
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{ $rl->name}}</td>

      <td>
      <?php $allUsers =  App\Http\Controllers\UserController::getAllusers($rl->id)
       ?>
      @foreach($allUsers as $us)
       <span class="badge badge-light">{{$us->name}}</span>
       @endforeach
      </td>
    </tr>
 @endforeach
  </tbody>
</table>
</div>
</div>
<h5 class="mb-2">hasOne,hasMany,belongsTo  Example</h5>
<div class="accordion" id="faq">
@foreach($users as $usr)
                    <div class="card">
                        <div class="card-header" id="faqhead{{ $usr->id}}">
                            <a href="#" class="btn btn-header-link collapsed" data-toggle="collapse" data-target="#faq{{ $usr->id}}"
                            aria-expanded="true" aria-controls="faq{{ $usr->id}}">{{ $usr->name}} - <span class="badge badge-light">{{ $usr->getAddress->location}}</span></a>

                            <?php   $totalpost =  App\Http\Controllers\UserController::getTotalPost($usr->id) ?>
                            <div class="float-right"><span style="padding-right: 30px;">({{$totalpost}})Posts</span></div>
                        </div>
                        <div id="faq{{ $usr->id}}" class="collapse" aria-labelledby="faqhead{{ $usr->id}}" data-parent="#faq">
                            <div class="card-body">
                            <div class="container">
		<div class="col-md-12">
			<div class="body_comment">
				<div class="row">
					<ul id="list_comment" class="col-md-12">
						<!-- Start List Comment 1 -->
                        <?php if($usr->getPost->isNotEmpty()) {?>
                        @foreach($usr->getPost as $ps)
						<li class="box_result row">
							<div class="avatar_comment col-md-1">
								<img src="{{ asset('/images/faq.png')}}" alt="avatar"/>
							</div>
							<div class="result_comment col-md-11">
								<!-- <h4>{{ $usr->name}}</h4> -->
								<h4 class="post-title">{{ $ps->post_content}}</h4>
								<ul class="child_replay">
                               <?php    $all_comments =  App\Http\Controllers\UserController::getCommentData($ps->id) ?>
                               <?php ?>
                               <?php if($all_comments->isNotEmpty()) {?>
                               @foreach( $all_comments  as $cmt)
									<li class="box_reply row mb-3">
										<div class="avatar_comment col-md-1">
											<img class="img-circle" src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
										</div>
										 <div class="result_comment col-md-11">
											<p>{{ $cmt->comment}}</p>
										</div>
									</li>
                                @endforeach
                            <?php }else{ ?>
                                <p>No result found!</p>
                           <?php  }?>
								</ul>
							</div>
						</li>
						
					@endforeach
                    <?php }else{ ?>
<p>No post yet!</p>
                    <?php } ?>
					</ul>
		
				</div>
			</div>
		</div>
	</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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