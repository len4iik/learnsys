@extends('layouts.inner')

@section('content')
    <link type='text/css' rel='stylesheet' href='../skillbar.css'/>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- skill bar source: http://codepen.io/tamak/pen/hzEer -->
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('.skillbar').each(function(){
                jQuery(this).find('.skillbar-bar').animate({
                    width:jQuery(this).attr('data-percent')
                },6000);
            });
        });
    </script>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">User profile</h1>
    </div>
    <div class="container">
        <div class="col-md-offset-2">
            <div class="profile">
                <section id="info-page">
                    <header style="display: block; margin-bottom: 12px; ">
                        <h1 style="color: #C2C2C2">@if(Auth::user()->id == $user->id)Your @else {{ $user->name }}'s @endif personal data</h1>
                        <h2 class="profile-h1">{{ $user->name }} {{ $user->surname }}</h2>
                        @if(Auth::user()->id == $user->id)
                        <h3> Email: {{ $user->email }}</h3>
                        @endif
                        <h3>Learning style: {{ $user->learning_style }}</h3>
                        <h6>Birth date: {{ $user->birth_date }}</h6>
                    </header>

                    @if(Auth::user()->id == $user->id)
                    <div class="span2">
                        <div class="btn-group">
                            <a href="/editProfile" class="grey-button"><i class="glyphicon glyphicon-pencil"></i> edit personal data</a>
                        </div>
                    </div>
                    @endif

                    <h1 style="color: #C2C2C2">@if(Auth::user()->id == $user->id)Your @else {{ $user->name }}'s @endif knowledge skill meters</h1>

                    <div class="skillbar clearfix " data-percent="{{ $user->profile->html }}%">
                        <div class="skillbar-title" style="background: #ffa31a;"><span>HTML</span></div>
                        <div class="skillbar-bar" style="background: #ffd699;"></div>
                        <div class="skill-bar-percent">{{ $user->profile->html }}%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="{{ $user->profile->css }}%">
                        <div class="skillbar-title" style="background: #0066ff;"><span>CSS</span></div>
                        <div class="skillbar-bar" style="background: #80b3ff;"></div>
                        <div class="skill-bar-percent">{{ $user->profile->css }}%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="{{ $user->profile->js }}%">
                        <div class="skillbar-title" style="background: #009900;"><span>JavaScript</span></div>
                        <div class="skillbar-bar" style="background: #99ff99;"></div>
                        <div class="skill-bar-percent">{{ $user->profile->js }}%</div>
                    </div> <!-- End Skill Bar -->

                    <div class="skillbar clearfix " data-percent="{{ $user->profile->php }}%">
                        <div class="skillbar-title" style="background: #6600cc;"><span>PHP</span></div>
                        <div class="skillbar-bar" style="background: #b366ff;"></div>
                        <div class="skill-bar-percent">{{ $user->profile->php }}%</div>
                    </div> <!-- End Skill Bar -->

                    @if(Auth::user()->id != $user->id)
                        <div class="span2">
                            <div class="btn-group">
                                <a href="/compareprofiles/{{ $user->id }}" class="btn btn-primary">Compare profiles</a>
                            </div>
                        </div>
                    @endif
                </section>
        </div>
    </div>
    </div>
@endsection