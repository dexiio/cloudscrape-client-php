<?php
require_once 'CloudScrape.php';

//See https://app.cloudscrape.com/#/api
define('CS_API_KEY','Your Secret API Key'); //See https://app.cloudscrape.com/#/api
define('CS_ACCOUNT_ID','95917AB5-645C-47ED-B982-61C83328D90A');
$someRunId = 'A0EC5CB1-CA49-4315-BFEA-752C80F80AAA'; //Edit your runs inside the app to get their ID

CloudScrape::init(CS_API_KEY, CS_ACCOUNT_ID);

$newExecution = CloudScrape::runs()->execute($someRunId);

var_dump($newExecution);
