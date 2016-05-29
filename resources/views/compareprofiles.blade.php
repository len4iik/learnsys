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
    <style>
        table {
            width: 100%;
        }
        td {
            width: 50%;
            padding-left: 10px;
            padding-right: 10px;
        }
    </style>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Profiles' comparison</h1>
            <table class="table-responsive">
                <tr>
                    <td>
                        <section id="info-page">
                            <header style="display: block; margin-bottom: 12px; ">
                                <h1 style="color: #C2C2C2">{{ $user->name }}'s personal data</h1>
                                <h2 class="profile-h1">{{ $user->name }} {{ $user->surname }}</h2>
                                <h3>Learning style: {{ $user->learning_style }}</h3>
                                <h6>Birth date: {{ $user->birth_date }}</h6>
                            </header>

                            <h1 style="color: #C2C2C2">Knowledge skill meters</h1>

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

                            <a href="/profile/{{ $user->id }}" class="btn btn-primary">{{ $user->name }}'s profile</a>
                        </section>
                    </td>
                    <td>
                        <section id="info-page">
                            <header style="display: block; margin-bottom: 12px; ">
                                <h1 style="color: #C2C2C2">Your personal data</h1>
                                <h2 class="profile-h1">{{ Auth::user()->name }} {{ Auth::user()->surname }}</h2>
                                <h3>Learning style: {{ Auth::user()->learning_style }}</h3>
                                <h6>Birth date: {{ Auth::user()->birth_date }}</h6>
                            </header>

                            <h1 style="color: #C2C2C2">Your knowledge skill meters</h1>

                            <div class="skillbar clearfix " data-percent="{{ Auth::user()->profile->html }}%">
                                <div class="skillbar-title" style="background: #ffa31a;"><span>HTML</span></div>
                                <div class="skillbar-bar" style="background: #ffd699;"></div>
                                <div class="skill-bar-percent">{{ Auth::user()->profile->html }}%</div>
                            </div> <!-- End Skill Bar -->

                            <div class="skillbar clearfix " data-percent="{{ Auth::user()->profile->css }}%">
                                <div class="skillbar-title" style="background: #0066ff;"><span>CSS</span></div>
                                <div class="skillbar-bar" style="background: #80b3ff;"></div>
                                <div class="skill-bar-percent">{{ Auth::user()->profile->css }}%</div>
                            </div> <!-- End Skill Bar -->

                            <div class="skillbar clearfix " data-percent="{{ Auth::user()->profile->js }}%">
                                <div class="skillbar-title" style="background: #009900;"><span>JavaScript</span></div>
                                <div class="skillbar-bar" style="background: #99ff99;"></div>
                                <div class="skill-bar-percent">{{ Auth::user()->profile->js }}%</div>
                            </div> <!-- End Skill Bar -->

                            <div class="skillbar clearfix " data-percent="{{ Auth::user()->profile->php }}%">
                                <div class="skillbar-title" style="background: #6600cc;"><span>PHP</span></div>
                                <div class="skillbar-bar" style="background: #b366ff;"></div>
                                <div class="skill-bar-percent">{{ Auth::user()->profile->php }}%</div>
                            </div> <!-- End Skill Bar -->

                            <a href="/profile/{{ Auth::user()->id }}" class="btn btn-primary">Your profile</a>
                        </section>
                    </td>
                </tr>
            </table>
    </div>
@endsection