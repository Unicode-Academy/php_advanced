<?php
session_start();
echo 'Chào bạn: ' . $_SESSION['user_info']['name'];
