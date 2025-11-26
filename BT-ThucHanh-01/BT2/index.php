<?php
// Đọc nội dung từ file Quiz.txt
$quizFile = 'Quiz.txt';
$questions = [];

if (file_exists($quizFile)) {
    $content = file($quizFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $currentQuestion = null;

    foreach ($content as $line) {
        if (strpos($line, 'ANSWER:') === 0) {
            // Lấy đáp án
            $currentQuestion['answer'] = trim(substr($line, 7));
            $questions[] = $currentQuestion;
            $currentQuestion = null;
        } elseif (preg_match('/^[A-D]\./', $line)) {
            // Lấy đáp án của câu hỏi
            $currentQuestion['options'][] = $line;
        } else {
            // Lấy câu hỏi
            $currentQuestion = ['question' => $line, 'options' => []];
        }
    }
} else {
    die('Không tìm thấy file Quiz.txt');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài thi trắc nghiệm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .quiz-container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .question {
            margin-bottom: 20px;
        }
        .question h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .options label {
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
        }
        .submit-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
        .answer {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="quiz-container">
        <h1>Bài thi trắc nghiệm</h1>
        <form method="POST">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question">
                    <h3><?= $q['question'] ?></h3>
                    <div class="options">
                        <?php foreach ($q['options'] as $option): ?>
                            <label>
                                <input type="<?= strpos($q['answer'], ',') !== false ? 'checkbox' : 'radio' ?>" 
                                       name="answer[<?= $index ?>]<?= strpos($q['answer'], ',') !== false ? '[]' : '' ?>" 
                                       value="<?= $option[0] ?>">
                                <?= $option ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                        <div class="answer">
                            Đáp án đúng: <?= $q['answer'] ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="submit-btn">Nộp bài</button>
        </form>
    </div>
</body>
</html>