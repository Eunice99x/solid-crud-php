<?php
    class UserService {
        private UserRepositoryInterface $userRepository;

        public function __construct(UserRepositoryInterface $userRepository)
        {
            $this->userRepository = $userRepository;
        }

        public function getAllUsers(): array {
            return $this->userRepository->getAll();
        }

        public function getUser(int $id): ?User {
            return $this->userRepository->getById($id); 
        }

        public function createUser(string $name, string $email): bool {
            $user = new User(null, $name, $email);
            return $this->userRepository->create($user);
        }

         public function updateUser(int $id, string $name, string $email): bool {
            $user = new User($id, $name, $email);
            return $this->userRepository->update($user);
        }

        public function deleteUser(int $id): bool { 
            return $this->userRepository->delete($id);
        }
    }