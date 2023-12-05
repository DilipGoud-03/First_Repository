<?php

class GetDataClass
{
    private array $data;
    private string $filePath;
    private $adminName = "admin";
    private $password = "1234";

    public function matchAdminNamePass($adminName, $password)
    {
        if (($this->adminName == $adminName) && ($this->password == $password)) {
            return true;
        } else {
            return false;
        }
    }
    public function __construct()
    {
        $this->filePath = dirname(__FILE__) . '/JsonData/data.json';
        $this->data = json_decode(
            file_get_contents($this->filePath),
            true
        );
    }
    public function findByEmail(string $email): array
    {
        $result = array_values(array_filter($this->data, function ($row) use ($email) {
            if ($row['email'] == $email) {
                return true;
            }

            return false;
        }));

        if (!empty($result[0])) {
            return $result[0];
        }

        return [];
    }

    public function find(int $id): array
    {
        $result = array_values(array_filter($this->data, function ($row) use ($id) {
            if ($row['id'] == $id) {
                return true;
            }
            return false;
        }));
        if (!empty($result[0])) {
            return $result[0];
        }

        return [];
    }

    public function createNewUser(array $data): bool
    {
        $id = end($this->data);
        $newId = $id['id'];
        $this->data[] = [
            'id' => ++$newId,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'status' => $data['status'],
        ];

        return file_put_contents(
            $this->filePath,
            json_encode($this->data)
        );
    }

    public function updateUser(int $id, array $data): bool
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                $this->data[$key]['name'] = $data['name'];
                $this->data[$key]['email'] = $data['email'];
                $this->data[$key]['password'] = $data['password'];
                $this->data[$key]['status'] = $data['status'];
            }
        }
        return file_put_contents(
            $this->filePath,
            json_encode($this->data)
        );
    }

    public function loginUser(array $data)
    {
        foreach ($this->data as $key => $value) {
            if (
                $this->data[$key]['email'] == $data['email'] &&
                $this->data[$key]['password'] == $data['password']
            ) {

                return true;
            }
        }
    }
    public function deleteUser(int $id): bool
    {
        foreach ($this->data as $key => $value) {
            if ($value['id'] == $id) {
                unset($this->data[$key]);
            }
        }
        return file_put_contents(
            $this->filePath,
            json_encode($this->data)
        );
    }
    public function getActive(): array
    {
        return array_values(array_filter($this->data, function ($row) {
            return $row['status'];
        }));
    }
    public function all(): array
    {
        return $this->data;
    }
}
