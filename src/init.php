<?php

((new \think\App())->http)->run();

/**
 * 删除目录
 *
 * @param string $dir 目录路径
 *
 * @return bool
 */
function removeDirectory(string $dir): bool
{
    if (!is_dir($dir)) {
        return true;
    }
    $dirScan = scandir($dir);
    foreach ($dirScan as $scan) {
        if (in_array($scan, ['.', '..'])) {
            continue;
        }
        $child = $dir . DIRECTORY_SEPARATOR . $scan;
        if (is_dir($child)) {
            removeDirectory($child);
        } else {
            unlink($child);
        }
    }
    if (rmdir($dir)) {
        return true;
    } else {
        return false;
    }
}

removeDirectory(runtime_path() . '/log/');
