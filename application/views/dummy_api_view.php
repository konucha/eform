<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dummy API Data</title>
</head>
<body>
    <h1>Dummy API Data</h1>
    <ul>
    <?php foreach ($data as $item): ?>
        <table>
            <th>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['title']; ?></td>
                <td><?php echo $item['body']; ?></td>
            </th>
        </table>
    <?php endforeach; ?>
    </ul>
</body>
</html>
