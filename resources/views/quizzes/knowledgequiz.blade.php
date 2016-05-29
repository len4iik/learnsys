@extends('layouts.inner')

@section('content')
    <link type='text/css' rel='stylesheet' href='quiz.css'/>
    <script type="text/javascript">
        var questions = [{
            question: "What is the correct HTML for adding a background color?",
            choices: ['&lt;body style="background-color:yellow;">', '&lt;background>yellow&lt;/background>', '&lt;body bg="yellow">'],
            correctAnswer: 0,
            questionType: "html"
        }, {
            question: "Choose the correct HTML element to define important text.",
            choices: ['&lt;i>', '&lt;strong>', '&lt;important>', '&lt;b>'],
            correctAnswer: 1,
            questionType: "html"
        }, {
            question: "What is the correct HTML for making a checkbox?",
            choices: ['&lt;check>', '&lt;check>', '&lt;input type="check">', '&lt;input type="checkbox">'],
            correctAnswer: 3,
            questionType: "html"
        }, {
            question: "Which of these elements are all &lt;table> elements?",
            choices: ['&lt;table>&lt;tr>&lt;tt>', '&lt;table>&lt;head>&lt;tfoot>', '&lt;thead>&lt;body>&lt;tr>', '&lt;table>&lt;tr>&lt;td>'],
            correctAnswer: 3,
            questionType: "html"
        }, {
            question: "Which HTML attribute specifies an alternate text for an image, if the image cannot be displayed?",
            choices: ['alt', 'longdesc', 'title', 'src'],
            correctAnswer: 0,
            questionType: "html"
        }, {
            question: "Which is the correct CSS syntax?",
            choices: ['body:color=black;', '{body:color=black;}', 'body {color: black;}', '{body;color:black;}'],
            correctAnswer: 2,
            questionType: "css"
        }, {
            question: "How do you add a background color for all &lt;h1> elements?",
            choices: ['all.h1 {background-color:#FFFFFF;}', 'h1.all {background-color:#FFFFFF;}', 'h1 {background-color:#FFFFFF;}'],
            correctAnswer: 2,
            questionType: "css"
        }, {
            question: "What is the correct CSS syntax for making all the &lt;p> elements bold?",
            choices: ['&lt;p style="text-size:bold;">', 'p {text-size:bold;}', 'p {font-weight:bold;}', '&lt;p style="font-size:bold;">'],
            correctAnswer: 2,
            questionType: "css"
        }, {
            question: "How do you display a border like this: the top border = 10 pixels, the bottom border = 5 pixels, the left border = 20 pixels and the right border = 1pixel?",
            choices: ['border-width:5px 20px 10px 1px;', 'border-width:10px 1px 5px 20px;', 'border-width:10px 5px 20px 1px;', 'border-width:10px 20px 5px 1px;'],
            correctAnswer: 1,
            questionType: "css"
        }, {
            question: "Where in an HTML document is the correct place to refer to an external style sheet?",
            choices: [' At the end of the document', 'In the &lt;head> section', 'In the &lt;body> section'],
            correctAnswer: 1,
            questionType: "css"
        }, {
            question: "What is the correct JavaScript syntax to change the content of the HTML element &lt;p id='demo'>This is a demonstration.&lt;/p>?",
            choices: ['#demo.innerHTML = "Hello World!";', 'document.getElementById("demo").innerHTML = "Hello World!";', 'document.getElement("p").innerHTML = "Hello World!";', 'document.getElementByName("p").innerHTML = "Hello World!";'],
            correctAnswer: 1,
            questionType: "js"
        }, {
            question: "What is the correct way to write a JavaScript array?",
            choices: ['var colors = 1 = ("red"), 2 = ("green"), 3 = ("blue")', 'var colors = "red", "green", "blue"', 'var colors = (1:"red", 2:"green", 3:"blue")', 'var colors = ["red", "green", "blue"]'],
            correctAnswer: 3,
            questionType: "js"
        }, {
            question: "What is the correct JavaScript syntax for opening a new window called 'w2'?",
            choices: ['w2 = window.new("http://www.w3schools.com");', 'w2 = window.open("http://www.w3schools.com");'],
            correctAnswer: 1,
            questionType: "js"
        }, {
            question: "How can you detect the client's browser name?",
            choices: ['browser.name', 'client.navName', 'navigator.appName'],
            correctAnswer: 2,
            questionType: "js"
        }, {
            question: "What will the following code return: Boolean(10 > 9)",
            choices: ['true', 'false', 'NaN'],
            correctAnswer: 0,
            questionType: "js"
        }, {
            question: "What is the correct way to include the file 'time.inc'?",
            choices: ['&lt;?php include file="time.inc"; ?>', '&lt;?php include "time.inc"; ?>', '&lt;!-- include file="time.inc" -->', '&lt;?php include:"time.inc"; ?>'],
            correctAnswer: 1,
            questionType: "php"
        }, {
            question: "What is the correct way to open the file 'time.txt' as readable?",
            choices: ['open("time.txt");', 'fopen("time.txt","r+");', 'fopen("time.txt","r");', 'open("time.txt","read");'],
            correctAnswer: 2,
            questionType: "php"
        }, {
            question: "The die() and exit() functions do the exact same thing.",
            choices: ['true', 'false'],
            correctAnswer: 0,
            questionType: "php"
        }, {
            question: "How do you create an array in PHP?",
            choices: ['$cars = array("Volvo", "BMW", "Toyota");', '$cars = array["Volvo", "BMW", "Toyota"];', '$cars = "Volvo", "BMW", "Toyota";'],
            correctAnswer: 0,
            questionType: "php"
        }, {
            question: "Which operator is used to check if two values are equal and of same data type?",
            choices: ['===', '=', '==', '!='],
            correctAnswer: 0,
            questionType: "php"
        }];
    </script>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <h1 class="page-header">Quiz</h1>
    </div>
<div class="container"></div>
    <div class="col-md-offset-2">
        <div class="quizsection">
            <div id="quiz"></div>
            <br>
            <div class="button btn btn-default" id="prev"><a href="#">Prev</a></div>
            <div class="button btn btn-default" id="next"><a href="#">Next</a></div>
            <div class="button btn btn-default" id="start"><a href="#">Start Over</a></div>

            {{ Form::open(array('class' => 'form-quiz', 'route' => 'knowledgeQuizResults')) }}
                <input type="hidden" id="htmlScore" name="html" value="">
                <input type="hidden" id="cssScore" name="css" value="">
                <input type="hidden" id="jsScore" name="js" value="">
                <input type="hidden" id="phpScore" name="php" value="">
            {{ Form::submit('Submit', array('id' => 'formSubmit', 'hidden' => 'true')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection