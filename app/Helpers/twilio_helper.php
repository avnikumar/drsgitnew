<?php
function send_otp($to, $otp) {
    $sid = getenv('TWILIO_ACCOUNT_SID');
    $token = getenv('TWILIO_AUTH_TOKEN');
    $twilio_number = getenv('TWILIO_PHONE_NUMBER');
    
    $url = "https://api.twilio.com/2010-04-01/Accounts/$sid/Messages.json";

    // Build the body of the POST request
    $data = http_build_query([
        'To' => $to,
        'From' => $twilio_number,
        'Body' => "Your OTP code is $otp"
    ]);

    // cURL setup
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$sid:$token");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

    // Execute cURL request
    $response = curl_exec($ch);
    $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    // Check for errors
    if ($http_status >= 200 && $http_status < 300) {
        // Message sent successfully
        return true;
    } else {
        // Log the error or handle it accordingly
        log_message('error', 'Twilio error: ' . $response);
        return false;
    }
}
