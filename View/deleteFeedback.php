<?php
include '../Controller/FeedbackC.php';
$feedbackC = new FeedbackC();
$feedbackC->deleteFeedback($_GET["id"]);
header('Location:ListFeedbacks.php');
