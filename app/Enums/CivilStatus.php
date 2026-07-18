<?php

namespace App\Enums;

enum CivilStatus: string
{
    case Single = 'single';
    case Married = 'married';
    case Widowed = 'widowed';
    case Divorced = 'divorced';
    case Separated = 'separated';
    case Annulled = 'annulled';

    /**
     * Human-readable label for display in selects, tables, etc.
     */
    public function label(): string
    {
        return match ($this) {
            self::Single => 'Single',
            self::Married => 'Married',
            self::Widowed => 'Widowed',
            self::Divorced => 'Divorced',
            self::Separated => 'Separated',
            self::Annulled => 'Annulled',
        };
    }

    /**
     * All cases as {value, label} pairs, ready to hand to the frontend
     * for a select input. Keeps validation and UI options in sync -
     * add a case here and both sides pick it up automatically.
     *
     * @return array<int, array{value: string, label: string}>
     */
    public static function options(): array
    {
        return array_map(
            fn(self $case) => [
                'value' => $case->value,
                'label' => $case->label(),
            ],
            self::cases(),
        );
    }
}
