<?php
/**
 * Account model
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 */
namespace Api\Account;

use Api\User\UserEntity;

final class AccountEntity {
    private int $id;
    private string $lastname;
    private string $firstname;
    private int $gender;

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getLastname(): ?string {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void {
        $this->lastname = $lastname;
    }

    public function getFirstname(): ?string {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void {
        $this->firstname = $firstname;
    }

    public function getGender(): ?int {
        return $this->gender;
    }

    public function setGender(int $gender): void {
        $this->gender = $gender;
    }
}