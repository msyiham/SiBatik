<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<style>
    .down {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}

@-webkit-keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}

@keyframes fadeInDown {
  0% {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: none;
    transform: none;
  }
}
/* Simple CSS3 Fade-in Animation */
@-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
@keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

.fadeIn {
  opacity:0;
  -webkit-animation:fadeIn ease-in 1;
  -moz-animation:fadeIn ease-in 1;
  animation:fadeIn ease-in 1;

  -webkit-animation-fill-mode:forwards;
  -moz-animation-fill-mode:forwards;
  animation-fill-mode:forwards;

  -webkit-animation-duration:1s;
  -moz-animation-duration:1s;
  animation-duration:1s;
}

.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}

.fadeIn.third {
  -webkit-animation-delay: 0.8s;
  -moz-animation-delay: 0.8s;
  animation-delay: 0.8s;
}

.fadeIn.fourth {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}
.fadeIn.five {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}
.fadeIn.six {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}
.fadeIn.seven {
  -webkit-animation-delay: 1s;
  -moz-animation-delay: 1s;
  animation-delay: 1s;
}
.content{
    -webkit-border-radius: 10px 10px 10px 10px;
  border-radius: 10px 10px 10px 10px;
  background: #fff;
  padding: 30px;
  width: 90%;
  max-width: 450px;
  position: ;
  padding: 0px;
  -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
  text-align: center;

  
}
.tengah{
    position: absolute ;margin-left: -200px; 
    bottom:50%; 
    left: 50%; 
    width: 400px;
    height: 220px; 
    align-items: center;
    justify-content: center;
    height: 50%;
}
</style>
<div class="container tengah" ">
<br>  

<div class=" regis down content">
<article class="card-body mx-auto" style="max-width: 400px;">
    <img style="width:150px; height:150px;" class="fadeIn first" src={{ asset('images/SiBatik.png') }}>
<form action="{{ route('customers.store') }}" method="POST">
  @csrf
	<h4 class="card-title mt-3 text-center fadeIn ">Create Account</h4>
  <span>
    @error('nama')
      <div class="text-danger">{{ $message }}</div>
    @enderror
  </span>
  <div class="form-group input-group fadeIn first">
		<div class="input-group-prepend ">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Full name" type="text">
  </div> <!-- form-group// -->
    <span>
      @error('email')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </span>
    <div class="form-group input-group fadeIn second">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email address" type="email">
  </div> <!-- form-group// -->
    <span>
      @error('telepon')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </span>
    <div class="form-group input-group fadeIn third">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="telepon" class="form-control @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" placeholder="Phone number" type="text">
	</div> <!-- form-group end.// -->
    <span>
      @error('alamat')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </span>
    <div class="form-group input-group fadeIn fourth">
    	<div class="input-group-prepend ">
		    <span class="input-group-text"> <i class="fa fa-address-card"></i> </span>
		</div>
        <input name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat" type="text">
    </div> <!-- form-group// -->
    <span>
      @error('password')
        <div class="text-danger">{{ $message }}</div>
      @enderror
    </span>
    <div class="form-group input-group fadeIn six ">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" type="password" name="password">
    </div> 
    <!-- form-group// -->  
    {{-- <div class="form-group input-group fadeIn six ">
    	<div class="input-group-prepend">
		    <span class="input-group-text">  </span>
		</div>
        <div>
          <input class="form-control " placeholder="status" type="name" name="status">
          </div> --}}
          {{-- <input class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" type="password" name="password"> --}}                                
    <div class="form-group fadeIn seven">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
  </div> <!-- form-group// -->      
    <p class="text-center fadeIn five">Have an account? <a href=/login>Log In</a> </p>                                                                 
</form>
