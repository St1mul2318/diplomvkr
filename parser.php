<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';

use App\Question;

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$file = file_get_contents('questions.json');

$questions = json_decode($file);

$count = count($questions);
$current = 0;

foreach ($questions as $value) {
	$model = new Question;

	$model->title = $value->title;
	$model->image = $value->image;
	$model->ticket = $value->ticket_number;
	$model->question = $value->question;
	$model->answers = json_encode($value->answers, JSON_UNESCAPED_UNICODE);
	$model->correct = $value->correct_answer;
	$model->tip = $value->answer_tip;
	$model->topic = $value->topic;

	$model->save();

	$current++;

	echo "Progress ".($current/$count)*100 ."%";
}


