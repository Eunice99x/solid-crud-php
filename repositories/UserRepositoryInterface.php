<?php
    interface UserRepositoryInterface {
        public function getAll(): array;
        public function getById(int $id): ?User;
        public function create(User $user): bool;
        public function update(User $user): bool;
        public function delete(int $id): bool;
    }