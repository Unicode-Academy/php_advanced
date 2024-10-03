<?php
require_once 'functions.php';
echo "Queue Starting...\n";
while (true) {
    //Xử lý retry queue
    $retryJob = getRetryJobFromQueue();
    if ($retryJob) {
        //Thêm retryJob vào delayed_queue
        addJobToQueue(json_decode($retryJob, true), 30);
    }
    //Xử lý delay queue
    $tasks = getJobListDelayed();
    foreach ($tasks as $task) {
        addJobToQueue(json_decode($task, true)); //Thêm task với task_queue
        deleteJobDelayed($task);
    }
    //Xử lý task_queue
    $job = getJobFromQueue();
    if ($job) {
        echo "Queue Processing...\n";
        // setJobStatus('process', $job['id']);
        $data = json_decode($job, true);

        if ($data['type'] === 'sendMail') {
            try {
                //Gọi hàm sendMail
                sendMail($data['data']['email'], 'Demo gửi mail', $data['data']['message']);
                // setJobStatus('done', $job['id']);
                echo "Queue Done\n";
            } catch (Error $e) {
                //Lỗi xảy ra
                //Thêm job vào retry_queue
                addJobToRetry($data);
            }
        }
    }

    sleep(1);
}
