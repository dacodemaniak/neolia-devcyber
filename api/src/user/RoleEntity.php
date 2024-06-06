<?php
/**
 * Role model
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 */
namespace Api\User;

final class RoleEntity {
    private int $id;
    private string $role;

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }
}