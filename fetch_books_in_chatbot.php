<?php
include_once('./database.php');


$mood = $_POST['mood'];
$language = $_POST['language'];
$length = $_POST['length'];

// Fetch the latest 6 books based on the selected criteria
$query = "SELECT * FROM `books` WHERE `mood` = ? AND `language` = ? AND `length` = ? ORDER BY `id` DESC LIMIT 6";
$stmt = $connect->prepare($query);
$stmt->bind_param("sss", $mood, $language, $length);
$stmt->execute();
$result = $stmt->get_result();

$output = [];
while ($rows = $result->fetch_assoc()) {
    $output[] = $rows;
}

// Check if the output array is empty
if (empty($output)) {
    echo "<p style='color:black;'>We couldn't find any books that match your interests.</p>";
} else {
    // Generate the HTML for the book list
    foreach ($output as $value) {
        echo '<li>
                <a href="book-detail.php?detail=' . base64_encode($value['id']) . '">
                    <div class="image">
                        <img src="../backend/uploads/' . $value['image'] . '" alt="" style="width: 50; height: 75;">
                    </div>
                    <div class="image-info">
                        <span>' . htmlspecialchars($value['book_name']) . '</span>
                        <h4>£' . htmlspecialchars($value['book_price']) . '</h4>
                    </div>
                </a>
            </li>';
    }
}

$stmt->close();
$connect->close();
?>
