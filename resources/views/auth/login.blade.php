@extends('layouts.blank')

@section('content')
<div class="container">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>



    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <img class="center-block" src="{{asset("images/aldea/logo.png")}}" >

        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
        <div class="col-md-8 col-md-offset-1 col-sm-12 col-xs-12">

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-xs-3 control-label">E-Mail</label>

                            <div class="col-md-8 col-xs-9">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-xs-3 control-label">Şifre</label>

                            <div class="col-md-8 col-xs-9">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                            <div class="col-md-7 col-md-offset-4 col-xs-7 col-xs-offset-4">


                                <div class ="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Beni hatırla
                                    </label>
                                </div>

                            </div>
                        <div class="col-md-4 col-md-offset-4 col-xs-4 col-xs-offset-4">
                            <a class="btn btn-link btn-sm" href="{{ url('/password/reset') }}">Şifremi Unuttum</a>


                        </div>


                            <div class="col-md-2 col-xs-2">

                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-sign-in"></i> Giriş
                                </button>


                            </div>





                    </form>
                </div>
            </div>

</div>
@endsection
