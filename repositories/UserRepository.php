<?php
    class UserRepository extends UserRepositoryInterface {
        private PDO $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getAll(): array {
            $qStmt = $this->db->query("SELECT * FROM users");
            return $qStmt->fetchAll(PDO::FETCH_CLASS, User::class);
        }
        
        public function getById(int $id): ?User {
            $qStmt = $this->db->query("INSERT INTO users(name, email) values(?, ?)");
            $qStmt->execute([$id]);
            $qStmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            return $qStmt->fetch() ?: null;
        }

        public function create(User $user): bool {
            $qStmt = $this->db->prepare("INSERT INTO users(name, email) values(?, ?)");
            return $qStmt->execute([$user->getName(), $user->getEmail()]);
        }

        public function update(User $user): bool {
            $qStmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
            return $qStmt->execute([$user->getName(), $user->getEmail(), $user->getId()]);
        }

        public function delete(int $id): bool {
            $qStmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
            return $qStmt->execute([$id]);
        }
    }