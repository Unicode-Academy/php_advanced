<?php
//$url = 'http://localhost/php_advanced/curl/server.php';
$url = 'https://my.vnexpress.net/users/chi-tiet-tai-khoan';

$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36';

$cookieStr = 'orig_aid=7pa57c979sjdwiqr.1643113169.des; login_system=1; fpt_uuid=%221cb6912b-9008-4d81-a72d-e728883f51e7%22; ajs_group_id=null; __gads=ID=4988096731e70881:T=1643113175:S=ALNI_MZvfBLUp0u-EvybHvkvwzdzuPsl2Q; _pk_ref=%5B%22%22%2C%22%22%2C1648597293%2C%22http%3A%2F%2F127.0.0.1%3A5500%2F%22%5D; _pk_ses=*; _gid=GA1.2.1263510542.1648597293; fosp_loc=24-2-VN; fosp_location_zone=3; device_env=4; cdevice=4; device_env_real=4; sw_version=1; display_cpd=10; cto_bundle=X3EKkV9xNncxaGQwMDdMeGRyS05TYjBJSGklMkI5cVAyeEd6TWMwT2lTcmt6YmhjWTFMTVhrR1JmNGRuTm9GJTJGVDdFOTcwNDRPJTJGU3kxVG5FR3ZsTXUlMkIwVXlsSVRacnRRYjNCQXVrT3J5d2RMSTI0RVNoTUF1RmhDWlg2bmdVUXg0S05xVVVhejdSWXglMkY3MUp5Z1Iyd240bTdxcllWWmQlMkY3OXhPZUs3V2pzeDVQazBTWk02dWcyVG9rN01PMUl5bExpM2U5MWE; __utma=24900902.189202080.1643113173.1648597306.1648597306.1; __utmc=24900902; __utmz=24900902.1648597306.1.1.utmcsr=vnexpress.net|utmccn=(referral)|utmcmd=referral|utmcct=/; __utmt=1; __utmt_b=1; __utmb=24900902.4.10.1648597306; PHPSESSID=d7293d9701945b5c5e1fa76070653027; myvne_sso=IasjnBwcI7zib1gyV2gT5p45oYd%2FBS%2FWBwT7Ud0K0dJ7OAgTcU78YjWOlhhIIoGonqVxC1Gw05d7SqQdTpAl%2FgsTeNoyGOcXzr7iZIBbvp%2FkWVYOdI%2BwhylR5sACmEc%2B%2FMnT8pMxw4zOoTjPNLv8A4u1DAAbRcDx0iN1pMPRREcFz%2BJeH%2FgYn92faI5VdHD4Bpvqc%2BmkYyEUglNLClhbm2bzQkUNq2NpdT43FRK1XCufzxtL7nlRTOX3SEmaFkovBnZeFZv8gLhpYGevMJu%2B2TTMCZnc%2BCwc7e6Y62lua9vzy%2BQ9iZyuROMQmbtP%2B0MB6nwQ33lxfMxjjPdzN7mdRj4ugW9B1EZTNsJbml0qT4eX2sU2qhJOP%2BWzTCFIEWfjgQGxVqBEVl4vkH78Gob%2BOmbA7pYibMCJiCS%2B; myvne_user_id=1050813417; __utma=139601012.189202080.1643113173.1648598550.1648598550.1; __utmc=139601012; __utmz=139601012.1648598550.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); fosp_aid=1050813417; _pk_cvar=%7B%224%22%3A%5B%22fosp_aid%22%2C%221050813417%22%5D%2C%225%22%3A%5B%22CPMS_LOG%22%2C%22null%22%5D%2C%227%22%3A%5B%22fosp_aid_bk%22%2C%221050813417%22%5D%7D; _ym_uid=16485985521057605742; _ym_d=1648598552; _ym_isad=2; __utmb=139601012.18.10.1648598550; _ga_DQJ7NF9DN2=GS1.1.1648597293.7.1.1648598655.4; _ga=GA1.1.189202080.1643113173; _ga_57577CKS2C=GS1.1.1648597293.6.1.1648598655.4; _pk_id=1013539d72e605df.1643113170.7.1648598656.1647872891.';

$ch = curl_init();

//Cấu hình
curl_setopt($ch, CURLOPT_URL, $url); //Set url cần request
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //Trả về kết quả (giống hàm return và không return)
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //tắt ssl
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); //tắt ssl
curl_setopt($ch, CURLOPT_TIMEOUT, 30); //thiết lập timeout cho request

curl_setopt($ch, CURLOPT_USERAGENT, $userAgent); //giả lập trình duyệt

curl_setopt($ch, CURLOPT_HEADER, false); //Trả về header của link cần request

curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'api-key: UnicodeAcademy1234',
    'token: eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9',
    'User-Agent: '.$userAgent,
    //'Cookie: '.$cookieStr
]); //Mảng header cần gửi lên request

curl_setopt($ch, CURLOPT_COOKIE, $cookieStr);

$result = curl_exec($ch);

curl_close($ch);

var_dump($result);