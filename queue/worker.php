<?php
require_once 'functions.php';
echo "Queue Starting...\n";
while (true) {
    $job = getJobFromQueue();
    if ($job) {
        echo "Queue Processing...\n";
        // setJobStatus('process', $job['id']);
        $data = json_decode($job, true);

        if ($data['type'] === 'sendMail') {
            //Gọi hàm sendMail
            sendMail($data['data']['email'], 'Demo gửi mail', $data['data']['message']);
        }
        // setJobStatus('done', $job['id']);
        echo "Queue Done\n";
    }

    sleep(1);
}
