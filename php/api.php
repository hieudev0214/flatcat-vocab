<?php
require __DIR__ . '/config.php';
header('Content-Type: application/json; charset=utf-8');

function out($data) {
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}

function bad($msg) {
    http_response_code(400);
    out(['error' => $msg]);
}

$pdo = get_pdo();
$action = $_REQUEST['action'] ?? '';

switch ($action) {

    case 'words': {
        $rows = $pdo->query('SELECT * FROM words ORDER BY id ASC')->fetchAll(PDO::FETCH_ASSOC);
        out($rows);
    }

    case 'trash': {
        $rows = $pdo->query('SELECT * FROM trash ORDER BY deleted_at DESC')->fetchAll(PDO::FETCH_ASSOC);
        out($rows);
    }

    case 'add': {
        $term = trim($_POST['term'] ?? '');
        $meaning = trim($_POST['meaning'] ?? '');
        if ($term === '' || $meaning === '') bad('Thiếu từ hoặc nghĩa');

        $stmt = $pdo->prepare('INSERT INTO words (term, phonetic, pos, synonym, meaning, example) VALUES (:term, :phonetic, :pos, :synonym, :meaning, :example)');
        $stmt->execute([
            ':term' => $term,
            ':phonetic' => trim($_POST['phonetic'] ?? ''),
            ':pos' => trim($_POST['pos'] ?? 'v'),
            ':synonym' => trim($_POST['synonym'] ?? ''),
            ':meaning' => $meaning,
            ':example' => trim($_POST['example'] ?? ''),
        ]);

        $id = $pdo->lastInsertId();
        $row = $pdo->prepare('SELECT * FROM words WHERE id = ?');
        $row->execute([$id]);
        out($row->fetch(PDO::FETCH_ASSOC));
    }

    case 'delete': {
        $id = (int) ($_POST['id'] ?? 0);
        if (!$id) bad('Thiếu id');

        $stmt = $pdo->prepare('SELECT * FROM words WHERE id = ?');
        $stmt->execute([$id]);
        $word = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$word) bad('Không tìm thấy từ');

        $pdo->beginTransaction();
        $pdo->prepare('INSERT INTO trash (original_id, term, phonetic, pos, synonym, meaning, example) VALUES (:id, :term, :phonetic, :pos, :synonym, :meaning, :example)')
            ->execute([
                ':id' => $word['id'],
                ':term' => $word['term'],
                ':phonetic' => $word['phonetic'],
                ':pos' => $word['pos'],
                ':synonym' => $word['synonym'],
                ':meaning' => $word['meaning'],
                ':example' => $word['example'],
            ]);
        $pdo->prepare('DELETE FROM words WHERE id = ?')->execute([$id]);
        $pdo->commit();

        out(['ok' => true]);
    }

    case 'restore': {
        $id = (int) ($_POST['id'] ?? 0);
        if (!$id) bad('Thiếu id');

        $stmt = $pdo->prepare('SELECT * FROM trash WHERE id = ?');
        $stmt->execute([$id]);
        $word = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$word) bad('Không tìm thấy trong lịch sử xóa');

        $pdo->beginTransaction();
        $pdo->prepare('INSERT INTO words (term, phonetic, pos, synonym, meaning, example) VALUES (:term, :phonetic, :pos, :synonym, :meaning, :example)')
            ->execute([
                ':term' => $word['term'],
                ':phonetic' => $word['phonetic'],
                ':pos' => $word['pos'],
                ':synonym' => $word['synonym'],
                ':meaning' => $word['meaning'],
                ':example' => $word['example'],
            ]);
        $pdo->prepare('DELETE FROM trash WHERE id = ?')->execute([$id]);
        $pdo->commit();

        out(['ok' => true]);
    }

    case 'clear_trash': {
        $pdo->exec('DELETE FROM trash');
        out(['ok' => true]);
    }

    default:
        bad('Hành động không hợp lệ');
}
