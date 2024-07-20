<?php

namespace App\Domain;

enum Gender: string
{
    const Female = 'female';
    const Male = 'male';

    const Other = 'other';

    /**
     * Values array for validation
     * @return string[]
     */
    public static function getValue(): array
    {
        return [Gender::Male, Gender::Female, Gender::Other];
    }
}