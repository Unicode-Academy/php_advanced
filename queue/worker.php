<?php
require_once 'functions.php';
$job = getJobFromQueue();
if ($job) {
    setJobStatus('process', $job['id']);
    $data = json_decode($job['job_data'], true);
    if ($data['type'] === 'sendMail') {
        //Gọi hàm sendMail
        sendMail($data['data']['email'], 'Demo gửi mail', $data['data']['message']);
    }
    setJobStatus('done', $job['id']);
}
