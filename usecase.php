<?php
require_once __DIR__ . '/db/connection.php';

$useCase = [];

if ($_REQUEST['user_id']) {
    $useCase = getUseCase($_REQUEST['user_id']);
}

function getUseCase($userId)
{
    $db = MysqlDB::getConnection();

    $result = [];

    $stmt = $db->prepare('SELECT USERS.FULL_NAME AS userName, USE_CASE.NAME AS actionName, USE_CASE.USE_CASE_TIME AS actionTime, USE_CASE.USER_ID AS uaserId FROM USERS JOIN USE_CASE ON USERS.ID = USE_CASE.USER_ID WHERE USERS.ID =:userId');
    $stmt->bindValue(':userId', $userId);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $result[] = $row;
    }
    return $result;
}

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Кто</th>
        <th scope="col">Что</th>
        <th scope="col">Когда</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($useCase as $row): ?>
        <tr id="<?=$row['userId']; ?>">
            <td><?=$row['userName']; ?></td>
            <td><?=$row['actionName']; ?></td>
            <td><?=$row['actionTime']; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
