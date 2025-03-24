<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["user_name"]);
    $phone = htmlspecialchars($_POST["user_phone"]);
    $email = htmlspecialchars($_POST["user_email"]);
    $message = htmlspecialchars($_POST["user_message"]);

    $to = "airbag.cable.service@gmail.com"; // ⚡️ Твоя пошта
    $subject = "Нове замовлення з сайту";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n";

    $body = "Ім'я: $name\nТелефон: $phone\nEmail: $email\nПовідомлення:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "✅ Заявка надіслана"]);
    } else {
        echo json_encode(["status" => "error", "message" => "❌ Помилка надсилання"]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "❌ Некоректний запит"]);
}
?>