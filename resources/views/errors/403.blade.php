<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Access Denied — KURA Recruitment</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <style>
    body {
      background: #ecf0f1;
      font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    }
    .error-page {
      width: 100%;
      max-width: 480px;
      margin: 80px auto;
      text-align: center;
    }
    .error-code {
      font-size: 100px;
      font-weight: 700;
      color: #dd4b39;
      line-height: 1;
    }
    .error-icon {
      font-size: 64px;
      color: #dd4b39;
      margin-bottom: 20px;
    }
    .error-title {
      font-size: 24px;
      font-weight: 600;
      color: #333;
      margin-bottom: 10px;
    }
    .error-desc {
      color: #666;
      margin-bottom: 30px;
      font-size: 15px;
    }
    .role-badge {
      display: inline-block;
      background: #3c8dbc;
      color: #fff;
      padding: 3px 10px;
      border-radius: 12px;
      font-size: 13px;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="error-page">
    <div class="error-icon">
      <i class="fa fa-lock"></i>
    </div>
    <div class="error-code">403</div>
    <div class="error-title">Access Denied</div>
    <p class="error-desc">
      You do not have permission to view this page.<br>
      Please contact your system administrator if you believe this is a mistake.
    </p>

    @auth
      <p>
        Logged in as: <strong>{{ Auth::user()->name }}</strong><br>
        @if(Auth::user()->roles->isNotEmpty())
          Role(s):
          @foreach(Auth::user()->roles as $role)
            <span class="role-badge">{{ $role->name }}</span>
          @endforeach
        @else
          <span class="text-danger">No role assigned — contact Admin.</span>
        @endif
      </p>
    @endauth

    <a href="{{ url('/dashboard') }}" class="btn btn-primary">
      <i class="fa fa-home"></i> Back to Dashboard
    </a>
  </div>
</body>
</html>
