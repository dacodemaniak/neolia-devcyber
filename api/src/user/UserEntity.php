<?php
/**
 * UserEntity
 *  Entity that map raw data from database to object
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Sets properties, getter and setter
 */
namespace Api\User;

use Api\Account\AccountEntity;

class UserEntity {
    private int $id;
    private string $login;
    private string $password;
    private array $roles = [];
    private ?AccountEntity $account = null;

    public function ___construct() {
        $this->roles = [];
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getLogin(): ?string {
        return $this->login;
    }

    public function setLogin(string $login): void {
        $this->login = $login;
    }

    public function getPassword(): ?string {
        return $this->password;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function getAccount(): ?AccountEntity {
        return $this->account;
    }

    public function setAccount(AccountEntity $account): void {
        $this->account = $account;
    }

    public function getRoles(): array {
        return $this->roles;
    }
    
    public function addRole(RoleEntity $role): void {
        array_push($this->roles, $role);
    }
}