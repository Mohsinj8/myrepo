<?php
include('./database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Filter Chatbot</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .chatbot-container {
            width: 400px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            overflow: hidden;
        }
        .chatbot-header {
            background: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .chatbot-messages {
            height: 300px;
            overflow-y: auto;
            padding: 10px;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
        .chatbot-input {
            display: flex;
            padding: 10px;
        }
        .chatbot-input input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }
        .chatbot-input button {
            padding: 10px 15px;
            border: none;
            background: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        .chatbot-input button:hover {
            background: #0056b3;
        }
        .message {
            margin: 5px 0;
        }
        .message.user {
            text-align: right;
        }
        .message.bot {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="chatbot-container">
        <div class="chatbot-header">
            <h2>Book Filter Chatbot</h2>
        </div>
        <div class="chatbot-messages" id="messages"></div>
        <div class="chatbot-input">
            <input type="text" id="user_input" placeholder="Ask about books..." />
            <button id="send_btn">Send</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#send_btn').click(function() {
                var userInput = $('#user_input').val().trim();
                if (userInput) {
                    $('#messages').append('<div class="message user">User: ' + userInput + '</div>');
                    $('#user_input').val('');

                    $.ajax({
                        url: '', // Current page
                        type: 'POST',
                        data: { query: userInput },
                        success: function(response) {
                            var books = JSON.parse(response);
                            if (books.length > 0) {
                                books.forEach(function(book) {
                                    $('#messages').append('<div class="message bot">Book: ' + book.book_name + ' by ' + book.book_author + ' - Price: $' + book.book_price.toFixed(2) + '</div>');
                                });
                            } else {
                                $('#messages').append('<div class="message bot">No books found.</div>');
                            }
                            $('#messages').scrollTop($('#messages')[0].scrollHeight);
                        }
                    });
                }
            });

            $('#user_input').keypress(function(event) {
                if (event.which === 13) {
                    $('#send_btn').click();
                }
            });
        });
    </script>
</body>
</html>
