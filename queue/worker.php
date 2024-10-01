<?php
require_once 'functions.php';
echo "Queue Starting...\n";
while (true) {
    $job = getJobFromQueue();
    if ($job) {
        echo "Queue " . $job['id'] . "Processing...\n";
        setJobStatus('process', $job['id']);
        $data = json_decode($job['job_data'], true);
        if ($data['type'] === 'sendMail') {
            //Gọi hàm sendMail
            sendMail($data['data']['email'], 'Demo gửi mail', $data['data']['message']);
        }
        setJobStatus('done', $job['id']);
        echo "Queue " . $job['id'] . "Done\n";
    }

    sleep(1);
}
