@extends('layouts.inner')

@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">About this site</h1>
            <h2>
                This is a part of a bachelor's degree paper named "Adaptive web applications".<br>
                Author: Jeļena Šorohova, js11265
            </h2>
            <h3>
                <ul>
                    <li>This is a sample web application with multiple adaptivity technologies used.</li>
                    <li>Here you can see a navigation adaptation based on user's knowledge level.</li>
                    <li>Next, a content adaptiveness based on user's learning style.</li>
                    <li>Open learner model is used to represent information to students.</li>
                    <li>Student can compare their knowledge level with others.</li>
                    <li>Student can read theory or do exercises.</li>
                    <li>Student can comment theory pages.</li>
                </ul>
                For more detailed information: read my bachelor's degree paper.
            </h3>
            <br>
            <p>
                Please, don't take learning materials seriously. This site was created to show adaptation for different users based on user models, not to teach users.<br>
                Knowledge quiz and learning materials source: <a href="http://www.w3schools.com">W3Schools</a>.<br>
                Styles quiz source: <a href="https://rapidbi.com/learningstyles/">RapidBI Learning styles</a><br>
            </p>
        </div>
    </div>
@endsection