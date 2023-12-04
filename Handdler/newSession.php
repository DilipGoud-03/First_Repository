<?php
session_start();
class NewSession
{
    public function isAuthExists(): bool
    {
        return !empty($_SESSION['id']);
    }
    public function setAuthId(int $id): void
    {
        $_SESSION['id'] = $id;
    }

    public function removeAuthId(): void
    {
        unset($_SESSION['id']);
    }

    public function isUserExists(): bool
    {
        return !empty($_SESSION['uId']);
    }
    public function setUserId(int $uId): void
    {
        $_SESSION['uId'] = $uId;
    }

    public function removeUserId(): void
    {
        unset($_SESSION['uId']);
    }

    public function hasAuth(): bool
    {
        return !empty($_SESSION['authName']);
    }

    public function setAuthName(string $AuthName): void
    {
        $_SESSION['authName'] = $AuthName;
    }

    public function getAuthName(): ?string
    {
        if (!$this->hasAuth()) {
            return null;
        }

        return $_SESSION['authName'];
    }

    public function removeauthName(): void
    {
        unset($_SESSION['authName']);
    }

    public function hasError(): bool
    {
        return !empty($_SESSION['error']);
    }

    public function getError(): ?string
    {
        if (!$this->hasError()) {
            return null;
        }

        return $_SESSION['error'];
    }

    public function setError(string $error): void
    {
        $_SESSION['error'] = $error;
    }

    public function removeError(): void
    {
        unset($_SESSION['error']);
    }

    public function hasMessage(): bool
    {
        return !empty($_SESSION['message']);
    }

    public function setMessage(string $message): void
    {
        $_SESSION['message'] = $message;
    }

    public function getMessage(): ?string
    {
        if (!$this->hasMessage()) {
            return null;
        }

        return $_SESSION['message'];
    }

    public function removeMessage(): void
    {
        unset($_SESSION['message']);
    }
}
