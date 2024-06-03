<?php
/**
 * ParsedRoute simple model for route
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Sets route detail
 */
namespace Aelion\Router;

use Aelion\Helper\File\FileHelper;

class ParsedRoute {
    private string $namespace;
    private string $path;
    private string $controller;
    private string $endpoint;

    public function setNamespace(string $namespace): void {
        $this->namespace = $namespace;
    }

    public function getNamespace(): ?string {
        return $this->namespace;
    }

    public function setPath(string $path): void {
        $path = strtolower($path);
        $this->path = 'src/' . $path . '/';
    }

    public function getPath(): ?string {
        return $this->path;
    }

    public function setController($controller): void {
        $this->controller = $controller;
    }

    public function getController(): string {
        return $this->controller;
    }

    public function setEndpoint(string $endpoint): void {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint(): ?string {
        return $this->endpoint;
    }

    public function checkPath(): bool {
        $filePath = $this->path . $this->controller . '.php';
        return FileHelper::exists($filePath);
    }

    public function fqClassName(): string {
        return $this->namespace;
    }
}