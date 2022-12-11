<?php

namespace Solutions\Day7;

class Command
{
    public const LS = 'ls';
    public const CD = 'cd';
    public const UP = '..';

    public const FILE_INFO = 'file_info';
    public const DIR_INFO = 'dir_info';

    public const SIGN = '$';
    public const DIR = 'dir';

    public readonly string $type;
    public readonly string $information;

    public function __construct(
        private string $command
    ) {
        // $ cd // $ ls // $cd ..
        if (str_starts_with($this->command, self::SIGN)) {

            $information = trim(str_replace('$', '', $this->command));

            if ($information === self::LS) {
                $this->type = self::LS;
                $this->information = '';
                return;
            }

            $this->type = self::CD;
            $this->information = trim(substr($information, 2));
            return;
        }

        // dir abcdef
        if (str_starts_with($this->command, self::DIR)) {
            $this->type = self::DIR_INFO;
            $this->information = trim(substr($this->command, 3));
            return;
        }

        // 19214 k // 65346324 f.ext
        $this->type = self::FILE_INFO;
        $this->information = $this->command;
    }
}