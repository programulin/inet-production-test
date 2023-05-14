<?php

// Класс-заглушка
class Client
{
}

interface KeyStorageInterface
{
    public function getKey(): string;
}

class FileKeyStorage implements KeyStorageInterface
{
    public function getKey(): string
    {
        return 'file_key';
    }
}

class DatabaseKeyStorage implements KeyStorageInterface
{
    public function getKey(): string
    {
        return 'database_key';
    }
}

class Concept
{
    protected Client $client;

    protected KeyStorageInterface $storage;

    public function __construct(KeyStorageInterface $storage)
    {
        $this->client = new Client();
        $this->storage = $storage;
    }

    public function getUserData(): void
    {
        $params = [
            'auth' => ['user', 'pass'],
            'token' => $this->getSecretKey()
        ];
        // Some logic
    }

    public function getSecretKey(): string
    {
        return $this->storage->getKey();
    }
}

class KeyStorageFactory
{
    public function getStorage(): KeyStorageInterface
    {
        return new (ucfirst(config('storage')) . 'KeyStorage');
    }
}

// Аналог хелпера из Ларавел
function config(string $name): mixed
{
    return $name === 'storage' ? 'database' : null;
}

// Как пользуемся
$factory = new KeyStorageFactory();
$concept = new Concept($factory->getStorage());
assert($concept->getSecretKey() === 'database_key');
