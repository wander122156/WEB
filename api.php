<?php 
require_once('db.php');
$conn = createDBConnection();

$method = $_SERVER['REQUEST_METHOD']; // Получаем метод запроса (GET, POST, PUT, DELETE и т. д.)

if ($method == 'POST'){ // Проверяем, является ли метод POST
  $dataAsJson = getPostJson(); // Получаем данные запроса в виде JSON
  if ($dataAsJson) { // Проверяем, получены ли данные в формате JSON
    $dataAsArray = json_decode($dataAsJson, true); // Преобразуем JSON-данные в ассоциативный массив
    if ($dataAsArray['image_url']) { // Проверяем, есть ли изображение в полученных данных
      // Декодируем изображение из base64
      $imageBase64 = $dataAsArray['image_url'];
      $directory = 'src/images'; // Выбираем папку для сохранения файла
      $imageName = saveImage($imageBase64, $directory); // Сохраняем изображение и получаем его имя
      $imageUrl = 'http://localhost:8001/static/images/' . $imageName;
      $dataAsArray['image_url'] = $imageUrl; // Обновляем значение 'image_url' в массиве $dataAsArray
    }
    // Добавляем данные в базу данных
    $sql = "INSERT INTO post (title, subtitle, content, author, author_url, publish_date, image_url, featured) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    try {
        $stmt->bind_param("sssssssi", $dataAsArray['title'], $dataAsArray['subtitle'], $dataAsArray['content'], 
                          $dataAsArray['author'], $dataAsArray['author_url'], $dataAsArray['publish_date'], 
                          $dataAsArray['image_url'], $dataAsArray['featured']);
        $stmt->execute();
        echo "Данные успешно сохранены в базу данных.";
    } catch (Exception $e) {
        die("Ошибка выполнения запроса: " . $e->getMessage());
    }
  }
} else {
  echo 'ERROR, method <> POST'; // Если метод запроса не POST, выводим сообщение об ошибке
}

closeDBConnection($conn);

function getPostJson(): ?string { // Функция для получения данных POST в виде JSON
  $dataAsJson = file_get_contents("php://input"); // Получаем данные POST в виде JSON
  if (!$dataAsJson) { // Если данные не удалось получить
    echo 'Не удалось считать данные! <br>'; // Выводим сообщение об ошибке
    return null; // Возвращаем null
  }
  return $dataAsJson; // Возвращаем данные в виде JSON
}

function saveImage(string $imageBase64, string $directory): string { // Функция для сохранения изображения из base64
  $imageBase64Array = explode(';base64,', $imageBase64); // Разбиваем строку с изображением на тип и само изображение в base64
  $imgExtention = str_replace('data:image/', '', $imageBase64Array[0]); // Получаем расширение изображения
  $imageDecoded = base64_decode($imageBase64Array[1]); // Декодируем base64 в бинарные данные изображения
  $imageName = uniqid() . '.' . $imgExtention; // Генерируем уникальное имя файла
  $filePath = $directory . '/' . $imageName; // Путь к файлу
  file_put_contents($filePath, $imageDecoded); // Сохраняем изображение в файл
  return $imageName; // Возвращаем имя сохраненного файла
}
?>