<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Системный анализ</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table id="Htable">
        <tr>
            <th id="th1">Область</th>
            <th id="thf">Дата</th>
            <th id="th2">Описание</th>
            <th id="thl">Link</th>
        </tr>
        <?php
          // Подключение к базе данных
          $host = 'localhost';
          $username = 'root';
          $password = '';
          $dbname = 'duckburg';
    
          $conn = mysqli_connect('localhost', 'root', '', 'duckburg');
          if (!$conn) {
              die("Ошибка подключения: " . mysqli_connect_error());
          }
    
          // Запрос данных из базы данных
          $sql = "SELECT * FROM progress ORDER BY date DESC;";
          $result = mysqli_query($conn, $sql);
    
          // Вывод данных из базы данных
          while ($row = mysqli_fetch_assoc($result)) {
            $imagePath = 'uploads/' . $row['img'];
            ?>
            <tr>
                <td><?php echo htmlspecialchars($row['field']); ?></td>
                <td id="tdate"><?php echo htmlspecialchars($row['date']); ?></td>
                <td><?php echo htmlspecialchars($row['des']); ?></td>
                <td id="td_link"><a id="table_a" href="<?php echo htmlspecialchars($row['link']); ?>" title="Ссылка на материалы">➜</a></td>
            </tr>
            <?php
          }
    
          // Закрытие соединения с базой данных
          mysqli_close($conn);
        ?>
    </table>
</body>
</html>