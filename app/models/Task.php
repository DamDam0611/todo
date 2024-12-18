<?php

class Task
{
     public static function all()
    {
        $db = Database::getInstance()->getPdo();
        $stmt = $db->query("SELECT * FROM tasks ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 
    public static function create($title)
    {
          $db = Database::getInstance()->getPdo();
          $sql = $db->prepare("INSERT INTO tasks (title) VALUES (:title)");
          $sql->execute([
               ':title' => $title,
          ]);
    }

    public static function markAsCompleted($id)
    {
          $db = Database::getInstance()->getPdo();
          $sql = $db->query("UPDATE tasks SET is_completed=1 WHERE id=$id");
          return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
    {
     $db = Database::getInstance()->getPdo();
     $stmt = $db->query("DELETE FROM tasks WHERE id=$id");
     return $stmt->fetchAll(PDO::FETCH_ASSOC);     
    }
}