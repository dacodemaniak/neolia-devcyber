<?php
/**
 * FileHelper provide utilities for file management
 * @author Aélion <jean-luc.aubert@aelion.fr>
 * @version 1.0.0
 *  - Simple exists method
 */
namespace Aelion\Helper\File;

class FileHelper {
    public static function exists(string $file): bool {
        $relativePath = dirname(__FILE__) . '/../../../' . $file;
        return file_exists($relativePath);
    }
}