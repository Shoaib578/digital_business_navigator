<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/login.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




    
    <title>Login</title>
</head>
<body>

    <div class="form">

      

        <ul class="tab-group">
          <li class="tab active" id="signup_turn"><a href="#signup" id="signup_turn">Sign Up</a></li>
          <li class="tab"  id="login_turn"><a href="#login" id="login_turn">Log In</a></li>
        </ul>
        @if (session('status'))
        <div class="bg-gray-500 p-4 rounded-lg mb-6 text-white text-center" style="background-color:#0096FF;color:white;height:50px;border-radius:5px;text-align:center;padding-top:20px;font-weight:bold">
            {{ session('status') }}
        </div>
        <br >
    @endif
        <div class="tab-content">
          <div id="signup">   
            <h1>Sign Up for Free</h1>
            
            <form action="{{route('signup')}}" method="POST">
              @csrf
            <div class="top-row">
              <div class="field-wrap">
               
                <input type="text" required name="first_name" autocomplete="off" placeholder="First Name *"/>
              </div>
          
              <div class="field-wrap">
               
                <input type="text"required name="last_name" autocomplete="off" placeholder="Last Name *"/>
              </div>
            </div>
  
            <div class="field-wrap">
             
              <input type="email"required name="email" autocomplete="off" placeholder="Email Address *"/>
            </div>


            <div class="field-wrap">
             
              <input type="text"required name="company_name" autocomplete="off" placeholder="Compnay Name *"/>
            </div>
            
            <div class="field-wrap">
              
              <input type="password"required name="password" autocomplete="off" placeholder="Password *"/>
            </div>


            <div  style="float:left;display:flex;flex-direction:row;">
             
              <input type="checkbox" required name="privacy" style="float: left;" >
              

            </div>

            <h4 style="float:left;color:white;font-size:15px;margin-left:10px">Agree with our <a href="{{ route('terms_and_conditions') }}">Terms & Conditions.</a></h4>

            
            <br>
            <br>

            
            <button type="submit" class="button button-block">Get Started</button>
            

            </form>
  
          </div>
          
          <div id="login">   
            <h1>Welcome Back!</h1>
            
            <form action="{{route('login')}}" method="post">
              @csrf
              <div class="field-wrap">
             
              <input type="email"required autocomplete="off" name="email" placeholder="Email Address *"/>
            </div>
            
            <div class="field-wrap">
             
              <input type="password"required autocomplete="off" name="password" placeholder="Password *"/>
            </div>
            
           
            
            <button class="button button-block">Log In</button>
            
            </form>
            
          </div>
          
        </div><!-- tab-content -->
        
  </div> <!-- /form -->


  <script type="text/javascript" src="{{ URL::asset('js/login.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>